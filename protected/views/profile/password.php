<?php
/* @var $this SiteController */
$this->menu=array(
    array('label'=>'Изменить пароль', 'url'=>array('profile/password')),
);
$this->pageTitle=Yii::app()->name;
?>

Укажите пароль<br />
<?php
    echo CHtml::form();
    echo CHtml::textField('password');
    echo CHtml::submitButton('Изменить');
    echo CHtml::endForm();

?>
