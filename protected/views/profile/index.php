<?php
/* @var $this SiteController */
/* @var $this SiteController */
$this->menu=array(
    array('label'=>'Изменить пароль', 'url'=>array('profile/changePassword')),
    array('label'=>'Изменить Имя', 'url'=>array('profile/changeName')),
    array('label'=>'Изменить Фамилию', 'url'=>array('profile/changeSurname')),
);
?>

<h1 align="center">Какая-то информация о пользователе <?php echo Yii::app()->user->name;?></h1>
