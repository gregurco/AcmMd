<?php
/* @var $this UserController */
/* @var $model User */

$this->menu=array(
	array('label'=>'Создать пользователя', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>

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
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'name' => 'login',
            'value' => '$data->login',
            'header' => 'Логин',
        ),
        array(
            'name' => 'email',
            'value' => '$data->email',
            'header' => 'Email',
        ),
        array(
            'name' => 'name',
            'value' => '$data->name',
            'header' => 'Имя',
        ),
        array(
            'name' => 'surname',
            'value' => '$data->surname',
            'header' => 'Фамилия',
        ),
        array(
            'name' => 'time_last_active',
            'value' => '(date("Y-m-d H:i:s",$data->time_last_active))',
            'header' => 'Последние действие',
        ),
        array(
            'name' => 'admin',
            'value' => '($data->admin)?"Да":"Нет"',
            'header' => 'Администратор',
            'htmlOptions' => array(
                'style' => 'text-align: center;',
            ),
            'filter' => array(
                0 => "Нет",
                1 => "Да",
            ),
        ),
        array(
            'type'=>'html',
            'value' => 'CHtml::link("Изменить", array("changePassword", "id" => $data->id))',
            'header' => 'Пароль',
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
