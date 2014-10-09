<?php 
$this->breadcrumbs = array(
		'Datacenter'=>array('index'),
		'Create',
		);
?>

<h3>添加host_groups</h3>

<?php $this->renderPartial('_form', array('model'=>$model));
?>
