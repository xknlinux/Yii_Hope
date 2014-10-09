<?php $this->breadcrumbs=array(
		'Datacenter'=>array('index'),
		$model->name,
		);
?>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
			'data'=>$model,
		//	'attributes'=>array(
		//		'id',
		//		'name',),
			));
?>
