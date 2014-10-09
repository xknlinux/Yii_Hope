<?php $this->breadcrumbs=array(
		'devices'=>array('index'),
		$model->device_name,
		);
?>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
			'data'=>$model,
			));
?>
