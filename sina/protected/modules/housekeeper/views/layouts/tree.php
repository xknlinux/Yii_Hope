<?php $this->beginContent('//layouts/main');?>
<div class="container">
<div class="span-5 last">
<div id="sidebar">
<?php
$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Service Tree',
			));

$this->widget('CTreeView',array(
			'id'=>'menu-treeview',
			'data'=>ServiceTree::model()->getTreeItems(),
			'control'=>'#treecontrol',
			'animated'=>'fast',
			'persist'=>'location',
			'unique'=>'true',
			'collapsed'=>true,
			'htmlOptions'=>array(
				'class'=>'filetree',
				'style'=>"overflow-x:scroll;"
				)
			));

$this->endWidget();
?>
</div> <!--sidebar-->
</div>

<div class="span-22 last">
<div id="content">
<?php echo $content; ?>
</div><!-- content -->
</div>

<?php $this->endContent();?>
