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
        $matriculas = $this->em->getRepository(Matricula::class)->findAll();
        
        $this->smarty->assign('title', 'Matrículas - Sistema de Matrículas');
        $this->smarty->assign('matriculas', $matriculas);
        $this->smarty->display('matriculas/index.tpl');
    }

    // Mostrar formulário de criação
    public function novo()
    {
        $alunos = $this->em->getRepository(Aluno::class)->findAll();
        $cursos = $this->em->getRepository(Curso::class)->findAll();
        
        $this->smarty->assign('title', 'Nova Matrícula - Sistema de Matrículas');
        $this->smarty->assign('alunos', $alunos);
        $this->smarty->assign('cursos', $cursos);
        $this->smarty->display('matriculas/form.tpl');
    }

    // Criar nova matrícula
    public function create()
    {
        try {
            $aluno = $this->em->find(Aluno::class, $_POST['aluno_id']);
            $cursos = $_POST['curso_id'];

            foreach ($cursos as $curso_id) {
                $curso = $this->em->find(Curso::class, $curso_id);
                
                $matricula = new Matricula();
                $matricula->setAluno($aluno);
                $matricula->setCurso($curso);
                $matricula->setDataMatricula(new \DateTime());
                $matricula->setStatus('Ativa');

                $this->em->persist($matricula);
            }

            $this->em->flush();
            header('Location: /matriculas');
            exit;
        } catch (\Exception $e) {
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
            $curso = $this->em->find(Curso::class, $_POST['curso_id']);

            if (!$aluno || !$curso) {
                throw new \Exception('Aluno ou Curso não encontrado');
            }

            $matricula->setAluno($aluno);
            $matricula->setCurso($curso);
            $matricula->setStatus($_POST['status']);

            $this->em->flush();

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