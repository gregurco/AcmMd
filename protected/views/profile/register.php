<h1 style="text-align: center;">Регистрация</h1>
<div class="form" align="center">
    <?php if(Yii::app()->user->hasFlash('register')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('register'); ?>
        </div>
    <?php else: ?>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
            $form = $this->beginWidget(
                'booster.widgets.TbActiveForm',
                array(
                    'id'=>'login-form',
                    'htmlOptions' => array('class' => 'well'), // for inset effect
                )
            );
            ?>

                <div class="row">
                    <?php echo $form->textFieldGroup($model,'login'); ?>
                </div>

                <div class="row">
                    <?php echo $form->passwordFieldGroup($model,'password'); ?>
                </div>

                <div class="row">
                    <?php echo $form->passwordFieldGroup($model,'password_repeat'); ?>
                </div>

                <div class="row">
                    <?php echo $form->textFieldGroup($model,'email'); ?>
                </div>

                <div class="row">
                    <?php echo $form->textFieldGroup($model,'name'); ?>
                </div>

                <div class="row">
                    <?php echo $form->textFieldGroup($model,'surname'); ?>
                </div>

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
                    <?php
                    $this->widget(
                        'booster.widgets.TbButton',
                        array('buttonType' => 'submit', 'label' => 'Зарегистрироваться')
                    );
                    ?>
                </div>

            <?php $this->endWidget(); ?>
        </div>
        <div class="col-md-2"></div>
    <?php endif; ?>
</div>