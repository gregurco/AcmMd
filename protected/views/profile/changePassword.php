<?php
/* @var $this SiteController */
$this->menu=array(
    array('label'=>'Изменить пароль', 'url'=>array('profile/changePassword')),
    array('label'=>'Редактирование профиля', 'url'=>array('profile/changeProfile')),
);
?>
<h1 style="text-align: center;">Изменить пароль</h1>
<div class="form" align="center">
    <?php if(Yii::app()->user->hasFlash('password')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('password'); ?>
        </div>
    <? else: ?>
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
                <?php echo $form->passwordFieldGroup($model,'password'); ?>
            </div>

            <div class="row">
                <?php echo $form->passwordFieldGroup($model,'password_repeat'); ?>
            </div>


            <div class="row submit">
                <?php
                $this->widget(
                    'booster.widgets.TbButton',
                    array('buttonType' => 'submit', 'label' => 'Сохранить')
                );
                ?>
            </div>
        <?php $this->endWidget(); ?>
    <? endif; ?>
</div>