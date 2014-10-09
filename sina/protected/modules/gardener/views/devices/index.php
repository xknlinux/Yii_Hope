<?php
$this->breadcrumbs=array(
	'Devices',
);

Yii::app()->clientScript->registerScript('touch',"
	$('.touch-button').click(function(){
		$('.touch').toggle();
		return false;
		});
	");
?>

<div class="touch" style="display:none">
<?php $this->renderPartial('touch')?>
</div><!-- touch-link -->

<?php //echo CHtml::image("images/touch.png", 'touch', array('class'=>'touch-button'))?>
<img class="touch-button"  style="height:40px" src="images/touch.png"><h6>功能键</h6></img>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
			'id'=>'datacenter-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				array(
					'header'=>'Device_Name',
					'name'=> 'device_name',
					'type'=>'raw',
					'value'=>'CHtml::link($data->device_name, array("view","id"=>$data->id))',
					),
				'mac',
				'mac_manage',
				array(
					'header'=>'datacenter_id',
					'name'=>'datacenter_id',
					'type'=>'raw',
					'value'=>'CHtml::link($data->datacenter->id, array("datacenter/view", "id"=>$data->datacenter_id))',
					),
				array(
					'header'=>'type_id',
					'name'=>'type_id',
					'type'=>'raw',
					'value'=>'CHtml::link($data->type->id, array("device_types/view", "id"=>$data->type_id))',
					),

				'switch_interface_manage',
				'purchase_date',
				'guarantee_expiration',
				array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'template'=>'{view}{update}{del}',
					'header'=>'操作',
					'buttons'=>array(
						'del'=>array(
							'label'=>'删除',
							'imageUrl'=>'images/delete.jpg',
							'url'=>'Yii::app()->createUrl("/gardener/Devices/del",array("id"=>$data->id))',
							'options'=>array("class"=>"icon-trash"),
							'click'=>'function(){if(!confirm("你确定要删除吗？")) return false;}',
							),
						),
					),
				),
			));
?>
