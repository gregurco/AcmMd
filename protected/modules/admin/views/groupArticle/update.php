<?php
/* @var $this GroupArticleController */
/* @var $model GroupArticle */

$this->menu=array(
	array('label'=>'Список групп новостей', 'url'=>array('index')),
    array('label'=>'Список статей', 'url'=>array('article/index')),
	array('label'=>'Создать группу новостей', 'url'=>array('create')),
	array('label'=>'Просмотр групппы новостей', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Изменить группу новостей <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>