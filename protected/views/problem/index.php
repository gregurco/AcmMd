<?php
/* @var $this ProblemController */
/* @var $model Problem */

$this->menu=array(
	array('label'=>'Список задач', 'url'=>array('index')),
    array('label'=>'Решенные задачи', 'url'=>array('#')),
    array('label'=>'Начатые задачи', 'url'=>array('#')),
    array('label'=>'Отправленные решения', 'url'=>array('solution/index')),
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
        array(
            'header' => '№',
            'value'  => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + $row + 1',
            'htmlOptions'=>array('width'=>'20px'),
        ),
        array(
            'name' => 'name_'.Yii::app()->session['language'],
            'value' => '$data->name_'.Yii::app()->session['language'],
            'header' => 'Название'
        ),
        array(
            'type'=>'html',
            'value' => 'CHtml::link("Просмотреть", array("view", "id" => $data->id))',
            'header' => 'Действие'
        ),
	),
)); ?>
