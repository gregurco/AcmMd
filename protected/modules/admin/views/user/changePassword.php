<?php
/* @var $this UserController */
/* @var $model User */
$this->menu=array(
    array('label'=>'Список пользователей', 'url'=>array('index')),
    array('label'=>'Создать пользователя', 'url'=>array('create')),
    array('label'=>'Просмотреть пользователя', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<div class="form" style="text-align: center;">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'user-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'Пароль'); ?>
        <?php echo $form->textField($model,'password',array('size'=>30,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'password'); ?>
        <input type="button" value="Сгенерировать пароль" onclick="Genelate_password();">
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton('Изменить'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->