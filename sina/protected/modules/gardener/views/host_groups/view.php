<?php $this->breadcrumbs=array(
		'host_groups'=>array('index'),
		$model->group_name,
		);
?>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
			'data'=>$model,
			));
?>
