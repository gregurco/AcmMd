<?php
/* @var $this ArticlesController */
/* @var $data Articles */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_ru')); ?>:</b>
	<?php echo CHtml::encode($data->title_ru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_ro')); ?>:</b>
	<?php echo CHtml::encode($data->title_ro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text_ru')); ?>:</b>
	<?php echo CHtml::encode($data->text_ru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text_ro')); ?>:</b>
	<?php echo CHtml::encode($data->text_ro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hide')); ?>:</b>
	<?php echo CHtml::encode($data->hide); ?>
	<br />


</div>