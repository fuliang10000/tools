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
            'useFileTransport' => true,
        ],
        'redis' => [
            'class'    => 'yii\redis\Connection',
            'hostname' => '47.108.220.225',
            'port'     => 6379,
            'database' => 14,
            'password' => '2008Fuliang11~',
        ],
    ],
];
