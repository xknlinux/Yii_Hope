<?php
$this->breadcrumbs = array(
		'返回创建监控'=>array('monitor_rule/create', 'id'=>$id),
		'Create',
		);
?>

<h3>添加服务</h3>

<?php $this->renderPartial('_form', array('model'=>$model));
?>
