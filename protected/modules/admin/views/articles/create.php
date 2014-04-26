<?php
$this->menu=array(
	array('label'=>'Список статей', 'url'=>array('index')),
);
?>

<h1>Create Articles</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>