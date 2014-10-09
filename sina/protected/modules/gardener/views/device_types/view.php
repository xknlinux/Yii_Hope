<?php $this->breadcrumbs=array(
		'device_types'=>array('index'),
		$model->type_name,
		);
?>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
			'data'=>$model,
			));
?>
