<?php

if (isset($_SERVER['HTTP_CLIENT_IP']) || isset($_SERVER['HTTP_X_FORWARDED_FOR']) || !(in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1')))) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file.');
}

if (isset($_POST['clock']) && isset($_POST['ajax'])){
    die(date('H:i:s'));
}

// change the following paths if necessary
require_once(dirname(__FILE__).'/protected/vendor/yiisoft/yii/framework/yii.php');
$config=dirname(__FILE__).'/protected/config/dev.php';
// remove the following lines when in production mode
define('YII_DEBUG', true);

Yii::createWebApplication($config)->run();

