<?php

define('ROOT_PATH', dirname(__DIR__));

require_once ROOT_PATH . '/vendor/autoload.php';

try {
    $smarty = new Smarty\Smarty();

    // Configura os diretórios
    $smarty->setTemplateDir(ROOT_PATH . '/app/Views/templates/');
    $smarty->setCompileDir(ROOT_PATH . '/app/Views/templates_c/');
    $smarty->setCacheDir(ROOT_PATH . '/app/Views/cache/');
    $smarty->setConfigDir(ROOT_PATH . '/app/Views/configs/');

    // Desativa debug e cache
    $smarty->debugging = false;    // Muda para false
    $smarty->caching = false;
    $smarty->force_compile = true;

    return $smarty;

} catch (Exception $e) {
    die('Erro ao configurar Smarty: ' . $e->getMessage());
}