<?php
$this->layout='//layouts/column1';
?>
<h1 class="text-center">Статьи</h1>
<ul class="clearfix port-det port-thumb">
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'itemsTagName'=>'ul',
    'itemsCssClass'=>'clearfix port-det port-thumb',
));
?>
</ul>