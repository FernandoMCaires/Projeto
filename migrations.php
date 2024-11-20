<?php

declare(strict_types=1);

use Doctrine\DBAL\DriverManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\Configuration\Connection\ExistingConnection;
use Doctrine\Migrations\DependencyFactory;

require_once __DIR__ . '/vendor/autoload.php';

// Configuração da conexão com o banco de dados
$connectionParams = [
    'dbname' => 'admin',
    'user' => 'root',
    'password' => 'root',
    'host' => 'localhost',
    'port' => 3306,
    'driver' => 'pdo_mysql',
    'serverVersion' => '8.0',
    'charset' => 'utf8mb4',
    'driverOptions' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]
];

try {
    echo "Tentando conectar ao banco de dados...\n";
    
    // Teste se o PDO está disponível
    if (!extension_loaded('pdo_mysql')) {
        throw new \Exception('Extensão PDO MySQL não está instalada');
    }
    
    // Tente primeiro com PDO diretamente para teste
    try {
        $pdo = new PDO(
            "mysql:host={$connectionParams['host']};port={$connectionParams['port']};dbname={$connectionParams['dbname']}",
            $connectionParams['user'],
            $connectionParams['password'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
            ]
        );
        echo "Conexão PDO bem sucedida!\n";
    } catch (\PDOException $e) {
        throw new \Exception("Erro PDO: " . $e->getMessage());
    }
    
    // Se chegou aqui, tente com o Doctrine
    try {
        $connection = DriverManager::getConnection($connectionParams);
        $connection->executeQuery('SELECT 1');
        echo "Conexão Doctrine estabelecida com sucesso!\n";
    } catch (\Exception $e) {
        throw new \Exception("Erro Doctrine: " . $e->getMessage() . "\nTrace: " . $e->getTraceAsString());
    }
    
    // Configuração das migrações
    $config = new \Doctrine\Migrations\Configuration\Migration\ConfigurationArray([
        'table_storage' => [
            'table_name' => 'doctrine_migration_versions',
            'version_column_name' => 'version',
            'version_column_length' => 191,
            'executed_at_column_name' => 'executed_at',
            'execution_time_column_name' => 'execution_time',
        ],
        'migrations_paths' => [
            'Database\Migrations' => __DIR__ . '/database/migrations',
        ],
        'all_or_nothing' => true,
        'check_database_platform' => true,
    ]);

    $dependencyFactory = DependencyFactory::fromConnection($config, new ExistingConnection($connection));

    return $dependencyFactory;
    
} catch (\Exception $e) {
    echo "Erro de conexão: " . $e->getMessage() . "\n";
    echo "Parâmetros de conexão utilizados:\n";
    echo "Host: " . $connectionParams['host'] . "\n";
    echo "Porta: " . $connectionParams['port'] . "\n";
    echo "Banco: " . $connectionParams['dbname'] . "\n";
    echo "Usuário: " . $connectionParams['user'] . "\n";
    exit(1);
}
