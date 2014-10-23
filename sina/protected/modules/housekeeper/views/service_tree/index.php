<?php
$this->breadcrumbs=array(
	'Service Tree',
);?>

<?php Yii::app()->clientScript->registerScript('touch',"
		$('.touch-button').click(function(){
		        $('.touch').toggle();
		        return false;
		         });
		 ");
 ?>

 <div class="touch" style="display:none">
 <?php $this->renderPartial('touch', array('flag'=>$model->findByPk($id)->node_type, 'id'=>$id))?>
 </div><!-- touch-link -->
 
 <?php //echo CHtml::image("images/touch.png", 'touch', array('class'=>'touch-button'))?>
 <img class="touch-button"  style="height:40px" src="images/touch.png"><h6>功能键</h6></img>



<?php $this->widget('bootstrap.widgets.TbGridView', array(
			'id'=>'datacenter-grid',
			'dataProvider'=>$model->search($id),
			'filter'=>$model,
			'columns'=>array(
				'name',
				'path',
				'owners',
				'node_type',
				'description',
				array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					//'template'=>'{view}{update}{del}',
					'template'=>'{view}{del}',
					'header'=>'操作',
					'buttons'=>array(
						'del'=>array(
							'label'=>'删除',
							'imageUrl'=>'images/delete.jpg',
							'url'=>'Yii::app()->createUrl("/housekeeper/service_tree/del",array("id"=>$data->id))',
							'options'=>array("class"=>"icon-trash"),
							'click'=>'function(){if(!confirm("这是一个危险的操作，确认要删除么？")) return false;}',
							),
						),
					),
				),
			));
?>
