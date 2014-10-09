<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'datacenter-form',
			'enableAjaxValidation'=>false,
			));
?>

<p class="help-block">带有<span class="required">*</span> 是必填项.</p>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldRow($model,'type_name',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'cpu_cnt',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'cpu_info',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'disk_cnt',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'disk_info',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'mem_info',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'chassis',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'raid',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'producer',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'raidcard',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'networkcard',array('class'=>'span5','maxlength'=>255)); ?>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
			)); ?>
</div>
<?php $this->endWidget(); ?>
