<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<?php Yii::app()->bootstrap->register();?>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<!--link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" /-->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<!--div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div-->
	</div><!-- header -->

	<div id="mainmenu">
	<?php $this->widget('bootstrap.widgets.TbNavbar', array(
				'type'=>'inverse',
				'brand'=>'New Hope',
				'collapse'=>true,
				'fixed'=>true,
				'items'=>array(
					array(
						'class'=>'bootstrap.widgets.TbMenu',
						'items'=>array(
							array('label'=>'机器信息','items'=>array(
									array('label'=>'datacenter',
										'url'=>array('/gardener/datacenter/index')),

									array('label'=>'devices',
										'url'=>array('/gardener/devices/index')),

									array('label'=>'device_types',
										'url'=>array('/gardener/device_types/index')),

									array('label'=>'host_groups',
										'url'=>array('/gardener/host_groups/index')),

									array('label'=>'hosts',
										'url'=>array('/gardener/hosts/index')),

									array('label'=>'repair_reason',
										'url'=>array('/gardener/repair_reason/index')),

									array('label'=>'reports',
										'url'=>array('/gardener/reports/index'),),
									)),
							array('label'=>'服务信息', 'url'=>'#'),
							array('label'=>'一键部署', 'url'=>'#'),
							),
						),
					),
				));
	?>
	</div><!-- mainmenu -->

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

</div><!-- page -->

</body>
</html>
