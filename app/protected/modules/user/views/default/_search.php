<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vkid'); ?>
		<?php echo $form->textField($model,'vkid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birth_day'); ?>
		<?php echo $form->textField($model,'birth_day',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birth_month'); ?>
		<?php echo $form->textField($model,'birth_month',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birth_year'); ?>
		<?php echo $form->textField($model,'birth_year',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registered'); ?>
		<?php echo $form->textField($model,'registered'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_activity'); ?>
		<?php echo $form->textField($model,'last_activity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prev_activity'); ?>
		<?php echo $form->textField($model,'prev_activity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'photo_50'); ?>
		<?php echo $form->textField($model,'photo_50',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'photo_100'); ?>
		<?php echo $form->textField($model,'photo_100',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'photo_200'); ?>
		<?php echo $form->textField($model,'photo_200',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->