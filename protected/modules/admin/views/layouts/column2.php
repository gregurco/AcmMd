<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/main'); ?>
<div class="group" id="content">
        <div id="sidebar" style="clear: both; float: left; width: 180px; padding-bottom: 10px; padding-left: 15px;position: relative;word-wrap: break-word">
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'Operations',
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items'=>$this->menu,
                'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget();
            ?>
        </div><!-- sidebar -->

	<div id="content-main" class="group">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>