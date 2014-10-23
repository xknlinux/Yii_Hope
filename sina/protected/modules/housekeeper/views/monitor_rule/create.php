<?php
$this->breadcrumbs = array(
		'Services_types'=>array('Service_types/view', 'id'=>$id),
		'Create',
		);
?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
			             'label'=>'添加check_event',
			             'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			             'size'=>'small', // null, 'large', 'small' or 'mini'
			             'url'=>array('check_event/create', 'id'=>$id),
			             ));
?>

<h3>添加服务</h3>

<?php $this->renderPartial('_form', array('model'=>$model));
?>

