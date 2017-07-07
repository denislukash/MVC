<?php

return [
    'dbConfig' => [
        'host' => '127.0.0.1',
        'nameDatabase' => 'task9',
        'user' => 'root',
        'pass' => '1101992',
        'charset' => 'utf8',
        'typeDatabase' => 'mysql',
        'option' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    ],
    'application' => [
        'defaultController' => [
            'controller' => 'main',
            'action' => 'index'
        ],
        'notFoundController' => [
            'controller' => 'NotFound',
            'action' => 'index'
        ],
        'templatePath' => [
            'default' => 'app/views/templateView.phtml',
            'notFound' => 'app/view/404/template404.phtml'
        ]
    ]
];