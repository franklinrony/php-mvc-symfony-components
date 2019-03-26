<?php
require_once '../../../../configuracion.php';
return
[

    'paths' => [
        //'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        //'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
        'migrations' =>$dir_migraciones,
        'seeds' => $dir_seeds
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'development',
        'production' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'production_db',
            'user' => 'root',
            'pass' => '',
            'port' => '3306',
            'charset' => 'utf8',
        ],
        'development' => [
            'adapter' => 'mysql',
            'host' => $db_hostname,
            'name' => $db_nombre,
            'user' => $db_usuario,
            'pass' => $db_password,
            'port' => '3306',
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'testing_db',
            'user' => 'root',
            'pass' => '',
            'port' => '3306',
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];