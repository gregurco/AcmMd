<?php
$this->menu=array(
    array('label'=>'Список статей', 'url'=>array('index')),
);
?>

<h1 align="center"><?php echo $model->title; ?></h1>

<p align="left"><?php  $model->text; ?></p>