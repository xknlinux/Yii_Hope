<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'datacenter-form',
			'enableAjaxValidation'=>false,
			));
?>

<p class="help-block">带有<span class="required">*</span> 是必填项.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'bug_id',array('class'=>'span5')); ?>

<?php echo $form->dropDownListRow($model,'host_id', Hosts::model()->getOptions('reports'), array('size'=>0,'prompt'=>'---请选择---',)); ?>

<?php echo $form->textFieldRow($model,'device_id',array('class'=>'span5')); ?>

<?php echo $form->textAreaRow($model,'reason',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<?php echo $form->textFieldRow($model,'report_time',array('class'=>'span5')); ?>

<?php echo $form->textFieldRow($model,'fix_time',array('class'=>'span5')); ?>

<?php echo $form->textFieldRow($model,'reportor',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'processor',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->dropDownListRow($model,'problem_type', RepairReason::model()->getOptions('reports'), array('size'=>0,'prompt'=>'---请选择---',)); ?>


<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
			)); ?>
</div>
<?php $this->endWidget(); ?>
