<?php
/* @var $this NewsController */
/* @var $model News */

$this->menu=array(
    array('label'=>'Список новостей', 'url'=>array('index')),
    array('label'=>'Список комментариев', 'url'=>array('newsComment/index')),
    array('label'=>'Создать новость', 'url'=>array('create')),
	array('label'=>'Изменить новость', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить новость', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View News #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title_ru',
		'title_ro',
		'text_ru',
		'text_ro',
		'create',
		'hide',
	),
)); ?>
