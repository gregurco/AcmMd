<?php
/* @var $this SolutionController */
/* @var $model Solution */

$this->menu=array(
    array('label'=>'Список решений', 'url'=>array('index')),
    array('label'=>'Удалить решение', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>
<h1 style="text-align: center;">"<?php echo $model->problem->name; ?>"</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        array(
            'name' => 'userLogin',
            'value' => $model->user->login,
            'label' => 'Пользователь',
        ),
        array(
            'name' => 'problemName',
            'value' => $model->problem->name,
            'label' => 'Задача',
        ),
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
    <br>
    <h3 style="text-align: center;">Код</h3>
<?php
$this->widget('application.extensions.jchili.JChiliHighlighter',array(
    'lang'=>"html",
    'code'=>$model->file_text,
    'showLineNumbers'=>true,
    'lang'=>$model->compiler,
));
?>