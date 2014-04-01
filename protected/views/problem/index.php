<?php
/* @var $this ProblemController */
/* @var $model Problem */

$this->breadcrumbs=array(
	'Problems'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Список задач', 'url'=>array('index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#problem-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Список задач</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'problem-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'enableSorting'=>false,
	'columns'=>array(
		'id',
        array(
            'name' => 'name_ru',
            'value' => '$data->name_ru',
            'header' => 'Название'
        ),
        array(
            'type'=>'html',
            'value' => 'CHtml::link("Просмотреть", array("view", "id" => $data->id))',
            'header' => 'Действие'
        ),
	),
)); ?>
