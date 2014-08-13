<?php
/* @var $this SiteController */
$this->menu=array(
    array('label'=>'Общий рейтинг', 'url'=>array('top/index')),
);
?>

<h1 class="text-center">Общий рейтинг</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'top-grid',
    'dataProvider'=>$model,
    'ajaxUpdate' => true,
    'enableSorting'=>true,
    'filter' => null,
    'columns'=>array(
        array(
            'header' => '№',
            'value'  => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + $row + 1',
            'htmlOptions'=>array('width'=>'20px'),
        ),
        array(
            'name' => 'login',
            'value' => '$data["login"]',
            'header' => 'Логин'
        ),
        array(
            'name' => 'score',
            'value' => '($data["score"])?$data["score"]:0',
            'header' => 'Баллы'
        ),
        array(
            'type'=>'html',
            'value' => 'CHtml::link("Просмотреть", array("profile/view", "id" => $data["id"]))',
            'header' => 'Действие'
        ),
    ),
)); ?>
