<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'datacenter-form',
			'enableAjaxValidation'=>false,
			));
?>

<p class="help-block">带有<span class="required">*</span> 是必填项.</p>
<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'group_name',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'manager',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>


<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
			)); ?>
</div>
<?php $this->endWidget(); ?>
