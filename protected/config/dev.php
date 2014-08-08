<?php
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'algoRITMica',
    'defaultController' => 'news',
    'timeZone' => 'Europe/Chisinau',
    // preloading 'log' component
    'preload'=>array('log', 'config'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
    ),

    'modules'=>array(
        'admin',
    ),

    // application components
    'components'=>array(
        'db'=>array(
            'class'=>'system.db.CDbConnection',
            'connectionString' => 'mysql:host=localhost;dbname=acmMd',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '12345',
            'charset' => 'utf8',
            'tablePrefix' => 'a_'
        ),
        'db2'=>array(
            'class'=>'system.db.CDbConnection',
            'connectionString' => 'mysql:host=localhost;dbname=acmMdC',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '12345',
            'charset' => 'utf8',
            'tablePrefix' => 'c_'
        ),
        'request'=>array(
            'class'=>'DLanguageHttpRequest',
        ),
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
            'class' => 'WebUser',
            'loginUrl' => 'profile/login',
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager'=>array(
            'urlFormat'=>'path',
            'rules'=>array(
                '<language:(ru|ro)>/' => 'site/index',
                '<language:(ru|ro)>/<action:(contact|login|logout)>' => 'site/<action>',
                '<language:(ru|ro)>/<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<language:(ru|ro)>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<language:(ru|ro)>/<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            )
        ),
        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'enabled'=>YII_DEBUG,
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                array(
                    'class'=>'application.extensions.yii-debug-toolbar.YiiDebugToolbarRoute',
                    'ipFilters'=>array('127.0.0.1','95.65.77.178'),
                ),
            ),
        ),
        'clientScript' => array(
            'packages'=>array(
                'main_js' => array(
                    'baseUrl'=>'js/',
                    'js'=>array('functions.js'),
                ),
                'main_css' => array(
                    'baseUrl'=>'css/',
                    'css'=>array('menu.css', 'main.css', 'form.css', 'templatemo_style.css'),
                ),
            ),
        ),
        'file'=>array(
            'class'=>'application.extensions.file.CFile',
        ),
        'config'=>array(
            'class' => 'DConfig',
            'cache'=>3600,
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'webmaster@example.com',
        'translatedLanguages'=>array(
            'ru'=>'Russian',
            'ro'=>'Romanian',
        ),
        'defaultLanguage'=>'ru',
    ),
);