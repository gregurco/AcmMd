<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'algoRITMica',
    'defaultController' => 'news',

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
			),
            'showScriptName' => false,
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
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