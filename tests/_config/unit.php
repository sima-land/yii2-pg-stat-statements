<?php

return [
    'id' => 'yii2-pg-stat-statements',
    'name' => 'Yii2 pg stat statements',
    'basePath' => dirname(__DIR__),
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'sqlite:' . dirname(__DIR__) . '/_output/sqlite_test.db',
            'charset' => 'utf8',
        ],
    ]
];
