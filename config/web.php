<?php
use \kartik\datecontrol\Module;

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'user' => [
            //'class' => 'app\components\User',
            //'identityClass' => 'dektrium\user\models\User',
            'class' => 'dektrium\user\Module',
            'admins' => ['andrii'],
        ],
        'datecontrol' =>  [
            'class' => '\kartik\datecontrol\Module',

            'displaySettings' => [
                Module::FORMAT_DATE => 'dd-MM-yyyy',
                Module::FORMAT_TIME => 'hh:mm:ss a',
                Module::FORMAT_DATETIME => 'dd-MM-yyyy hh:mm:ss a',
            ],
            'saveSettings' => [
                Module::FORMAT_DATE => 'php:yyyy-mm-dd', // saves as unix timestamp
                Module::FORMAT_TIME => 'php:H:i:s',
                Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
            ],

            'displayTimezone' => 'UTC',

            'saveTimezone' => 'UTC',

            'autoWidget' => true,
        ]

    ],
    'components' => [

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'hCWGBXCMNuFA21wiF2f8eQoG9J7T03GS',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        /*'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],*/
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'kaa89pl@gmail.com',
                'password' => '',
                'port' => '587',
                'encryption' => 'tls',
            ],
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            //'useFileTransport' => true,
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

            'authManager' => [
                'class' => 'yii\rbac\DbManager',
            ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'urlSuffix' => '.html',
            'rules' => [
                [
                    'class' => 'yii\web\UrlRule',
                    'pattern' => 'home',
                    'route' => 'site/index',
                    'suffix' => '.html'
                ],
                //'как отображать в браузере' => 'путь к контроллеру и действию'
               // 'home' => 'site/index',
                '<action:about|contact>' => 'site/<action>',
                'catalog' => 'catalog/index',
                'car' => 'iron-horse/index',
                'car/<action:update|view>/<id:\d+>' => 'iron-horse/<action>',
               // 'car/update/<id:\d+>' => 'iron-horse/update',
                'blog/<action:w+>/<id:\d+>' => 'blog/<action>',


                'all' => 'one/all',
               'one/<url>' => 'one/',

            ],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'php: Y-m-d',
          ]

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
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
