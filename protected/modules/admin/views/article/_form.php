<?php
/* @var $this ArticleController */
/* @var $model Article */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Название_рус'); ?>
		<?php echo $form->textField($model,'title_ru',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title_ru'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Название_рум'); ?>
		<?php echo $form->textField($model,'title_ro',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title_ro'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'Текст_рус'); ?>
        <?php $this->widget('application.extensions.ckeditor.CKEditor', array(
            'model'=>$model,
            'attribute'=>'text_ru',
            'language'=>'ru',
            'editorTemplate'=>'full',
        )); ?>
        <?php echo $form->error($model,'text_ru'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'Текст_рум'); ?>
        <?php $this->widget('application.extensions.ckeditor.CKEditor', array(
            'model'=>$model,
            'attribute'=>'text_ro',
            'language'=>'ro',
            'editorTemplate'=>'full',
        )); ?>
        <?php echo $form->error($model,'text_ro'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'Скрыт'); ?>
		<?php echo $form->dropDownList($model,'hide',array(0=>'Нет', 1=>'Да')); ?>
		<?php echo $form->error($model,'hide'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'Группа статей'); ?>
		<?php echo $form->dropDownList($model,'g_id',CHtml::listData(GroupArticle::model()->findAll(), 'id' ,'title')) ?>
		<?php echo $form->error($model,'g_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->