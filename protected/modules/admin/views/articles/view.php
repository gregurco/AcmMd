<?php
/* @var $this ArticlesController */
/* @var $model Articles */

$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список статей', 'url'=>array('index')),
	array('label'=>'Создать статью', 'url'=>array('create')),
	array('label'=>'Изменить статью', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить статью', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Articles #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title_ru',
		'title_ro',
		'text_ru',
		'text_ro',
		'hide',
	),
)); ?>
