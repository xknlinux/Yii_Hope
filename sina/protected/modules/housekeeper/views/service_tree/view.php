<?php $this->breadcrumbs=array(
		'Service_tree'=>array('index', 'id'=>$id),
		$model->name,
		);
?>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
			'data'=>$model,
			));
?>
