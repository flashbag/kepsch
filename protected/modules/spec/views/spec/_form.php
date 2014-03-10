<?php
/* @var $this SpecController */
/* @var $model Spec */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'spec-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=> array(
			'class' => 'bs-example form-horizontal',
		), 
)); ?>


		<div class="row">
			<div class="col-lg-6" style="margin: 0 auto; float: none">
				<div class="well">
						<fieldset>
						
							<legend>
								<a class="model-link" href="<?php echo Yii::app()->controller->createUrl('/spec'); ?>"><?php echo $model->modelName(); ?></a>
								&nbsp;&raquo;&nbsp;
								<?php 
									echo $model->isNewRecord ? Yii::app()->params['actions']['create'] : Yii::app()->params['actions']['update']; 
									echo '&nbsp;'.$model->singleName();
									echo $model->isNewRecord ? '' : '&nbsp;'.$model->code ; 
								?>
								 
							</legend>

							<?php echo $form->errorSummary($model); ?>
							<br>
							
							<div class="form-group">
								<?php echo $form->labelEx($model,'code', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-10">
									<?php echo $form->textField($model,'code',array('maxlength'=>10,'class'=>'form-control','placeholder' => $model->getAttributeLabel('code') )); ?>
								</div>
							</div>


							<div class="form-group">
								<?php echo $form->labelEx($model,'name', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-10">
									<?php echo $form->textField($model,'name',array('maxlength'=>45,'class'=>'form-control','placeholder' => $model->getAttributeLabel('name') )); ?>
								</div>
							</div>


							<div class="form-group">
								<?php echo $form->labelEx($model,'description', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-10">
									<?php echo $form->textArea($model,'description',array('rows'=>3,'class'=>'form-control')); ?>
								</div>
							</div>

							<?php if (Yii::app()->user->isAdmin()): ?>
							<div class="form-group">
								<?php echo $form->labelEx($model,'status', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-10">
									<?php echo $form->dropDownList($model, 'status', array(0 => Yii::app()->params['statuses']['0'], 1=> Yii::app()->params['statuses']['1']),array('class'=>'form-control'));?>
								</div>
							</div>
							<?php endif; ?>


							<div class="form-group">
								<div class="col-lg-2"></div>
								<div class="col-lg-10 col-lg-offset-2">
									<?php echo CHtml::submitButton($model->isNewRecord ? Yii::app()->params['actions']['create'] : Yii::app()->params['actions']['update'], array('class'=>'btn btn-primary')); ?>
									<button class="btn btn-default"><?php echo Yii::app()->params['actions']['cancel']; ?></button> 
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>

<?php $this->endWidget(); ?>

