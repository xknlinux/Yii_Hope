<?php 

if($flag == 'group')
$this->widget('bootstrap.widgets.TbButton', array(
			'label'=>'添加serviceTypes',
			'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'size'=>'small', // null, 'large', 'small' or 'mini'
			'url'=>array('service_types/create', 'id'=>$id),
			)); 

else
$this->widget('bootstrap.widgets.TbButton', array(
			'label'=>'添加树节点',
			'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'size'=>'small', // null, 'large', 'small' or 'mini'
			'url'=>array('create', 'id'=>$id),
			)); 
?>
