<?php
/* @var $this UserController */
/* @var $model User */

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
);
?>

<h1>Create User</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>