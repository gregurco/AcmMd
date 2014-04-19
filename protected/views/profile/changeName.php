<?php
/* @var $this SiteController */
$this->menu=array(
    array('label'=>'Изменить пароль', 'url'=>array('profile/changePassword')),
    array('label'=>'Изменить Имя', 'url'=>array('profile/changeName')),
    array('label'=>'Изменить Фамилию', 'url'=>array('profile/changeSurname')),
);
?>

<div class="form" align="center">
    <?php if(Yii::app()->user->hasFlash('name')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('name'); ?>
        </div>
    <? else: ?>
        <?php echo CHtml::beginForm(); ?>
        <?php echo CHtml::errorSummary($model)?>

        <div class="row">
            <?php echo CHtml::activeLabel($model,'name'); ?><b class="errorMessage">*</b>
            <?php echo CHtml::activeTextField($model,'name'); ?>
        </div>

        <div class="row submit">
            <?php echo CHtml::submitButton('Сохранить'); ?>
        </div>
        <?php echo CHtml::endForm(); ?>
    <? endif; ?>
</div>