<?php

if (isset($_POST['clock']) && isset($_POST['ajax'])){
    die(date('H:i:s'));
}

// change the following paths if necessary
require_once(dirname(__FILE__).'/vendor/yiisoft/yii/framework/yii.php');
$config=dirname(__FILE__).'/protected/config/production.php';
// remove the following lines when in production mode
define('YII_DEBUG', false);

Yii::createWebApplication($config)->run();

