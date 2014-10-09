<?php
$this->breadcrumbs=array(
	'Datacenter',
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
					'name'=>'id',
					'type'=>'raw',
					'value'=>'CHtml::link($data->id, array("view","id"=>$data->id))'),
				'name',
				array(
					'template'=>'{view}{update}{del}',
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'header'=>'操作',
					'buttons'=>array(
						'del'=>array(
							'label'=>'删除',
							'imageUrl'=>'images/delete.jpg',
							'url'=>'Yii::app()->createUrl("/gardener/Datacenter/del",array("id"=>$data->id))',
							'options'=>array("class"=>"icon-trash"),
							'click'=>'function(){if(!confirm("你确定要删除吗？")) return false;}',
							),
						),
					),
				),
			));
?>
