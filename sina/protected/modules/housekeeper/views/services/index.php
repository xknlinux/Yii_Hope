<?php
$this->breadcrumbs=array(
	'Services',
);?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
			'id'=>'services-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				'name',
				'host_id',
				'shard_id',
				'replica_id',
				'service_type_id',
				array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					//'template'=>'{view}{update}{del}',
					'template'=>'{view}{del}',
					'header'=>'操作',
					'buttons'=>array(
						'del'=>array(
							'label'=>'删除',
							'imageUrl'=>'images/delete.jpg',
							'url'=>'Yii::app()->createUrl("/housekeeper/services/del",array("id"=>$data->id))',
							'options'=>array("class"=>"icon-trash"),
							'click'=>'function(){if(!confirm("你确定要删除吗？")) return false;}',
							),
						),

					),
				),
			));
?>
