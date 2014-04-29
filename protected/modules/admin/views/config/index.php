<?php
/* @var $this ConfigController */
/* @var $model Config */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#config-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Configs</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'config-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name' => 'label',
            'value' => '$data->label',
            'header' => 'Параметр',
        ),
        array(
            'name' => 'value',
            'value' => '($data->type=="boolean")? ($data->value)?"Да":"Нет" : $data->value',
            'header' => 'Значение',
            'filter' => false,
        ),
        array(
            'name' => 'default',
            'value' => '($data->type=="boolean")? ($data->default)?"Да":"Нет" : $data->default',
            'header' => 'По умолчанию',
            'filter' => false,
        ),
		array(
			'class'=>'CButtonColumn',
            'template'=>'{update}',
		),
	),
)); ?>
