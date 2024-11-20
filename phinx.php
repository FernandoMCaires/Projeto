<?php

return [
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/database/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'admin',
            'user' => 'root',  
            'pass' => 'root',  
            'port' => '3306',
            'charset' => 'utf8'
        ]
    ]
];
