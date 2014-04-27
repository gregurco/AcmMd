<?php
/* @var $this GroupArticleController */
/* @var $model GroupArticle */

$this->breadcrumbs=array(
	'Group Articles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список групп новостей', 'url'=>array('index')),
    array('label'=>'Список статей', 'url'=>array('article/index')),
	array('label'=>'Создать группу новостей', 'url'=>array('create')),
	array('label'=>'Изменить группу новостей', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить группу новостей', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Просмотр группы новостей #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title_ru',
		'title_ro',
        array(
            'name' => 'hide',
            'value' => ($model->hide)?"Да":"Нет",
            'header' => 'Скрыто',
            'htmlOptions' => array(
                'style' => 'text-align: center;',
            ),
            'filter' => array(
                0 => "Нет",
                1 => "Да",
            ),
        ),
	),
)); ?>
