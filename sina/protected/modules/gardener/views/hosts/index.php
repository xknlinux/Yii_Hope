<?php
$this->breadcrumbs=array(
	'Hosts',
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

<?php  Yii::app()->clientScript->registerScript('tags',"
	$('#kenan > .btn').click(function(){
		if($(this).hasClass('btn-success'))
		{
			$(this).removeClass().addClass('btn-warning btn');
		}
		else
		{
			$(this).removeClass().addClass('btn-success btn');
		}
		})
	");
?>

<h3>标签区</h3>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'type'=>'inline',
			'htmlOptions'=>array('class'=>'well'),
			'id'=>'kenan',
	//		'enableAjaxValidation'=>false,
			));
?>

<?php
	foreach($tags_all as $a){ ?>

	<?php	
		if($a['flags'] == 0)
			$this->widget('bootstrap.widgets.TbButton',array(
				'label' => $a['tagname'],
				'type' => 'success',
				'size' => 'nolmal',
				'url'=> Yii::app()->controller->createUrl("/gardener/Hosts/index", array("id"=>"$a[id]", "tags_all"=>$tags_all)),
				));
		else
			$this->widget('bootstrap.widgets.TbButton',array(
				'label' => $a['tagname'],
				'type' => 'warning',
				'size' => 'nolmal',
				'url'=> Yii::app()->controller->createUrl("/gardener/Hosts/index", array("id"=>"$a[id]", "tags_all"=>$tags_all)),
				));
	
	
	}
?>

<?php $this->endWidget(); ?>

<?php if($model1 == null) {?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
			'id'=>'datacenter-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				array(
					'name'=>'host_name',
					'type'=>'raw',
					'value'=>'CHtml::link($data->host_name, array("view", "id"=>$data->id))',
					),
				'host_ip_0',
				'host_ip_1',
				'description',
				'os_type',
				'device_type_id',
				array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'template'=>'{view}{update}{del}',
					'header'=>'操作',
					'buttons'=>array(
						'del'=>array(
							'label'=>'删除',
							'imageUrl'=>'images/delete.jpg',
							'url'=>'Yii::app()->createUrl("/gardener/Hosts/del",array("id"=>$data->id))',
							'options'=>array("class"=>"icon-trash"),
							'click'=>'function(){if(!confirm("你确定要删除吗？")) return false;}',
							),
						),
					),
				array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'template'=>'{tag}',
					'header'=>'标签',
					'buttons'=>array(
						'tag'=>array(
							'label'=>'添加标签',
							'imageUrl'=>Yii::app()->request->baseUrl . '/images/add.jpg',
							'url'=> 'Yii::app()->controller->createUrl("/gardener/tags/create", array("id"=>$data->id))',
							),
						),
					),
				),
			));
?>
<?php } ?>


<?php if($model1 != null) {?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
			'id'=>'datacenter-grid',
			'dataProvider'=>$model1,
			'columns'=>array(
				array(
					'name'=>'host_name',
					'type'=>'raw',
					'value'=>'CHtml::link($data->host_name, array("view", "id"=>$data->id))',
					),
				'host_ip_0',
				'host_ip_1',
				'description',
				'os_type',
				'device_type_id',
				array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'template'=>'{view}{update}{del}',
					'header'=>'操作',
					'buttons'=>array(
						'del'=>array(
							'label'=>'删除',
							'imageUrl'=>'images/delete.jpg',
							'url'=>'Yii::app()->createUrl("/gardener/Hosts/del",array("id"=>$data->id))',
							'options'=>array("class"=>"icon-trash"),
							'click'=>'function(){if(!confirm("你确定要删除吗？")) return false;}',
							),
						),
					),
				array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'template'=>'{tag}',
					'header'=>'标签',
					'buttons'=>array(
						'tag'=>array(
							'label'=>'添加标签',
							'imageUrl'=>Yii::app()->request->baseUrl . '/images/add.jpg',
							'url'=> 'Yii::app()->controller->createUrl("/gardener/tags/create", array("id"=>$data->id))',
							),
						),
					),
				),
			));
?>
<?php } ?>
