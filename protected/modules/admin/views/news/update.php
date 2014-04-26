<?php
/* @var $this NewsController */
/* @var $model News */

$this->menu=array(
    array('label'=>'Список новостей', 'url'=>array('index')),
    array('label'=>'Список комментариев', 'url'=>array('newsComment/index')),
    array('label'=>'Создать новость', 'url'=>array('create')),
	array('label'=>'Просмотр новости', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update News <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>