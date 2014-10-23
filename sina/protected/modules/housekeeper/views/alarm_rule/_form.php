<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'sercice_tree-form',
			'enableAjaxValidation'=>false,
			));
?>

<p class="help-block">带有<span class="required">*</span> 是必填项.</p>

<?php echo $form->errorSummary($model); ?>

<?php //echo $form->textFieldRow($model,'mobile',array('class'=>'span5','maxlength'=>255)); ?>
<?php //echo $form->textFieldRow($model,'alarm_after_normal',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->checkboxRow($model,'alarm_after_normal'); ?>
<?php echo $form->checkboxRow($model,'mobile'); ?>
<?php echo $form->textFieldRow($model,'max_check_times',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'replica_threshold',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'shard_threshold',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'valid_start_time',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'valid_end_time',array('class'=>'span5','maxlength'=>255)); ?>


<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
			)); ?>
</div>

<?php $this->endWidget(); ?>


