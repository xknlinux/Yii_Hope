<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'datacenter-form',
			'enableAjaxValidation'=>false,
			));
?>

<p class="help-block">带有<span class="required">*</span> 是必填项.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'device_name',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'mac',array('class'=>'span5','maxlength'=>51)); ?>
<?php echo $form->textFieldRow($model,'switch_id',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'switch_interface',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'mac_out',array('class'=>'span5','maxlength'=>51)); ?>
<?php echo $form->textFieldRow($model,'switch_id_out',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'switch_interface_out',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'mac_manage',array('class'=>'span5','maxlength'=>51)); ?>
<?php echo $form->textFieldRow($model,'switch_id_manage',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'switch_interface_manage',array('class'=>'span5')); ?>
<?php //echo $form->textFieldRow($model,'type_id',array('class'=>'span5')); ?>
<?php echo $form->dropDownListRow($model,'type_id', DeviceTypes::model()->getOptions('device_types'), array('size'=>0,'prompt'=>'--    -请选择---',)); ?>
<?php echo $form->textFieldRow($model,'device_sn',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'purchase_date',array('class'=>'span5')); ?>
<?php echo $form->dropDownListRow($model,'datacenter_id', Datacenter::model()->getOptions('devices'), array('size'=>0,'prompt'=>'---请选择---',)); ?>
<?php echo $form->textFieldRow($model,'zid',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'rack',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'guarantee_expiration',array('class'=>'span5')); ?>




<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
			)); ?>
</div>
<?php $this->endWidget(); ?>
