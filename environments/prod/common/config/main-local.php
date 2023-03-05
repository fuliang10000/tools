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
            'hostname' => '172.17.0.1',
            'port'     => 6379,
            'database' => 1,
            'password' => '2008Fuliang11',
        ],
    ],
];
