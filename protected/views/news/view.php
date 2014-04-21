<?php
/* @var $this NewsController */
/* @var $model News */
$this->menu=array(
    array('label'=>'Список новостей', 'url'=>array('index')),
);
?>

<h1 align="center"><?php echo $model->getTitle($model); ?></h1>

<p align="left"><?php echo $model->getText($model); ?></p>
