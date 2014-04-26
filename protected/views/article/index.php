<?php
$this->layout='//layouts/column1';
?>
<h2 align="center">Статьи</h2>
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
));