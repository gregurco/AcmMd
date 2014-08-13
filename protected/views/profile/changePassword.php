<?php
/* @var $this SiteController */
$this->menu=array(
    array('label'=>'Личный кабинет', 'url'=>array('profile/index')),
    array('label'=>'Изменить пароль', 'url'=>array('profile/changePassword')),
    array('label'=>'Редактирование профиля', 'url'=>array('profile/changeProfile')),
);
?>
<h1 style="text-align: center;">Изменить пароль</h1>
<div class="form" align="center">
    <?php if(Yii::app()->user->hasFlash('password')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <?php echo Yii::app()->user->getFlash('password'); ?>
        </div>
    <? endif; ?>

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
    </div>
    <div class="col-md-2"></div>
</div>