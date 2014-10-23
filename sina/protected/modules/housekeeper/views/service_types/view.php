<?php
$this->breadcrumbs=array(
		'Service Types'=>array('index'),
		$model->name,
		);
?>

<?php Yii::app()->clientScript->registerScript('touch',"
		$('.touch-button').click(function(){
			$('.touch').toggle();
			return false;
			});
		");
?>

<div class="touch" style="display:none">
<?php $this->renderPartial('touch', array('id'=>$id))?>
</div><!-- touch-link -->

<?php //echo CHtml::image("images/touch.png", 'touch', array('class'=>'touch-button'))?>
<img class="touch-button"  style="height:40px" src="images/touch.png"><h6>功能键</h6></img>

<h2>ServiceType:</h2>
<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'name',
				'service_class',
				'service_group',
				'owners',
				'install_path',
				'trace_log_path',
				'script',
				'commands',
				'priority',
				'mtime',
				'last_change_author',
				'ports_mon',
				'processes_mon',
				'perf_mon',
				array(
					'name'=>'alarm rule',
					'type'=>'raw',
					'value'=>$this->widget('bootstrap.widgets.TbGridView', array(
							'id'=>'alarm_rule_grid',
							'dataProvider'=>$alarm_rule_provider,
							'summaryText'=>'',
							'htmlOptions' => array(
								'style' => 'padding:0',
								),
							'columns'=>array(
								'valid_start_time',
								'valid_end_time',
								array(
									'name' => 'mobile',
									'value' => '$data->mobile ? "enable" : "disable"'
									),
								array(
									'name' => 'alarm_after_normal',
									'value' => '$data->alarm_after_normal ? "true" : "false"'
									),
								'max_check_times',
								'replica_threshold',
								'shard_threshold',
								)),
						true)),
				array(
					'name'=>'monitor rule',
					'type'=>'raw',
					'value'=>$this->widget('bootstrap.widgets.TbGridView', array(
							'id'=>'monitor_rule_grid',
							'dataProvider'=>$monitor_rule_provider,
							'summaryText'=>'',
							'htmlOptions' => array(
								'style' => 'padding:0',
								),
							'columns'=>array(
								'monitor_sys',
								'check_key',
								'warning_event_id',
								'warning_param',
								'critical_event_id',
								'critical_param',
								)),
						true)),
				),
				));
?>

<h2>Services:</h2>
<?php
$service = new Services('search');
$service->unsetAttributes();
$service->service_type_id = $model->id;
//$service->service_type_name = $model->name;
$this->widget('bootstrap.widgets.TbGridView', array(
			'id'=>'services-grid',
			//'ajaxUrl' => array('services/index'),
			'dataProvider' => $service->search(),
			//'filter'=>$service,
			'columns'=>array(
				array(
					'name' => 'name',
					'type' => 'raw',
					'value' => 'CHtml::link($data->name, array("services/view","id"=>$data->id))',
					),
				'host_id',
				'shard_id',
				'replica_id',
				'install_path',
				'mtime',
				'last_change_author',
				)
			));
?>
