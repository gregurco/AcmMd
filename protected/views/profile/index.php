<?php
/* @var $this SiteController */
$this->menu=array(
    array('label'=>'Личный кабинет', 'url'=>array('profile/index')),
    array('label'=>'Изменить пароль', 'url'=>array('profile/changePassword')),
    array('label'=>'Редактирование профиля', 'url'=>array('profile/changeProfile')),
);
?>

<h1 align="center">Информация о пользователе: <?php echo Yii::app()->user->name;?></h1>
<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'name',
        'surname',
        'email',
        array(
            'label' => 'Время регистрации',
            'value' => CHtml::encode(date("Y-m-d H:i:s",$model->time_register)),
        ),
        array(
            'type' => 'html',
            'label' => 'Решенные задачи',
            'value' => implode(', ', $finishedProblem)
        ),
        array(
            'type' => 'html',
            'label' => 'Начатые задачи',
            'value' => implode(', ', $unfinishedProblem)
        ),
        array(
            'label' => 'Баллы',
            'value' => $score,
        ),
    ),
)); ?>
