<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'TransIT',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'as access' => [
         'class' => '\hscstudio\mimin\components\AccessControl',
         'allowActions' => [
            // add wildcard allowed action here!
            // '*',
            // 'user/*',
            // 'user/profile/*',
            'user/security/*',
            'user/recovery/*',
            'user/registration/*',
            'user/register',
            // 'gii/*',
            'site/index',
            // 'debug/*',
            // 'mimin/*', // only in dev mode
            // 'subject/*',
        ],
    ],
    'modules' => [
        'mimin' => [
            'class' => '\hscstudio\mimin\Module',
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'mailer' => [
                'sender'                => ['transitftikusm@gmail.com' => 'TransIT Universitas Semarang'],
                'welcomeSubject'        => 'Welcome Jurnal TransIT Universitas Semarang',
                'confirmationSubject'   => 'Confirmation Registration Jurnal TransIT Universitas Semarang',
                'reconfirmationSubject' => 'Email Confrim Jurnal TransIT Universitas Semarang',
                'recoverySubject'       => 'Recovery Jurnal TransIT Universitas Semarang',
            ],
            'modelMap' => [
                'User' => 'app\models\User',
                'RegistrationForm' => 'app\models\RegistrationForm',
            ],
            'controllerMap' => [
                'admin' => 'app\controllers\user\AdminController',
                'recovery' => 'app\controllers\user\RecoveryController',
                'registration' => 'app\controllers\user\RegistrationController',
            ],
            'enableConfirmation' => true,
            'enableUnconfirmedLogin' => false,
            'admins' => ['sysadmintransit'],
        ],
    ],
    'components' => [
         'formatter' => [
            'dateFormat' => 'd-M-Y H:i:s',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'IDR',
            'locale' => 'id_ID',
            'timeZone' => 'Asia/Jakarta'
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // only support DbManager
        ],
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-yellow-light',
                ],
            ],
        ],
        'view' => [
             'theme' => [
                 'pathMap' => [
                    '@app/views' => '@app/views/admin-lte',
                    '@dektrium/user/views' => '@app/views/user',
                 ],
             ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'puiPI-1uWS4mVun85LjVnuTK2BUjhxBR',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            // 'class' => 'app\components\User',
            // 'identityClass' => 'dektrium\user\models\User',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'transitftikusm@gmail.com',
                'password' => 'transitftikusm123!',
                'port' => '587',
                'encryption' => 'tls',
            ],
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
        'allowedIPs' => ['127.0.0.1', '::1','*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1','*'],
    ];
}

return $config;
