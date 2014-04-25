<?php
/* @var $this NewsCommentController */
/* @var $model NewsComment */

$this->menu=array(
    array('label'=>'Список новостей', 'url'=>array('news/index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#news-comment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage News Comments</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-comment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'name'=>'newsTitle',
            'value'=>'$data->news->title_'.Yii::app()->session["language"],
        ),
        array(
            'name'=>'name',
            'value'=>'$data->name',
        ),
        array(
            'name'=>'userLogin',
            'value'=>'($data->user)?$data->user->login:""',
        ),
        array(
            'name'=>'create',
            'value'=> 'date("Y-m-d H:i:s",$data->create)',
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
