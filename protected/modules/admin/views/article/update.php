<?php
$this->menu=array(
	array('label'=>'Список статей', 'url'=>array('index')),
    array('label'=>'Список групп статей', 'url'=>array('groupArticle/index')),
    array('label'=>'Создать статью', 'url'=>array('create')),
	array('label'=>'Просмотр статьи', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Article <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>