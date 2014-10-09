<?php
$this->breadcrumbs=array(
	'Devices_Types',
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
			'id'=>'devicetypes-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				array(
					'name'=>'type_name',
					'type'=>'raw',
					'value'=>'CHtml::link($data->type_name, array("view","id"=>$data->id))',
					),
				'disk_info',
				'mem_info',
				'chassis',
				'raidcard',
				'networkcard',
				array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'template'=>'{view}{update}{del}',
					'header'=>'操作',
					'buttons'=>array(
						'del'=>array(
							'label'=>'删除',
							'imageUrl'=>'images/delete.jpg',
							'url'=>'Yii::app()->createUrl("/gardener/Device_types/del",array("id"=>$data->id))',
							'options'=>array("class"=>"icon-trash"),
							'click'=>'function(){if(!confirm("你确定要删除吗？")) return false;}',
							),
						),
					),
				),
			));
?>
