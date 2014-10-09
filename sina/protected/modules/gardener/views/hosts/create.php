<?php 
$this->breadcrumbs = array(
		'hosts'=>array('index'),
		'Create',
		);
?>

<h3>添加hosts</h3>

<?php $this->renderPartial('_form', array('model'=>$model));
?>
