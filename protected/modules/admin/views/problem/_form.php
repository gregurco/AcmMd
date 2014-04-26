<?php
/* @var $this ProblemController */
/* @var $model Problem */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'problem-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <?php echo $form->labelEx($model,'name_ru'); ?>
    <?php echo $form->textField($model,'name_ru',array('size'=>60,'maxlength'=>255)); ?>
    <?php echo $form->error($model,'name_ru'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'name_ro'); ?>
    <?php echo $form->textField($model,'name_ro',array('size'=>60,'maxlength'=>255)); ?>
    <?php echo $form->error($model,'name_ro'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'description_ru'); ?>
    <?php $this->widget('application.extensions.ckeditor.CKEditor', array(
        'model'=>$model,
        'attribute'=>'description_ru',
        'language'=>'ru',
        'editorTemplate'=>'full',
    )); ?>
    <?php echo $form->error($model,'description_ru'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'description_ro'); ?>
    <?php $this->widget('application.extensions.ckeditor.CKEditor', array(
        'model'=>$model,
        'attribute'=>'description_ro',
        'language'=>'ro',
        'editorTemplate'=>'full',
    )); ?>
    <?php echo $form->error($model,'description_ro'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'input_ru'); ?>
    <?php $this->widget('application.extensions.ckeditor.CKEditor', array(
        'model'=>$model,
        'attribute'=>'input_ru',
        'language'=>'ru',
        'editorTemplate'=>'full',
    )); ?>
    <?php echo $form->error($model,'input_ru'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'input_ro'); ?>
    <?php $this->widget('application.extensions.ckeditor.CKEditor', array(
        'model'=>$model,
        'attribute'=>'input_ro',
        'language'=>'ro',
        'editorTemplate'=>'full',
    )); ?>
    <?php echo $form->error($model,'input_ro'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'output_ru'); ?>
    <?php $this->widget('application.extensions.ckeditor.CKEditor', array(
        'model'=>$model,
        'attribute'=>'output_ru',
        'language'=>'ru',
        'editorTemplate'=>'full',
    )); ?>
    <?php echo $form->error($model,'output_ru'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'output_ro'); ?>
    <?php $this->widget('application.extensions.ckeditor.CKEditor', array(
        'model'=>$model,
        'attribute'=>'output_ro',
        'language'=>'ro',
        'editorTemplate'=>'full',
    )); ?>
    <?php echo $form->error($model,'output_ro'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'tests'); ?>
    <?php echo $form->textField($model,'tests',array('size'=>3,'maxlength'=>3)); ?>
    <?php echo $form->error($model,'tests'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'limit_time'); ?>
    <?php echo $form->textField($model,'limit_time'); ?>
    <?php echo $form->error($model,'limit_time'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'limit_memory'); ?>
    <?php echo $form->textField($model,'limit_memory'); ?>
    <?php echo $form->error($model,'limit_memory'); ?>
</div>

<? if ($model->getIsNewRecord() || empty($model->examples)): ?>
    <div class="row" id="examples">
        <label>Examples</label>
        <input type="button" value="Добавить ряд" onclick="addTableRow($('#examples'));">
        <table id="example">
            <tr>
                <th>Input</th>
                <th>Output</th>
                <th>Explanation</th>
            </tr>
            <? for ($i=0; $i<10; $i++):?>
                <tr  <?=($i)?"style='display: none;'":""?> >
                    <td>
                        <?php $this->widget('application.extensions.ckeditor.CKEditor', array(
                            'name'=>'example['.$i.'][input]',
                            'language'=>'ru',
                            'editorTemplate'=>'basic',
                        )); ?>
                    </td>
                    <td>
                        <?php $this->widget('application.extensions.ckeditor.CKEditor', array(
                            'name'=>'example['.$i.'][output]',
                            'language'=>'ru',
                            'editorTemplate'=>'basic',
                        )); ?>
                    </td>
                    <td>
                        <?php $this->widget('application.extensions.ckeditor.CKEditor', array(
                            'name'=>'example['.$i.'][explanation]',
                            'language'=>'ru',
                            'editorTemplate'=>'basic',
                        )); ?>
                    </td>
                </tr>
            <? endfor; ?>
        </table>
    </div>
<? endif; ?>

<? if (!$model->getIsNewRecord() && !empty($model->examples)): ?>
    <div class="row" id="examples">
        <label>Examples</label>
        <input type="button" value="Добавить ряд" onclick="addTableRow($('#examples'));">
        <table id="example">
            <tr>
                <th>Input</th>
                <th>Output</th>
                <th>Explanation</th>
            </tr>
            <? for ($i=0; $i<10; $i++):?>
                <tr  <?=(!isset($model->examples[$i]['input']) && !isset($model->examples[$i]['output']) && !isset($model->examples[$i]['explanation']))?"style='display: none;'":""?> >
                    <td>
                        <?php $this->widget('application.extensions.ckeditor.CKEditor', array(
                            'name'=>'example['.$i.'][input]',
                            'language'=>'ru',
                            'editorTemplate'=>'basic',
                            'value' => isset($model->examples[$i]['input'])? $model->examples[$i]['input'] : '',
                        )); ?>
                    </td>
                    <td>
                        <?php $this->widget('application.extensions.ckeditor.CKEditor', array(
                            'name'=>'example['.$i.'][output]',
                            'language'=>'ru',
                            'editorTemplate'=>'basic',
                            'value' => isset($model->examples[$i]['input'])? $model->examples[$i]['output'] : '',
                        )); ?>
                    </td>
                    <td>
                        <?php $this->widget('application.extensions.ckeditor.CKEditor', array(
                            'name'=>'example['.$i.'][explanation]',
                            'language'=>'ru',
                            'editorTemplate'=>'basic',
                            'value' => isset($model->examples[$i]['input'])? $model->examples[$i]['explanation'] : '',
                        )); ?>
                    </td>
                </tr>
            <? endfor; ?>
        </table>
    </div>
<? endif; ?>

<div class="row">
    <?php echo $form->labelEx($model,'Скрыто'); ?>
    <?php echo $form->dropDownList($model,'hide', array(0 => 'Нет', 1 => 'Да')); ?>
    <?php echo $form->error($model,'hide'); ?>
</div>

<div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->