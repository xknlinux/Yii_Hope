<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'sercice_tree-form',
			'enableAjaxValidation'=>false,
			));
?>

<p class="help-block">带有<span class="required">*</span> 是必填项.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'service_class',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'service_group',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'owners',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'install_path',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'trace_log_path',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'script',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'commands',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'commands_timeout',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'priority',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'mtime',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'last_change_author',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'ports_mon',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'processes_mon',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'perf_mon',array('class'=>'span5','maxlength'=>255)); ?>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
			)); ?>
</div>
<?php $this->endWidget(); ?>
