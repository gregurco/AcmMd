<div class="form" align="center">
    <?php if(Yii::app()->user->hasFlash('register')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('register'); ?>
        </div>
    <?php else: ?>
        <?php echo CHtml::beginForm(); ?>

        <?php echo CHtml::errorSummary($model)?>

        <div class="row">
            <?php echo CHtml::activeLabel($model,'login')?><b class="errorMessage">*</b>
            <?php echo CHtml::activeTextField($model,'login'); ?>
        </div>

        <div class="row">
            <?php echo CHtml::activeLabel($model,'password'); ?><b class="errorMessage">*</b>
            <?php echo CHtml::activePasswordField($model,'password'); ?>
        </div>

        <div class="row">
            <?php echo CHtml::activeLabel($model,'password_repeat'); ?><b class="errorMessage">*</b>
            <?php echo CHtml::activePasswordField($model,'password_repeat'); ?>
        </div>

        <div class="row">
            <?php echo CHtml::activeLabel($model,'name'); ?>
            <?php echo CHtml::activeTextField($model,'name') ?>
        </div>

        <div class="row">
            <?php echo CHtml::activeLabel($model,'surname'); ?>
            <?php echo CHtml::activeTextField($model,'surname') ?>
        </div>


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
                <?php echo $form->labelEx($model,'verifyCode'); ?>
                <div>
                    <?php $this->widget('CCaptcha'); ?><b class="errorMessage"> *</b>
                    <?php echo $form->textField($model,'verifyCode'); ?>
                </div>
                <?php echo $form->error($model,'verifyCode'); ?>
            </div>
        <?php endif; ?>

        <div class="row submit">
            <?php echo CHtml::submitButton('Зарегистрироваться'); ?>
        </div>

        <?php echo CHtml::endForm(); ?>
        <?php $this->endWidget(); ?>
    <?php endif; ?>
</div>
