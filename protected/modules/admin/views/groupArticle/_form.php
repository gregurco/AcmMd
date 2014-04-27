<?php
/* @var $this GroupArticleController */
/* @var $model GroupArticle */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'group-article-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title_ru'); ?>
		<?php echo $form->textField($model,'title_ru',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title_ru'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title_ro'); ?>
		<?php echo $form->textField($model,'title_ro',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title_ro'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'Скрыт'); ?>
        <?php echo $form->dropDownList($model,'hide',array(0=>'Нет', 1=>'Да')); ?>
        <?php echo $form->error($model,'hide'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->