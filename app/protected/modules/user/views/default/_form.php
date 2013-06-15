<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'vkid'); ?>
		<?php echo $form->textField($model,'vkid'); ?>
		<?php echo $form->error($model,'vkid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birth_day'); ?>
		<?php echo $form->textField($model,'birth_day',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'birth_day'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birth_month'); ?>
		<?php echo $form->textField($model,'birth_month',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'birth_month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birth_year'); ?>
		<?php echo $form->textField($model,'birth_year',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'birth_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registered'); ?>
		<?php echo $form->textField($model,'registered'); ?>
		<?php echo $form->error($model,'registered'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_activity'); ?>
		<?php echo $form->textField($model,'last_activity'); ?>
		<?php echo $form->error($model,'last_activity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prev_activity'); ?>
		<?php echo $form->textField($model,'prev_activity'); ?>
		<?php echo $form->error($model,'prev_activity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photo_50'); ?>
		<?php echo $form->textField($model,'photo_50',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'photo_50'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photo_100'); ?>
		<?php echo $form->textField($model,'photo_100',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'photo_100'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photo_200'); ?>
		<?php echo $form->textField($model,'photo_200',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'photo_200'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->