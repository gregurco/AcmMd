<?php if(Yii::app()->user->hasFlash('addComment')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('addComment'); ?>
    </div>
<? endif; ?>

<div class="form" align="center">
    <?php echo CHtml::beginForm(); ?>
    <?php echo CHtml::errorSummary($newsComment)?>

    <div class="row">
        <?php //echo CHtml::activeTextArea($newsComment, 'text'); ?> <!-- NewsComment[text] -->
        <?php $this->widget('application.extensions.ckeditor.CKEditor', array(
            'model'=>$newsComment,
            'name'=>'text',
            'editorTemplate'=>'basic',
            'value' => $newsComment->text,
        )); ?>
    </div>

    <?php
    if(Yii::app()->user->isGuest)
    {
        echo '<div>';
        echo '<strong>Введите своё Имя:  </strong>' . CHtml::activeTextField($newsComment,'name') . '<b class="errorMessage"> *</b>';
        echo '</div>';
    }

    ?>

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'user-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>
    <?php if(CCaptcha::checkRequirements()): ?>
        <div class="row">
            <?php echo $form->labelEx($newsComment,'verifyCode'); ?>
            <div>
                <?php $this->widget('CCaptcha'); ?><b class="errorMessage"> *</b>
                <?php echo $form->textField($newsComment,'verifyCode'); ?>
            </div>
            <?php echo $form->error($newsComment,'verifyCode'); ?>
        </div>
    <?php endif; ?>
    <div class="row submit">
        <?php echo CHtml::submitButton('Добавить комментарий'); ?>
    </div>
    <?php $this->endWidget(); ?>
    <?php echo CHtml::endForm(); ?>
</div>