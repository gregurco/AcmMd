<?php
/* @var $this GroupArticleController */
/* @var $model GroupArticle */

$this->menu=array(
	array('label'=>'Создать группу статей', 'url'=>array('create')),
    array('label'=>'Список статей', 'url'=>array('article/index')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#group-article-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Group Articles</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'group-article-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title_ru',
		'title_ro',
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
