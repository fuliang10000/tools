<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii2advanced',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
        'redis' => [
            'class'    => 'yii\redis\Connection',
            'hostname' => '172.23.238.0',
            'port'     => 6379,
            'database' => 15,
            'password' => '2008Fuliang11~',
        ],
    ],
];
