<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

?>
<h1 style="text-align: center;">Авторизация</h1>

<div class="form" style="text-align: center;">
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
            <?php echo $form->textFieldGroup($model,'username'); ?>
        </div>

        <div class="row">
            <?php echo $form->passwordFieldGroup($model,'password'); ?>
        </div>

        <div class="row rememberMe">
            <?php echo $form->checkboxGroup($model,'rememberMe'); ?>
            <?php echo $form->error($model,'rememberMe'); ?>
        </div>

        <?php echo CHtml::link('Зарегестрироваться','register')?>

        <div class="row buttons">
            <?php
            $this->widget(
                'booster.widgets.TbButton',
                array('buttonType' => 'submit', 'label' => 'Войти')
            );
            ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
    <div class="col-md-2"></div>
</div><!-- form -->