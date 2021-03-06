<?php
/* @var $this ProblemController */
/* @var $model Problem */

$this->menu=array(
    array('label'=>'Список задач', 'url'=>array('index')),
    array('label'=>'Решенные задачи', 'url'=>array('#')),
    array('label'=>'Начатые задачи', 'url'=>array('#')),
    array('label'=>'Отправленные решения', 'url'=>array('solution/index')),
    array('label'=>'Отправленные решения этой задачи', 'url'=>array('solution/index', 'pid'=>$model->id)),
);
?>

<h1 class="text-center">"<?php echo $model->name; ?>"</h1>

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


<?php if(Yii::app()->user->hasFlash('sendSolution')): ?>
    <div class="flash-error">
        <?php echo Yii::app()->user->getFlash('sendSolution'); ?>
    </div>
<?php else: ?>
    <form method="post" enctype="multipart/form-data">
        Файл: <input type="file" name="file"><br>
        Компилятор: <select name="compiler">
            <option value="FPC">Free Pascal 2.4.4</option>
            <option value="GCC">GCC 4.7.2</option>
			<option value="G++">G++ 4.7.2</option>
			<option value="Prolog">Prolog 5.10.4</option>
            <option value="Java">Java 1.6.0_27</option>
        </select><br>
        <input type="submit" value="Отправить" name="send">
    </form>
<? endif; ?>