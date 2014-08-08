<?php

if (isset($_POST['clock']) && isset($_POST['ajax'])){
    die(date('H:i:s'));
}

// change the following paths if necessary
require_once(dirname(__FILE__).'/framework/yii.php');
$config=dirname(__FILE__).'/protected/config/dev.php';
// remove the following lines when in production mode
define('YII_DEBUG', true);

Yii::createWebApplication($config)->run();

