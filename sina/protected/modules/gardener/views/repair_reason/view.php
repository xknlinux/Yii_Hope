<?php $this->breadcrumbs=array(
		'repair_reason'=>array('index'),
		$model->id,
		);
?>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
			'data'=>$model,
			));
?>
