<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'datacenter-form',
			'enableAjaxValidation'=>false,
			));
?>

<p class="help-block">带有<span class="required">*</span> 是必填项.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'host_name',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'host_ip_0',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'host_ip_1',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<?php echo $form->dropDownListRow($model,'host_group_id', HostGroups::model()->getOptions('hosts'), array('size'=>1,'prompt'=>'--请选择---',)); ?>

<?php echo $form->dropDownListRow($model,'device_id', Devices::model()->getOptions('hosts'), array('size'=>1,'prompt'=>'---请选择---',)); ?>

<?php echo $form->textFieldRow($model,'bond',array('class'=>'span5')); ?>

<?php echo $form->textFieldRow($model,'alias',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'product',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'status',array('class'=>'span5')); ?>

<?php echo $form->textFieldRow($model,'os_type',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'os_version',array('class'=>'span5','maxlength'=>255)); ?>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
			)); ?>
</div>
<?php $this->endWidget(); ?>
