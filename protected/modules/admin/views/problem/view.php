<?php
/* @var $this ProblemController */
/* @var $model Problem */

$this->breadcrumbs=array(
	'Problems'=>array('index'),
	$model->id,
);

$this->menu=array(
    array('label'=>'Список задач', 'url'=>array('index')),
    array('label'=>'Создать задача', 'url'=>array('create')),
	array('label'=>'Редактировать задачу', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить задачу', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Problem #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name_ru',
		'name_ro',
		'description_ru',
		'description_ro',
		'input_ru',
		'input_ro',
		'output_ru',
		'output_ro',
		'tests',
		'limit_time',
		'limit_memory',
		'hide',
	),
)); ?>
