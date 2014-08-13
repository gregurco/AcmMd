<?php
$this->menu=array(
    array('label'=>'Список статей', 'url'=>array('index')),
);
?>

<h1 class="text-center"><?php echo $model->title; ?></h1>

<p class="text-left"><?php  echo $model->text; ?></p>