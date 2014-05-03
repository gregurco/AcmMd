<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);

$this->menu=array(
    array('label'=>'Список пользователей', 'url'=>array('index')),
    array('label'=>'Создать пользователя', 'url'=>array('create')),
	array('label'=>'Редактировать пользователя', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить пользователя', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'login',
		'name',
		'surname',
		'email',
        array(
            'name' => 'admin',
            'value' => ($model->admin)?"Да":"Нет",
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
            'type' => 'html',
            'label' => 'Решенные задачи',
            'value' => implode(', ', $finishedProblem)
        ),
        array(
            'type' => 'html',
            'label' => 'Начатые задачи',
            'value' => implode(', ', $unfinishedProblem)
        ),
        array(
            'label' => 'Баллы',
            'value' => $score,
        ),
        array(
            'label' => 'Последние действие',
            'value' => CHtml::encode(date("Y-m-d H:i:s",$model->time_last_active))
        ),
	),
)); ?>
