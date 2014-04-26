<?php
/* @var $this ProblemController */
/* @var $model Problem */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name_ru'); ?>
		<?php echo $form->textField($model,'name_ru',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name_ro'); ?>
		<?php echo $form->textField($model,'name_ro',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description_ru'); ?>
		<?php echo $form->textArea($model,'description_ru',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description_ro'); ?>
		<?php echo $form->textArea($model,'description_ro',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'input_ru'); ?>
		<?php echo $form->textArea($model,'input_ru',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'input_ro'); ?>
		<?php echo $form->textArea($model,'input_ro',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'output_ru'); ?>
		<?php echo $form->textArea($model,'output_ru',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'output_ro'); ?>
		<?php echo $form->textArea($model,'output_ro',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tests'); ?>
		<?php echo $form->textField($model,'tests',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'limit_time'); ?>
		<?php echo $form->textField($model,'limit_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'limit_memory'); ?>
		<?php echo $form->textField($model,'limit_memory'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'examples'); ?>
		<?php echo $form->textArea($model,'examples',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hide'); ?>
		<?php echo $form->textField($model,'hide'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->