<?php
/* @var $this SolutionController */
/* @var $dataProvider CActiveDataProvider */

$this->menu=array(
    array('label'=>'Список задач', 'url'=>array('problem/index')),
    array('label'=>'Описание задачи', 'url'=>array('problem/view', 'id'=>$model->p_id)),
    array('label'=>'Все отправленные решения', 'url'=>array('solution/index')),
);
?>

<h1 class="text-center">Отправленные решения</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'solution-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        array(
            'name' => 'id',
            'value' => '$data->id',
            'header' => 'ID',
            'filter'=> false,
        ),
        array(
            'name' => 'p_id',
            'value' => '$data->problem->name',
            'header' => 'Задача',
            'filter'=> false,
        ),
        array(
            'name' => 'time_send',
            'value' => 'date("j.m.Y",$data->time_send)',
            'header' => 'Время отправки',
            'filter'=> false,
        ),
        array(
            'name' => 'status',
            'value' => '$data->getStatusName($data->status)',
            'header' => 'Статус',
            'filter'=> false,
        ),
        array(
            'name' => 'compiler',
            'value' => '$data->compiler',
            'header' => 'Компилятор',
            'filter'=> false,
        ),
        array(
            'name' => 'result',
            'value' => '$data->result',
            'header' => 'Результат',
            'filter'=> false,
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}',
        ),
    ),
)); ?>