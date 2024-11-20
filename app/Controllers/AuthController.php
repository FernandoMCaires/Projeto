<?php

namespace App\Controllers;

use Doctrine\ORM\EntityManager;
use App\Models\Usuario;
use Smarty\Smarty;

class AuthController
{
    private Smarty $smarty;
    private EntityManager $em;

    public function __construct(Smarty $smarty, EntityManager $em)
    {
        $this->smarty = $smarty;
        $this->em = $em;
    }

    public function loginForm()
    {
        $this->smarty->assign('title', 'Login - Sistema de Matrículas');
        $this->smarty->display('auth/login.tpl');
    }

    public function login()
    {
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        try {
            $usuario = $this->em->getRepository(Usuario::class)
                ->findOneBy(['email' => $email]);
            
            // Debug da verificação da senha
            echo "Senha digitada: " . $senha . "<br>";
            echo "Hash no banco: " . $usuario->getSenha() . "<br>";
            echo "Resultado do password_verify: " . (password_verify($senha, $usuario->getSenha()) ? 'true' : 'false') . "<br>";
            
            if ($usuario && password_verify($senha, $usuario->getSenha())) {
                session_start();
                $_SESSION['usuario_id'] = $usuario->getId();
                $_SESSION['usuario_nome'] = $usuario->getNome();
                
                header('Location: /dashboard');
                exit;
            }

            $this->smarty->assign('error', 'Email ou senha inválidos');
            $this->smarty->display('auth/login.tpl');

        } catch (\Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}