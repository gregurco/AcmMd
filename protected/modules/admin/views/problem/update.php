<?php
/* @var $this ProblemController */
/* @var $model Problem */

$this->menu=array(
    array('label'=>'Список задач', 'url'=>array('index')),
    array('label'=>'Создать задача', 'url'=>array('create')),
	array('label'=>'Просмотр задачи', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Problem <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>