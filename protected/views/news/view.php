<?php
/* @var $this NewsController */
/* @var $model News */
$this->menu=array(
    array('label'=>'Список новостей', 'url'=>array('index')),
);
?>


<h1 align="center"><?php echo $model->getTitle($model); ?></h1>

<p align="left"><?php echo $model->getText($model); ?></p>

<h2>Комментарии</h2>

    <?php if(Yii::app()->user->hasFlash('addComment')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('addComment'); ?>
        </div>
    <? endif; ?>

<?php echo CHtml::beginForm(); ?>
<div class="row">
    <?php echo CHtml::activeTextArea($form, 'text'); ?>
</div>
<div class="row submit">
    <?php echo CHtml::submitButton('Добавить комментарий'); ?>
</div>
<?php echo CHtml::endForm(); ?>


<hr><?php
    foreach($model->newsComment as $arr)
    {
        echo "<div>";
        if(isset($arr->user->login))
            echo'<strong>' . $arr->user->login . '</strong>';
        else echo '<strong>Гость</strong>';
        echo ' • '. '<span style="margin-bottom: 10px; font-size: 11px; color: #666;">' .
            CHtml::encode(date("Y-m-d H:i:s",$arr['create'])) . '</span>';
        echo '<br/>';
        echo $arr['text'];
        echo "</div><hr>";
    }
    ?>
</hr>



