<?php
/* @var $this SiteController */
$this->menu=array(
    array('label'=>'Изменить пароль', 'url'=>array('profile/changePassword')),
    array('label'=>'Редактирование профиля', 'url'=>array('profile/changeProfile')),
);
?>

<h1 align="center">Какая-то информация о пользователе <?php echo Yii::app()->user->name;?></h1>
