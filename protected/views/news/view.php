<?php
/* @var $this NewsController */
/* @var $model News */

?>

<h1>View News #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title_ru',
		'title_ro',
		'text_ru',
		'text_ro',
		'create',
		'hide',
	),
)); ?>
