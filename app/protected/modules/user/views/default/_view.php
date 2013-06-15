<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vkid')); ?>:</b>
	<?php echo CHtml::encode($data->vkid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birth_day')); ?>:</b>
	<?php echo CHtml::encode($data->birth_day); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birth_month')); ?>:</b>
	<?php echo CHtml::encode($data->birth_month); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('birth_year')); ?>:</b>
	<?php echo CHtml::encode($data->birth_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registered')); ?>:</b>
	<?php echo CHtml::encode($data->registered); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_activity')); ?>:</b>
	<?php echo CHtml::encode($data->last_activity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prev_activity')); ?>:</b>
	<?php echo CHtml::encode($data->prev_activity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo_50')); ?>:</b>
	<?php echo CHtml::encode($data->photo_50); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo_100')); ?>:</b>
	<?php echo CHtml::encode($data->photo_100); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo_200')); ?>:</b>
	<?php echo CHtml::encode($data->photo_200); ?>
	<br />

	*/ ?>

</div>