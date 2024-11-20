<?php

namespace App\Controllers;

use App\Models\Matricula;
use App\Models\Aluno;
use App\Models\Curso;
use Doctrine\ORM\EntityManager;
use Smarty\Smarty;

class MatriculaController
{
    private EntityManager $em;
    private Smarty $smarty;

    public function __construct(EntityManager $em, Smarty $smarty)
    {
        $this->em = $em;
        $this->smarty = $smarty;
    }

    // Listar todas as matrículas
    public function index()
    {
        try {
            $search = isset($_GET['search']) ? trim($_GET['search']) : null;
            
            if ($search) {
                $qb = $this->em->createQueryBuilder();
                $qb->select('m')
                   ->from(Matricula::class, 'm')
                   ->join('m.aluno', 'a')
                   ->join('m.curso', 'c')
                   ->where($qb->expr()->orX(
                       $qb->expr()->like('a.nome', ':search'),
                       $qb->expr()->like('c.nome', ':search')
                   ))
                   ->andWhere('a.ativo = :ativo')
                   ->setParameter('search', '%' . $search . '%')
                   ->setParameter('ativo', true)
                   ->orderBy('m.id', 'DESC');

                $matriculas = $qb->getQuery()->getResult();
            } else {
                $qb = $this->em->createQueryBuilder();
                $qb->select('m')
                   ->from(Matricula::class, 'm')
                   ->join('m.aluno', 'a')
                   ->where('a.ativo = :ativo')
                   ->setParameter('ativo', true)
                   ->orderBy('m.id', 'DESC');

                $matriculas = $qb->getQuery()->getResult();
            }

            $this->smarty->assign('matriculas', $matriculas);
            $this->smarty->assign('search', $search);
            $this->smarty->display('matriculas/index.tpl');
            
        } catch (\Exception $e) {
            $this->smarty->assign('error', 'Erro ao listar matrículas: ' . $e->getMessage());
            $this->smarty->display('matriculas/index.tpl');
        }
    }

    // Mostrar formulário de criação
    public function novo()
    {
        // Busca apenas alunos ativos para novas matrículas
        $alunos = $this->em->getRepository(Aluno::class)->findBy(['ativo' => true]);
        $cursos = $this->em->getRepository(Curso::class)->findBy(['ativo' => true]);
        
        $this->smarty->assign('title', 'Nova Matrícula - Sistema de Matrículas');
        $this->smarty->assign('alunos', $alunos);
        $this->smarty->assign('cursos', $cursos);
        $this->smarty->display('matriculas/form.tpl');
    }

    // Criar nova matrícula
    public function create()
    {
        try {
            if (!isset($_POST['aluno_id']) || !isset($_POST['curso_id']) || !is_array($_POST['curso_id'])) {
                throw new \Exception('Dados inválidos');
            }

            $aluno = $this->em->find(Aluno::class, $_POST['aluno_id']);
            if (!$aluno) {
                throw new \Exception('Aluno não encontrado');
            }

            $cursos = $_POST['curso_id'];
            
            // Contador para verificar matrículas criadas
            $matriculasCriadas = 0;

            foreach ($cursos as $curso_id) {
                $curso = $this->em->find(Curso::class, $curso_id);
                
                if (!$curso) {
                    throw new \Exception('Curso não encontrado: ' . $curso_id);
                }
                
                // Verifica se já existe matrícula para este aluno e curso
                $matriculaExistente = $this->em->getRepository(Matricula::class)->findOneBy([
                    'aluno' => $aluno,
                    'curso' => $curso,
                    'status' => 'Ativa'
                ]);

                if (!$matriculaExistente) {
                    $matricula = new Matricula();
                    $matricula->setAluno($aluno);
                    $matricula->setCurso($curso);
                    $matricula->setDataMatricula(new \DateTime());
                    $matricula->setStatus('Ativa');

                    $this->em->persist($matricula);
                    $matriculasCriadas++;
                }
            }

            if ($matriculasCriadas > 0) {
                $this->em->flush();
                header('Location: /matriculas');
                exit;
            } else {
                throw new \Exception('Esse usuário já possui uma matrícula ativa nesse curso');
            }

        } catch (\Exception $e) {
            error_log('Erro ao criar matrícula: ' . $e->getMessage());
            error_log('POST: ' . print_r($_POST, true));
            
            $this->smarty->assign('error', 'Erro ao criar matrícula: ' . $e->getMessage());
            $this->novo();
        }
    }

    // Buscar matrícula para edição
    public function edit(int $id)
    {
        $matricula = $this->em->find(Matricula::class, $id);
        $alunos = $this->em->getRepository(Aluno::class)->findAll();
        $cursos = $this->em->getRepository(Curso::class)->findAll();
        
        $this->smarty->assign('title', 'Editar Matrícula - Sistema de Matrículas');
        $this->smarty->assign('matricula', $matricula);
        $this->smarty->assign('alunos', $alunos);
        $this->smarty->assign('cursos', $cursos);
        $this->smarty->display('matriculas/form.tpl');
    }

    // Atualizar matrícula
    public function update(int $id)
    {
        try {
            $matricula = $this->em->find(Matricula::class, $id);
            
            if (!$matricula) {
                throw new \Exception('Matrícula não encontrada');
            }

            $aluno = $this->em->find(Aluno::class, $_POST['aluno_id']);
            if (!$aluno) {
                throw new \Exception('Aluno não encontrado');
            }

            $curso = $this->em->find(Curso::class, $_POST['curso_id']);
            if (!$curso) {
                throw new \Exception('Curso não encontrado');
            }

            // Verifica se está tentando ativar uma matrícula de um curso inativo
            if ($_POST['status'] === 'Ativa' && !$curso->isAtivo()) {
                throw new \Exception('Não é possível ativar uma matrícula para um curso inativo');
            }

            $matricula->setAluno($aluno);
            $matricula->setCurso($curso);
            $matricula->setStatus($_POST['status']);

            $this->em->flush();

            $_SESSION['success'] = 'Matrícula atualizada com sucesso!';
            header('Location: /matriculas');
            exit;
        } catch (\Exception $e) {
            $this->smarty->assign('error', 'Erro ao atualizar matrícula: ' . $e->getMessage());
            $this->edit($id);
        }
    }

    // Deletar matrícula
    public function delete(int $id)
    {
        try {
            $matricula = $this->em->find(Matricula::class, $id);
            $this->em->remove($matricula);
            $this->em->flush();

            header('Location: /matriculas');
            exit;
        } catch (\Exception $e) {
            $this->smarty->assign('error', 'Erro ao excluir matrícula: ' . $e->getMessage());
            $this->index();
        }
    }
}