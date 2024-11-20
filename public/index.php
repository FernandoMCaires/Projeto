<?php

define('ROOT_PATH', dirname(__DIR__));
require_once ROOT_PATH . '/vendor/autoload.php';

$smarty = require_once ROOT_PATH . '/config/smarty.php';
$em = require_once ROOT_PATH . '/config/doctrine.php';

$authController = new \App\Controllers\AuthController($smarty, $em);
$cursoController = new \App\Controllers\CursoController($em, $smarty);
$alunoController = new \App\Controllers\AlunoController($em, $smarty);
$matriculaController = new \App\Controllers\MatriculaController($em, $smarty);

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

try {
    // Inicia a sessão em todas as requisições
    session_start();

    // Verifica autenticação para todas as rotas exceto login
    if ($uri !== '/login' && !isset($_SESSION['usuario_id'])) {
        header('Location: /login');
        exit;
    }

    // Rotas
    if (($uri === '/login' || $uri === '/') && $method === 'GET') {
        $authController->loginForm();
    } 
    elseif ($uri === '/login' && $method === 'POST') {
        $authController->login();
    }
    elseif ($uri === '/dashboard') {
        $smarty->assign('title', 'Dashboard - Sistema de Matrículas');
        $smarty->assign('usuario_nome', $_SESSION['usuario_nome']);
        $smarty->display('dashboard/index.tpl');
    }
    // Rotas de Cursos
    elseif ($uri === '/cursos' && $method === 'GET') {
        $cursoController->index();
    }
    elseif ($uri === '/cursos/novo' && $method === 'GET') {
        $cursoController->novo();
    }
    elseif ($uri === '/cursos/criar' && $method === 'POST') {
        $cursoController->create();
    }
    elseif (preg_match('/^\/cursos\/editar\/(\d+)$/', $uri, $matches)) {
        $cursoController->edit((int)$matches[1]);
    }
    elseif (preg_match('/^\/cursos\/update\/(\d+)$/', $uri, $matches)) {
        $cursoController->update((int)$matches[1]);
    }
    elseif (preg_match('/^\/cursos\/excluir\/(\d+)$/', $uri, $matches)) {
        $cursoController->delete((int)$matches[1]);
    }
    elseif (preg_match('/^\/cursos\/toggle-status\/(\d+)$/', $uri, $matches)) {
        $cursoController->toggleStatus((int)$matches[1]);
    }
    // Rotas de Alunos
    elseif ($uri === '/alunos' && $method === 'GET') {
        $alunoController->index();
    }
    elseif ($uri === '/alunos/novo' && $method === 'GET') {
        $alunoController->novo();
    }
    elseif ($uri === '/alunos/criar' && $method === 'POST') {
        $alunoController->create();
    }
    elseif (preg_match('/^\/alunos\/editar\/(\d+)$/', $uri, $matches)) {
        $alunoController->edit((int)$matches[1]);
    }
    elseif (preg_match('/^\/alunos\/update\/(\d+)$/', $uri, $matches)) {
        $alunoController->update((int)$matches[1]);
    }
    elseif (preg_match('/^\/alunos\/excluir\/(\d+)$/', $uri, $matches)) {
        $alunoController->delete((int)$matches[1]);
    }
    elseif (preg_match('/^\/alunos\/toggle-status\/(\d+)$/', $uri, $matches)) {
        $alunoController->toggleStatus((int)$matches[1]);
    }
    // Rotas de Matrículas
    elseif (strpos($uri, '/matriculas') === 0 && $method === 'GET') {
        // Verifica se é a rota principal com ou sem parâmetros de busca
        if ($uri === '/matriculas' || parse_url($uri, PHP_URL_PATH) === '/matriculas') {
            $matriculaController->index();
        }
        // Outras rotas de matrícula
        elseif ($uri === '/matriculas/novo') {
            $matriculaController->novo();
        }
        elseif (preg_match('/^\/matriculas\/editar\/(\d+)$/', $uri, $matches)) {
            $matriculaController->edit((int)$matches[1]);
        }
        elseif (preg_match('/^\/matriculas\/excluir\/(\d+)$/', $uri, $matches)) {
            $matriculaController->delete((int)$matches[1]);
        }
    }
    elseif ($uri === '/matriculas/criar' && $method === 'POST') {
        $matriculaController->create();
    }
    elseif (preg_match('/^\/matriculas\/update\/(\d+)$/', $uri, $matches) && $method === 'POST') {
        $matriculaController->update((int)$matches[1]);
    }
    else {
        echo "404 - Página não encontrada";
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}