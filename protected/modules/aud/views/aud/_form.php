<?php
/* @var $this LessonController */
/* @var $model Lesson */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'aud-form',
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
								<a class="model-link" href="<?php echo Yii::app()->controller->createUrl('/aud'); ?>"><?php echo $model->modelName(); ?></a>
								&nbsp;&raquo;&nbsp;
								<?php 
									echo $model->isNewRecord ? Yii::app()->params['actions']['create'] : Yii::app()->params['actions']['update']; 
									echo '&nbsp;аудиторію';
									echo $model->isNewRecord ? '' : '&nbsp;'.$model->name ; 
								?>
								 
							</legend>

							<?php echo $form->errorSummary($model); ?>
							<br>

							<div class="form-group">
								<?php echo $form->labelEx($model,'name', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-10">
									<?php if ($this->action->id == 'update') : ?>
									<?php echo $form->textField($model,'name',array('maxlength'=>70,'class'=>'form-control','disabled' => 'disabled', 'placeholder' => $model->getAttributeLabel('name') )); ?>
									<?php else: ?>
									<?php echo $form->textField($model,'name',array('maxlength'=>70,'class'=>'form-control','placeholder' => $model->getAttributeLabel('name') )); ?>
									<?php endif; ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'type', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-10">
									<?php echo $form->dropDownList($model, 'type', Yii::app()->params['aud_types'], array('class'=>'form-control'));?>
								</div>
							</div>


							<?php if (Yii::app()->user->isAdmin() && $this->action->id == 'update'): ?>
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