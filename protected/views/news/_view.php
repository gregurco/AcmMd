<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="view">
    <div>
        <h2><?php echo CHtml::link(CHtml::encode($data->title), array("view", "id" => $data->id)); ?></h2>
</div>

    <div style="margin-bottom: 10px; font-size: 11px; color: #666;">
        <?php echo CHtml::encode(Yii::t('interface', 'NCreated')); ?>:
        <?php echo CHtml::encode(date("j.m.Y",$data->create)); ?>
         | Комментариев: <?php echo NewsComment::model()->countByAttributes(array('n_id'=>$data->id))?>
    </div>

    <div>
        <p align="justify">
            <?php echo $data->text; ?>
        </p>
    </div>
</div>