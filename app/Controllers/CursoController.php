<?php

namespace App\Controllers;

use App\Models\Curso;
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
        $cursos = $this->em->getRepository(Curso::class)->findAll();
        
        $this->smarty->assign('title', 'Cursos - Sistema de Matrículas');
        $this->smarty->assign('cursos', $cursos);
        $this->smarty->display('cursos/index.tpl');
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
        $curso = $this->em->find(Curso::class, $id);
        $this->em->remove($curso);
        $this->em->flush();

        header('Location: /cursos');
        exit;
    }
}