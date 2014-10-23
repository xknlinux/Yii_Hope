<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'sercice_tree-form',
			'enableAjaxValidation'=>false,
			));
?>

<p class="help-block">带有<span class="required">*</span> 是必填项.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->dropDownListRow($model,'host_id', Hosts::model()->getOptions('services'), array('size'=>0,'prompt'=>'---请选择---',)); ?>


<?php echo $form->textFieldRow($model,'shard_id',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'replica_id',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'enable',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'install_path',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'from_id',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'mtime',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'last_change_author',array('class'=>'span5','maxlength'=>255)); ?>


<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
			)); ?>
</div>

<?php $this->endWidget(); ?>

