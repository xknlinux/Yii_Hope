<?php
$this->breadcrumbs = array(
		'Services_tree'=>array('Services/index'),
		'Create',
		);
?>

<h3>添加服务</h3>

<?php $this->renderPartial('_form', array('model'=>$model));
?>

