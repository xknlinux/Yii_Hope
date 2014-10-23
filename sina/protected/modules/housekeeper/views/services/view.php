<?php $this->breadcrumbs=array(
		'Services'=>array('index'),
		$model->name,
		);
?>

<?php  $this->widget('bootstrap.widgets.TbDetailView', array(
			'data'=>$model,
			));
?>
