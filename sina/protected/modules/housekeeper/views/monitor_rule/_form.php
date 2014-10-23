<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'sercice_tree-form',
			'enableAjaxValidation'=>false,
			));
?>

<p class="help-block">带有<span class="required">*</span> 是必填项.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'monitor_sys',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'check_key',array('class'=>'span5','maxlength'=>255)); ?>
<?php //echo $form->textFieldRow($model,'warning_event_id',array('class'=>'span5','maxlength'=>255)); ?>
<?php //echo $form->textFieldRow($model,'warning_param',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->dropDownListRow($model,'warning_event_id', CheckEvent::model()->getOptions('monitor_rule'), array('size'=>0,'prompt'=>'---请选择---',)); ?>
<?php echo $form->dropDownListRow($model,'warning_param', CheckEvent::model()->getOptions('monitor_rule'), array('size'=>0,'prompt'=>'---请选择---',)); ?>


<?php echo $form->textFieldRow($model,'critical_event_id',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'critical_param',array('class'=>'span5','maxlength'=>255)); ?>


<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
			)); ?>
</div>

<?php $this->endWidget(); ?>


