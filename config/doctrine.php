<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once __DIR__ . '/../vendor/autoload.php';

$paths = [__DIR__ . '/../app/Models'];
$isDevMode = true;

try {
    // Configuração usando o novo método
    $config = ORMSetup::createAttributeMetadataConfiguration(
        paths: $paths,
        isDevMode: $isDevMode,
    );

    // Configuração do banco de dados
    $connectionParams = [
        'driver'   => 'pdo_mysql',
        'host'     => 'localhost',
        'port'     => 3306,
        'dbname'   => 'admin',
        'user'     => 'root',
        'password' => 'root',
        'charset'  => 'utf8mb4'
    ];

    // Criar conexão
    $connection = DriverManager::getConnection($connectionParams, $config);

    // Criar EntityManager
    return new EntityManager($connection, $config);

} catch (\Exception $e) {
    die("Erro na configuração do Doctrine: " . $e->getMessage());
}
