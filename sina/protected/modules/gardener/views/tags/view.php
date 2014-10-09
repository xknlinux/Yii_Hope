<?php $this->breadcrumbs=array(
		'tags'=>array('index'),
		$model->tagname,
		);
?>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
			'data'=>$model,
			));
?>
