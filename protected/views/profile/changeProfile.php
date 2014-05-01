<?php
/* @var $this SiteController */
$this->menu=array(
    array('label'=>'Изменить пароль', 'url'=>array('profile/changePassword')),
    array('label'=>'Редактирование профиля', 'url'=>array('profile/changeProfile')),
);
?>

<div class="form" align="center">
    <?php if(Yii::app()->user->hasFlash('profile')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('profile'); ?>
        </div>
    <? else: ?>
        <?php echo CHtml::beginForm(); ?>
        <?php echo CHtml::errorSummary($model)?>

        <div class="row">
            <?php echo CHtml::activeLabel($model,'name'); ?>
            <?php echo CHtml::activeTextField($model,'name'); ?>
        </div>

        <div class="row">
            <?php echo CHtml::activeLabel($model,'surname'); ?>
            <?php echo CHtml::activeTextField($model,'surname'); ?>
        </div>

        <div class="row">
            <?php echo CHtml::activeLabel($model,'email'); ?>
            <?php echo CHtml::activeTextField($model,'email'); ?>
        </div>

        <div class="row submit">
            <?php echo CHtml::submitButton('Сохранить'); ?>
        </div>
        <?php echo CHtml::endForm(); ?>
    <? endif; ?>
</div>