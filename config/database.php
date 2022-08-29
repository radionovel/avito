<?php
return [
    'default' => 'mysql',
    'migrations' => 'migrations',
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', 3306),
            'database' => env('DB_DATABASE', 'advertising'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', 'secret'),
        ],
    ]
];
