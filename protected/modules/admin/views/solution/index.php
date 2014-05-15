<?php
/* @var $this SolutionController */
/* @var $model Solution */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#solution-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Solutions</h1>

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
	'id'=>'solution-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'name' => 'userLogin',
            'value' => '$data->user->login',
            'header' => 'Пользователь',
        ),
        array(
            'name' => 'problemName',
            'value' => '$data->problem->name_'.Yii::app()->session["language"],
            'header' => 'Задача',
        ),
        array(
            'name' => 'compiler',
            'value' => '$data->compiler',
            'header' => 'Компилятор',
        ),
        array(
            'name' => 'status',
            'value' => '$data->getStatusName($data->status)',
            'header' => 'Статус',
        ),
        array(
            'name' => 'time_send',
            'value' => 'date("j.m.Y",$data->time_send)',
            'header' => 'Время отправки',
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{delete}',
        ),
	),
)); ?>
