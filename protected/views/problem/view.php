<?php
/* @var $this ProblemController */
/* @var $model Problem */

$this->menu=array(
    array('label'=>'Список задач', 'url'=>array('index')),
);
?>

<h1 style="text-align: center;">"<?php echo $model->name; ?>"</h1>

<h3><?=Yii::t('interface', 'Description')?>:</h3>
<?php echo $model->description; ?>

<h3><?=Yii::t('interface', 'InputDate')?>:</h3>
<?php echo $model->input; ?>

<h3><?=Yii::t('interface', 'OutputDate')?>:</h3>
<?php echo $model->output; ?>

<? if (!empty($model->examples)): ?>
<table class="problem_example">
    <tr>
        <th width="1%">№</th>
        <th>input.txt</th>
        <th>output.txt</th>
    </tr>
    <? foreach($model->examples as $key => $value): ?>
        <tr>
            <td><?=($key+1)?></td>
            <td><?=$value['input']?></td>
            <td><?=$value['output']?></td>
        </tr>
    <? endforeach; ?>
</table>
<? endif; ?>
