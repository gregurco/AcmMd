<?php
/* @var $this ProblemController */
/* @var $model Problem */

$this->menu=array(
    array('label'=>'Список задач', 'url'=>array('index')),
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
	),
)); ?>
