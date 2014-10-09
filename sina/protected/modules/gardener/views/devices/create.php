<?php 
$this->breadcrumbs = array(
		'Devices'=>array('index'),
		'Create',
		);
?>

<h3>添加Devices</h3>

<?php $this->renderPartial('_form', array('model'=>$model));
?>
