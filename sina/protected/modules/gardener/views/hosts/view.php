<?php $this->breadcrumbs=array(
		'hosts'=>array('index'),
		$model->host_name,
		);
?>

<h5> 标签</h5>
	<?php
foreach($model_tag as $a)
{?>

<?php
	$this->widget('bootstrap.widgets.TbBadge',array(
				'label' => $a,
				'type' => 'warning',
				));
?>

		
<?php
}?>


<h4>hosts</h4>
<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
			'data'=>$model,
			));
?>

<h4>datacenter</h4>
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'data'=>$datacenter,
			'attributes'=>array(
				'name'
				),
			));
?>

<h4>device_type</h4>
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'data'=>$device_types,
			'attributes'=>array(
				'type_name',
				'cpu_cnt',
				'cpu_info',
				'disk_cnt',
				'disk_info',
				'mem_info',
				'chassis',
				'raid',
				'producer',
				'raidcard',
				'networkcard',
				),
			));

?>
