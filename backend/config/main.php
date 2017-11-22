<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => include(__DIR__ . DIRECTORY_SEPARATOR . 'modules.php'),
    'defaultRoute' => ['/core/index/index'],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '/admin',
        ],
        'user' => [
            'identityClass' => 'backend\modules\user\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'loginUrl' => ['/user/security/login'],
        ],
        'view' => [
            'theme' => [
                'basePath' => '@app/themes/adminox',
                'baseUrl' => '@web/themes/adminox',
                'pathMap' => [
                    '@app/views' => '@app/themes/adminox',
                    '@app/modules' => '@app/themes/adminox/modules',
                    '@app/widgets' => '@app/themes/adminox/modules',
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
                'yii\web\JqueryAsset' => [
                    'js'=>[]
                ],
            ],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => '/core/index/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => include(__DIR__ . DIRECTORY_SEPARATOR . 'rules.php'),
        ],

    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\Controller',
            'access' => ['@', '?'], //глобальный доступ к фаил менеджеру @ - для авторизорованных , ? - для гостей , чтоб открыть всем ['@', '?']
            //'disabledCommands' => ['netmount'], //отключение ненужных команд https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#commands
            'roots' => [
                [
                    'baseUrl'=>'',
                    'basePath'=>'@frontend/web',
                    'path' => '/files/articles',
                    'name' => 'Articles'
                ],
            ],
        ]
    ],
    'params' => $params,
];
