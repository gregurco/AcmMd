<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="view">
    <div>
        <h2><a href="#" style="line-height: 120%;"><?php echo CHtml::encode($data->getTitle($data)); ?></a></h2>
    </div>

    <div style="margin-bottom: 10px; font-size: 11px; color: #666;">
        <?php echo CHtml::encode('Создан'); ?>:
        <?php echo CHtml::encode(date("j.m.Y",$data->create)); ?>
    </div>

    <div>
        <p align="justify">
            <?php echo $data->getText($data); ?>
        </p>
    </div>
</div>