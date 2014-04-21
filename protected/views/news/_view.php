<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="view">
    <div>
        <h2><?php echo CHtml::link(CHtml::encode($data->getTitle($data)), array("view", "id" => $data->id)); ?></h2>
    </div>

    <div style="margin-bottom: 10px; font-size: 11px; color: #666;">
        <?php echo CHtml::encode(Yii::t('interface', 'NCreated')); ?>:
        <?php echo CHtml::encode(date("j.m.Y",$data->create)); ?>
    </div>

    <div>
        <p align="justify">
            <?php echo $data->getText($data); ?>
        </p>
    </div>
</div>