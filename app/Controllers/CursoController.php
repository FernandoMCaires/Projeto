<?php

namespace App\Controllers;

use App\Models\Curso;
use App\Models\Matricula;
use Doctrine\ORM\EntityManager;
use Smarty\Smarty;

class CursoController
{
    private EntityManager $em;
    private Smarty $smarty;

    public function __construct(EntityManager $em, Smarty $smarty) 
    {
        $this->em = $em;
        $this->smarty = $smarty;
    }

    // Listar todos os cursos
    public function index()
    {
        try {
            $cursos = $this->em->getRepository(Curso::class)->findBy([], ['id' => 'DESC']);
            $this->smarty->assign('cursos', $cursos);
            $this->smarty->display('cursos/index.tpl');
        } catch (\Exception $e) {
            $this->smarty->assign('error', 'Erro ao listar cursos: ' . $e->getMessage());
            $this->smarty->display('cursos/index.tpl');
        }
    }

    // Mostrar formulário de criação
    public function novo()
    {
        $this->smarty->assign('title', 'Novo Curso - Sistema de Matrículas');
        $this->smarty->display('cursos/form.tpl');
    }

    // Criar novo curso
    public function create()
    {
        $curso = new Curso();
        $curso->setNome($_POST['nome']);
        $curso->setDescricao($_POST['descricao']);

        $this->em->persist($curso);
        $this->em->flush();

        header('Location: /cursos');
        exit;
    }

    // Buscar curso para edição
    public function edit(int $id)
    {
        $curso = $this->em->find(Curso::class, $id);
        
        $this->smarty->assign('title', 'Editar Curso - Sistema de Matrículas');
        $this->smarty->assign('curso', $curso);
        $this->smarty->display('cursos/form.tpl');
    }

    // Atualizar curso
    public function update(int $id)
    {
        $curso = $this->em->find(Curso::class, $id);
        $curso->setNome($_POST['nome']);
        $curso->setDescricao($_POST['descricao']);

        $this->em->flush();

        header('Location: /cursos');
        exit;
    }

    // Deletar curso
    public function delete(int $id)
    {
        try {
            $curso = $this->em->find(Curso::class, $id);
            
            // Em vez de excluir, marca como inativo
            $curso->setAtivo(false);
            
            // Opcionalmente, atualiza as matrículas
            $matriculas = $this->em->getRepository(Matricula::class)->findBy(['curso' => $curso]);
            foreach ($matriculas as $matricula) {
                $matricula->setStatus('Cancelada');
            }
            
            $this->em->flush();

            header('Location: /cursos');
            exit;
        } catch (\Exception $e) {
            $this->smarty->assign('error', 'Erro ao desativar curso: ' . $e->getMessage());
            $this->index();
        }
    }

    public function toggleStatus(int $id)
    {
        try {
            $curso = $this->em->find(Curso::class, $id);
            
            if (!$curso) {
                throw new \Exception('Curso não encontrado');
            }

            // Inverte o status atual do curso
            $novoStatus = !$curso->isAtivo();
            $curso->setAtivo($novoStatus);

            // Se o curso está sendo desativado, cancela todas as matrículas ativas
            if (!$novoStatus) {
                $matriculas = $this->em->getRepository(Matricula::class)->findBy([
                    'curso' => $curso,
                    'status' => 'Ativa'
                ]);

                foreach ($matriculas as $matricula) {
                    $matricula->setStatus('Cancelada');
                }

                $mensagem = sprintf(
                    'Curso desativado com sucesso. %d matrícula(s) foram canceladas automaticamente.',
                    count($matriculas)
                );
            } else {
                $mensagem = 'Curso ativado com sucesso.';
            }
            
            $this->em->flush();
            
            // Adiciona mensagem de sucesso na sessão
            $_SESSION['success'] = $mensagem;

            header('Location: /cursos');
            exit;
        } catch (\Exception $e) {
            $this->smarty->assign('error', 'Erro ao alterar status do curso: ' . $e->getMessage());
            $this->index();
        }
    }
}