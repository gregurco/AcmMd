<?php
/* @var $this ConfigController */
/* @var $model Config */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'config-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <? if ($model->type=='boolean'): ?>
        <div class="row">
            <?php echo $form->labelEx($model,'value'); ?>
            <?php echo $form->dropDownList($model,'value',array(0=>'Нет', 1=>'Да')); ?>
            <?php echo $form->error($model,'value'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'default'); ?>
            <?php echo $form->dropDownList($model,'default',array(0=>'Нет', 1=>'Да')); ?>
            <?php echo $form->error($model,'default'); ?>
        </div>
    <? else: ?>
        <div class="row">
            <?php echo $form->labelEx($model,'value'); ?>
            <?php echo $form->textArea($model,'value',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'value'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'default'); ?>
            <?php echo $form->textArea($model,'default',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'default'); ?>
        </div>
    <? endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->