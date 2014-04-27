<?php
$this->menu=array(
	array('label'=>'Список статей', 'url'=>array('index')),
    array('label'=>'Список групп статей', 'url'=>array('groupArticle/index')),
    array('label'=>'Создать статью', 'url'=>array('create')),
	array('label'=>'Изменить статью', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить статью', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Article #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title_ru',
		'title_ro',
		'text_ru',
		'text_ro',
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
        array(
            'name' => 'groupTitle',
            'value' => $model->groupArticle->title,
        ),
	),
)); ?>
