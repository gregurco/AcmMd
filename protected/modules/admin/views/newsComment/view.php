<?php
/* @var $this NewsCommentController */
/* @var $model NewsComment */

$this->menu=array(
    array('label'=>'Список комментариев', 'url'=>array('index')),
    array('label'=>'Список новостей', 'url'=>array('news/index')),
    array('label'=>'Изменить комментарий', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить комментарий', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View NewsComment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'n_id',
		'u_id',
		'create',
		'text',
		'hide',
	),
)); ?>
