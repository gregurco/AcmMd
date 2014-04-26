<?php
$this->menu=array(
	array('label'=>'Список статей', 'url'=>array('index')),
);
?>

<h1>Create Article</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>