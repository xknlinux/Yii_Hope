<?php
$this->breadcrumbs=array(
		'repair_reason',
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
					'value' => 'CHtml::link($data->id, array("view","id"=>$data->id))',
					),
				'reason',
				array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'header'=>'操作',
					),
				),
			));
?>
