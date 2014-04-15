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

<h3>Время отправки:</h3>
<?php echo date("j.m.Y",$model->time_send); ?>
<hr>
<h3>Набранно пунктов:</h3>
<?php echo $model->result; ?>