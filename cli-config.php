<?php

require_once "vendor/autoload.php";

use Doctrine\DBAL\DriverManager;
use Doctrine\Migrations\Configuration\Migration\ConfigurationArray;
use Doctrine\Migrations\Configuration\Connection\ExistingConnection;
use Doctrine\Migrations\DependencyFactory;

$connectionParams = [
    'driver'   => 'pdo_mysql',
    'host'     => 'localhost',
    'dbname'   => 'admin',
    'user'     => 'root',
    'password' => 'root'
];

$connection = DriverManager::getConnection($connectionParams);

$config = new ConfigurationArray([
    'table_storage' => [
        'table_name' => 'doctrine_migration_versions'
    ],
    'migrations_paths' => [
        'Database\Migrations' => __DIR__ . '/database/migrations'
    ],
    'all_or_nothing' => true,
    'check_database_platform' => true,
]);

$dependencyFactory = DependencyFactory::fromConnection(
    $config,
    new ExistingConnection($connection)
);

return $dependencyFactory;