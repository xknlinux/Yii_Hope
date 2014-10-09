<?php $this->breadcrumbs=array(
		'reports'=>array('index'),
		$model->bug_id,
		);
?>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
			'data'=>$model,
			));
?>
