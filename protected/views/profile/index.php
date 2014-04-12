<?php
/* @var $this SiteController */
$this->menu=array(
    array('label'=>'Изменить пароль', 'url'=>array('profile/password')),
);
$this->pageTitle=Yii::app()->name;
?>

<h1 align="center">Какая-то информация о пользователе</h1><?php echo $model->login;?>
