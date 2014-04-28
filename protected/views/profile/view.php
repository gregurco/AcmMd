<h1 align="center">Информация о пользователе: <?php echo $model->login;?></h1>
<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'name',
        'surname',
        array(
            'label' => 'Время регистрации',
            'value' => CHtml::encode(date("Y-m-d H:i:s",$model->time_register)),
        )
    ),
)); ?>