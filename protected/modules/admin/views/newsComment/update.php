<?php
/* @var $this NewsCommentController */
/* @var $model NewsComment */

$this->menu=array(
    array('label'=>'Список комментариев', 'url'=>array('index')),
    array('label'=>'Список новостей', 'url'=>array('news/index')),
    array('label'=>'Просмотр комментариея', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update NewsComment <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>