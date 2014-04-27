<?php
/* @var $this GroupArticleController */
/* @var $model GroupArticle */

$this->menu=array(
	array('label'=>'Список групп новостей', 'url'=>array('index')),
    array('label'=>'Список статей', 'url'=>array('article/index')),
);
?>

<h1>Создать группу новостей</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>