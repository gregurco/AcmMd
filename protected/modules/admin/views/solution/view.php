<?php
/* @var $this SolutionController */
/* @var $model Solution */

$this->menu=array(
	array('label'=>'Список решений', 'url'=>array('index')),
	array('label'=>'Удалить решение', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Solution #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'u_id',
		'p_id',
		'time_send',
		'result',
		'tests',
		'log_compile',
		'status',
	),
)); ?>
