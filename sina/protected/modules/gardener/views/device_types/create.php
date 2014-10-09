<?php 
$this->breadcrumbs = array(
		'DeviceTypes'=>array('index'),
		'Create',
		);
?>

<h3>添加device_types</h3>

<?php $this->renderPartial('_form', array('model'=>$model));
?>
