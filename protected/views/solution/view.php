<?php
/* @var $this SolutionController */
/* @var $dataProvider CActiveDataProvider */

$this->menu=array(
    array('label'=>'Список задач', 'url'=>array('problem/index')),
    array('label'=>'Все отправленные решения', 'url'=>array('solution/index')),
    array('label'=>'Описание задачи', 'url'=>array('problem/view', 'id'=>$model->p_id)),
);
?>
<h1 style="text-align: center;">"<?php echo $model->problem->name; ?>"</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        array(
            'name' => 'time_send',
            'value' => date("j.m.Y", $model->time_send),
            'label' => 'Время отправки',
        ),
        array(
            'name' => 'status',
            'value' => $model->getStatusName($model->status),
            'label' => 'Статус',
        ),
        array(
            'name' => 'result',
            'value' => $model->result,
            'label' => 'Результат',
        ),
        array(
            'name' => 'compiler',
            'value' => $model->compiler,
            'label' => 'Компилятор',
        ),
        array(
            'name' => 'log_compile',
            'value' => $model->log_compile,
            'label' => 'Лог компилятора',
            'type' => 'html',
        ),
    ),
));?>
<br>
<h3 style="text-align: center;">Тесты</h3>
<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>$tests,
));?>