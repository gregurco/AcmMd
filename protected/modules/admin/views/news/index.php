<?php
/* @var $this NewsController */
/* @var $model News */

$this->menu=array(
	array('label'=>'Создать новость', 'url'=>array('create')),
    array('label'=>'Список комментариев', 'url'=>array('newsComment/index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#news-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage News</h1>

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
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'name' => 'title_ru',
            'value' => '$data->title_ru',
            'header' => 'Название (рус.)',
        ),
        array(
            'name' => 'title_ro',
            'value' => '$data->title_ro',
            'header' => 'Название (рум.)',
        ),
        /*
        array(
            'name' => 'text_ru',
            'value' => '$data->text_ru',
            'header' => 'Текст (рус.)',
        ),
        array(
            'name' => 'text_ro',
            'value' => '$data->text_ro',
            'header' => 'Текст (рум.)',
        ),
        */
        array(
            'name' => 'create',
            'value' => 'date("j.m.Y",$data->create)',
            'header' => 'Создано',
            'htmlOptions' => array(
                'style' => 'text-align: center;',
            ),
        ),
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
