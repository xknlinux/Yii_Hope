<?php 

$this->widget('bootstrap.widgets.TbButton', array(
			'label'=>'添加服务',
			'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'size'=>'small', // null, 'large', 'small' or 'mini'
			'url'=>array('services/create', 'id'=>$id),
			)); 

$this->widget('bootstrap.widgets.TbButton', array(
			'label'=>'添加警报',
			'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'size'=>'small', // null, 'large', 'small' or 'mini'
			'url'=>array('alarm_rule/create', 'id'=>$id),
			)); 

$this->widget('bootstrap.widgets.TbButton', array(
			'label'=>'添加监控',
			'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'size'=>'small', // null, 'large', 'small' or 'mini'
			'url'=>array('monitor_rule/create', 'id'=>$id),
			)); 
?>
