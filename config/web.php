<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'layout' => 'main',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language' => 'ru',
    'components' => [

        'assetManager' => [
            'bundles' => [
                'yidas\yii\fontawesome\FontawesomeAsset' => [
                    'cdn' => true,
                    'cdnCSS' => ['//maxcdn.bootstrapcdn.com/font-awesome/5.11.0/css/font-awesome.min.css'],
                ],
            ],
        ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'IWXU6K3D0xvn-5Dj4SW65JD4VGoztrRI',
            //'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
  /*              '/'=>'/site/index',
                'Блог'=>'/articles/index',
                '<title:.+>'=>'/articles/article',
                'Инструменты'=>'/tools/index',
                'Получить_ответ_сервера'=>'/tools/http-request-headers',
                'Узнать_IP_адрес_сайта'=>'/tools/website-to-ip',
                'Кодировать_/_декодировать URL'=>'/tools/url-encode-decode',*/

                //'Тест'=>'/tests/index',
                //'Тест_PHP'=>'/tests/PHP',

                //'Статьи/<page:\d+>'=>'/page/articles',
                //'admin/<action:\w+>'=>'/admin/posts/<action>',
                //'admin/<action:\w+>/<id:\d+>'=>'/admin/posts/<action>',
                //'admin'=>'/admin/posts/index',
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
        'allowedIPs' => ['*'],
    ];
}

return $config;
