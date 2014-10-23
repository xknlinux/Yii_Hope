<?php
$this->breadcrumbs = array(
		'Services_tree'=>array('index', 'id'=>$id),
		'Create',
		);
?>

<h3>添加tree_node</h3>

<?php $this->renderPartial('_form', array('model'=>$model));
?>
