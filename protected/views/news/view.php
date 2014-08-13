<?php
/* @var $this NewsController */
/* @var $model News */
$this->menu=array(
    array('label'=>'Список новостей', 'url'=>array('index')),
);
?>

<h1 class="text-center"><?php echo $model->title; ?></h1>

<p class="text-left"><?php echo $model->text; ?></p>

<h2>Комментарии(<?php echo $newsComment->model()->countByAttributes(array('n_id'=>$model->id))?>)</h2>

<?php
    if (Yii::app()->config->get('COMMENT.ALLOW')){
        $this->renderPartial('_addComment', array(
            'newsComment'=>$newsComment,
            'form'=> '',
        ));
    }
    else echo '<small>Написание комментариев временно запрещено!</small>';
?>

<hr><?php
    foreach($comments as $arr)
    {
        echo "<div>";
        if(isset($arr->user->login))
            echo'<strong>' . $arr->user->login . '</strong>';
        else echo '<strong>'.$arr->name.'</strong>';
        echo ' • '. '<span style="margin-bottom: 10px; font-size: 11px; color: #666;">' .
            CHtml::encode(date("Y-m-d H:i:s",$arr['create'])) . '</span>';
        echo '<br/>';
        echo $arr['text'];
        echo "</div><hr>";
    }
    ?>
</hr>



