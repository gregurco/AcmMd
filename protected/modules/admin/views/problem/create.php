<?php
/* @var $this ProblemController */
/* @var $model Problem */

$this->menu=array(
	array('label'=>'Список задач', 'url'=>array('index')),
);
?>

<h1>Create Problem</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>