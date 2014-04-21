<?php
/* @var $this SiteController */
$this->menu=array(
    array('label'=>'Изменить пароль', 'url'=>array('profile/changePassword')),
    array('label'=>'Редактирование профиля', 'url'=>array('profile/changeProfile')),
);
?>

<div class="form" align="center">
    <?php if(Yii::app()->user->hasFlash('password')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('password'); ?>
        </div>
    <? else: ?>
        <?php echo CHtml::beginForm(); ?>
            <?php echo CHtml::errorSummary($model)?>

            <div class="row">
                <?php echo CHtml::activeLabel($model,'password'); ?><b class="errorMessage">*</b>
                <?php echo CHtml::activePasswordField($model,'password'); ?>
            </div>

            <div class="row">
                <?php echo CHtml::activeLabel($model,'password_repeat'); ?><b class="errorMessage">*</b>
                <?php echo CHtml::activePasswordField($model,'password_repeat'); ?>
            </div>


            <div class="row submit">
                <?php echo CHtml::submitButton('Сохранить'); ?>
            </div>
        <?php echo CHtml::endForm(); ?>
    <? endif; ?>
</div>