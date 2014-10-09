<?php $this->breadcrumbs=array(
		'host_tags'=>array('index'),
		$model->host_id,
		);
?>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
			'data'=>$model,
			));
?>
