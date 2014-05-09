<?php

if (isset($_POST['clock']) && isset($_POST['ajax']))
    die(date('H:i:s'));

if($_SERVER['SERVER_PORT'] == 80){
	// change the following paths if necessary
	require_once(dirname(__FILE__).'/framework/yii.php');
	$config=dirname(__FILE__).'/protected/config/production.php';
	// remove the following lines when in production mode
	define('YII_DEBUG',false);
}elseif($_SERVER['SERVER_PORT'] == 82){
	// change the following paths if necessary
	require_once(dirname(__FILE__).'/framework/yii.php');
	$config=dirname(__FILE__).'/protected/config/dev1.php';
	// remove the following lines when in production mode
	define('YII_DEBUG', true);
	define('YII_TRACE_LEVEL',3);
}elseif($_SERVER['SERVER_PORT'] == 84){
	// change the following paths if necessary
	require_once(dirname(__FILE__).'/framework/yii.php');
	$config=dirname(__FILE__).'/protected/config/dev2.php';
	// remove the following lines when in production mode
	define('YII_DEBUG', true);
	define('YII_TRACE_LEVEL',3);
}

Yii::createWebApplication($config)->run();

