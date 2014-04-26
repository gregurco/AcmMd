<?php
/* @var $this ConfigController */
/* @var $model Config */

$this->menu=array(
	array('label'=>'Настройки', 'url'=>array('index')),
);
?>

<h1>Update Config "<?php echo $model->param; ?>"</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>