<?php
/* @var $this ProblemController */
/* @var $model Problem */

$this->menu=array(
	array('label'=>'Создать задача', 'url'=>array('create')),
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

<h1>Manage Problems</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'problem-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name_ru',
		'name_ro',
        /*
		'description_ru',
		'description_ro',
		'input_ru',
		'input_ro',
		'output_ru',
		'output_ro',
		'tests',
		'limit_time',
		'limit_memory',
		'examples',
        */
        array(
            'name' => 'hide',
            'value' => '($data->hide)?"Да":"Нет"',
            'header' => 'Скрыто',
            'htmlOptions' => array(
                'style' => 'text-align: center;',
            ),
            'filter' => array(
                0 => "Нет",
                1 => "Да",
            ),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
