<?php
/* @var $this LessonController */
/* @var $model Lesson */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'teacher-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=> array(
			'class' => 'bs-example form-horizontal',
		), 
)); ?>

<?php
Yii::app()->clientScript->registerScript('group-create',"
	
	var preinitials = $('#initials').val();

	$('.initial').change(function(){

		var first_name = $('#first_name').val();
		var second_name = $('#second_name').val();

		if (first_name != '' && second_name != '' && preinitials == '') {
			$('#initials').val(first_name.substring(0,1).toUpperCase() + '.'  + second_name.substring(0,1).toUpperCase() + '.');			
		}
		
	});

",CClientScript::POS_READY);
?>


		<div class="row">
			<div class="col-lg-6" style="margin: 0 auto; float: none">
				<div class="well">
						<fieldset>
						
							<legend>
								<a class="model-link" href="<?php echo Yii::app()->controller->createUrl('/teacher/admin'); ?>"><?php echo $model->modelName(); ?></a>
								&nbsp;&raquo;&nbsp;
								<?php 
									echo $model->isNewRecord ? Yii::app()->params['actions']['create'] : Yii::app()->params['actions']['update']; 
									echo '&nbsp;'.$model->singleName();
									echo $model->isNewRecord ? '' : '&nbsp;'.$model->surname.' '.$model->initials ; 
								?>
								 
							</legend>

							<?php echo $form->errorSummary($model); ?>
							<br>



							<div class="form-group">
								<?php echo $form->labelEx($model,'surname', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-10">
									<?php echo $form->textField($model,'surname',array('maxlength'=>45,'class'=>'form-control','placeholder' => $model->getAttributeLabel('surname') )); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'initials', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-10">
									<?php echo $form->textField($model,'initials',array('id'=>'initials','maxlength'=>4,'class'=>'form-control','placeholder' => $model->getAttributeLabel('initials') )); ?>
									<span class="help-block">Примітка: якщо заповнити <b>Ім'я</b> та <b>По-батькові</b> то ініціали заповнятся автоматично.</span>
								</div>

							</div>
							
							<div class="form-group">
								<?php echo $form->labelEx($model,'first_name', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-10">
									<?php echo $form->textField($model,'first_name',array('id' => 'first_name', 'maxlength'=>45,'class'=>'initial form-control','placeholder' => $model->getAttributeLabel('first_name') )); ?>
								</div>
							</div>							

							<div class="form-group">
								<?php echo $form->labelEx($model,'second_name', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-10">
									<?php echo $form->textField($model,'second_name',array('id' => 'second_name', 'maxlength'=>45,'class'=>'initial form-control','placeholder' => $model->getAttributeLabel('second_name') )); ?>
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