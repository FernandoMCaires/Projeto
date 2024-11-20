<?php

namespace App\Controllers;

use App\Models\Aluno;
use Doctrine\ORM\EntityManager;
use Smarty\Smarty;

class AlunoController
{
    private EntityManager $em;
    private Smarty $smarty;

    public function __construct(EntityManager $em, Smarty $smarty)
    {
        $this->em = $em;
        $this->smarty = $smarty;
    }

    // Listar todos os alunos
    public function index()
    {
        $alunos = $this->em->getRepository(Aluno::class)->findAll();
        
        $this->smarty->assign('title', 'Alunos - Sistema de Matrículas');
        $this->smarty->assign('alunos', $alunos);
        $this->smarty->display('alunos/index.tpl');
    }

    // Mostrar formulário de criação
    public function novo()
    {
        $this->smarty->assign('title', 'Novo Aluno - Sistema de Matrículas');
        $this->smarty->display('alunos/form.tpl');
    }

    // Criar novo aluno
    public function create()
    {
        try {
            $aluno = new Aluno();
            $aluno->setNome($_POST['nome']);
            $aluno->setEmail($_POST['email']);
            $aluno->setDataNascimento(new \DateTime($_POST['data_nascimento']));

            $this->em->persist($aluno);
            $this->em->flush();

            header('Location: /alunos');
            exit;
        } catch (\Exception $e) {
            $this->smarty->assign('error', 'Erro ao criar aluno: ' . $e->getMessage());
            $this->smarty->display('alunos/form.tpl');
        }
    }

    // Buscar aluno para edição
    public function edit(int $id)
    {
        $aluno = $this->em->find(Aluno::class, $id);
        
        $this->smarty->assign('title', 'Editar Aluno - Sistema de Matrículas');
        $this->smarty->assign('aluno', $aluno);
        $this->smarty->display('alunos/form.tpl');
    }

    // Atualizar aluno
    public function update(int $id)
    {
        try {
            $aluno = $this->em->find(Aluno::class, $id);
            $aluno->setNome($_POST['nome']);
            $aluno->setEmail($_POST['email']);
            $aluno->setDataNascimento(new \DateTime($_POST['data_nascimento']));

            $this->em->flush();

            header('Location: /alunos');
            exit;
        } catch (\Exception $e) {
            $aluno = $this->em->find(Aluno::class, $id);
            $this->smarty->assign('error', 'Erro ao atualizar aluno: ' . $e->getMessage());
            $this->smarty->assign('aluno', $aluno);
            $this->smarty->display('alunos/form.tpl');
        }
    }

    // Deletar aluno
    public function delete(int $id)
    {
        try {
            $aluno = $this->em->find(Aluno::class, $id);
            $this->em->remove($aluno);
            $this->em->flush();

            header('Location: /alunos');
            exit;
        } catch (\Exception $e) {
            $this->smarty->assign('error', 'Erro ao excluir aluno: ' . $e->getMessage());
            $this->index();
        }
    }
}
