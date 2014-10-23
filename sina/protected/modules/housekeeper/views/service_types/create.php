<?php
$this->breadcrumbs = array(
		//'Services_type'=>array('service_tree'),
		'Create',
		);
?>

<h3>添加tree_node</h3>

<?php $this->renderPartial('_form', array('model'=>$model));
?>
