<?php

$this->menu=array(
    array('label'=>'Создать статью', 'url'=>array('create')),
    array('label'=>'Список групп статей', 'url'=>array('groupArticle/index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#article-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Article</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
        'model'=>$model,
    )); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'article-grid',
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
            'name' => 'groupTitle',
            'value' => '$data->groupArticle->title_'.Yii::app()->session["language"],
        ),
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>
