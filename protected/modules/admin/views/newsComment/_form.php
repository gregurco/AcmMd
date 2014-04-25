<?php
/* @var $this NewsCommentController */
/* @var $model NewsComment */
/* @var $form CActiveForm */
?>

<div class="form">
    <?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'attributes'=>array(
            'n_id',
            'u_id',
            array(
                'label' => 'Написан',
                'value' => CHtml::encode(date("Y-m-d H:i:s",$model->create)),
            )
        ),
    )); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-comment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'Текст комментария'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hide'); ?>
		<?php echo $form->dropDownList($model,'hide',array('0'=>'Нет','1'=>'Да')); ?>
		<?php echo $form->error($model,'hide'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->