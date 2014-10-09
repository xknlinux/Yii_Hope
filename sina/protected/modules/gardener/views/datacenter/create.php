<?php 
$this->breadcrumbs = array(
		'Datacenter'=>array('index'),
		'Create',
		);
?>

<h3>添加Datacenter</h3>

<?php $this->renderPartial('_form', array('model'=>$model));
?>
