<?php
/* @var $this NewsController */
/* @var $model News */
$this->menu=array(
    array('label'=>'Список новостей', 'url'=>array('index')),
);
?>

<h1 align="center"><?php echo $model->getTitle($model); ?></h1>

<p align="left"><?php echo $model->getText($model); ?></p>

<h2>Комментарии(<?php echo $newsComment->model()->countByAttributes(array('n_id'=>$model->id))?>)</h2>

<?php if(Yii::app()->user->hasFlash('addComment')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('addComment'); ?>
    </div>
<? endif; ?>

<div class="form" align="center">
<?php echo CHtml::beginForm(); ?>
<?php echo CHtml::errorSummary($newsComment)?>

    <div class="row">
        <?php //echo CHtml::activeTextArea($newsComment, 'text'); ?> <!-- NewsComment[text] -->
        <?php $this->widget('application.extensions.ckeditor.CKEditor', array(
        'model'=>$newsComment,
        'name'=>'text',
        'editorTemplate'=>'basic',
        'value' => $newsComment->text,
        )); ?>
    </div>

    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'user-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
    )); ?>
    <?php if(CCaptcha::checkRequirements()): ?>
        <div class="row">
                <?php echo $form->labelEx($newsComment,'verifyCode'); ?>
                <div>
                    <?php $this->widget('CCaptcha'); ?><b class="errorMessage"> *</b>
                    <?php echo $form->textField($newsComment,'verifyCode'); ?>
                </div>
                <?php echo $form->error($newsComment,'verifyCode'); ?>
            </div>
        <?php endif; ?>
    <div class="row submit">
        <?php echo CHtml::submitButton('Добавить комментарий'); ?>
    </div>
<?php $this->endWidget(); ?>
<?php echo CHtml::endForm(); ?>
</div>

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



