<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'sercice_tree-form',
			'enableAjaxValidation'=>false,
			));
?>

<p class="help-block">带有<span class="required">*</span> 是必填项.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'owners',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'parent_path',array('class'=>'span5','maxlength'=>255)); ?>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
			)); ?>
</div>

<?php $this->endWidget(); ?>
