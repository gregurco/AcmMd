<?php
/* @var $this ProblemController */
/* @var $data Problem */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_ru')); ?>:</b>
	<?php echo CHtml::encode($data->name_ru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_ro')); ?>:</b>
	<?php echo CHtml::encode($data->name_ro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description_ru')); ?>:</b>
	<?php echo CHtml::encode($data->description_ru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description_ro')); ?>:</b>
	<?php echo CHtml::encode($data->description_ro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('input_ru')); ?>:</b>
	<?php echo CHtml::encode($data->input_ru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('input_ro')); ?>:</b>
	<?php echo CHtml::encode($data->input_ro); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('output_ru')); ?>:</b>
	<?php echo CHtml::encode($data->output_ru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('output_ro')); ?>:</b>
	<?php echo CHtml::encode($data->output_ro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tests')); ?>:</b>
	<?php echo CHtml::encode($data->tests); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('limit_time')); ?>:</b>
	<?php echo CHtml::encode($data->limit_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('limit_memory')); ?>:</b>
	<?php echo CHtml::encode($data->limit_memory); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('examples')); ?>:</b>
	<?php echo CHtml::encode($data->examples); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hide')); ?>:</b>
	<?php echo CHtml::encode($data->hide); ?>
	<br />

	*/ ?>

</div>