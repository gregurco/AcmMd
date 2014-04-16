<div class="form" align="center">
    <?php if(Yii::app()->user->hasFlash('register')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('register'); ?>
        </div>
    <?php else: ?>
        <?php echo CHtml::beginForm(); ?>

        <?php echo CHtml::errorSummary($form)?>

        <div class="row">
            <?php echo CHtml::activeLabel($form,'login')?><b class="errorMessage">*</b>
            <?php echo CHtml::activeTextField($form,'login'); ?>
        </div>

        <div class="row">
            <?php echo CHtml::activeLabel($form,'password'); ?><b class="errorMessage">*</b>
            <?php echo CHtml::activePasswordField($form,'password'); ?>
        </div>

        <div class="row">
            <?php echo CHtml::activeLabel($form,'password_repeat'); ?><b class="errorMessage">*</b>
            <?php echo CHtml::activePasswordField($form,'password_repeat'); ?>
        </div>

        <div class="row">
            <?php echo CHtml::activeLabel($form,'name'); ?>
            <?php echo CHtml::activeTextField($form,'name') ?>
        </div>

        <div class="row">
            <?php echo CHtml::activeLabel($form,'surname'); ?>
            <?php echo CHtml::activeTextField($form,'surname') ?>
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
