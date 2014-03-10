<?php
/* @var $this LessonController */
/* @var $data Lesson */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'teacher-form',
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
								<a class="model-link" href="<?php echo Yii::app()->controller->createUrl('/teacher'); ?>"><?php echo $model->modelName(); ?></a>
								&nbsp;&raquo;&nbsp;
								<span class="model-link">
								<?php 
									echo $model->singleName();
									echo $model->isNewRecord ? '' : '&nbsp;'.$model->surname.' '.$model->initials ; 
								?>
								</span>
								 
							</legend>


							<div class="form-group">
								<?php echo $form->labelEx($model,'surname', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-10">
									<?php echo $form->textField($model,'surname',array('maxlength'=>45,'disabled'=>'disabled','class'=>'form-control','placeholder' => $model->getAttributeLabel('surname') )); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'initials', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-10">
									<?php echo $form->textField($model,'initials',array('maxlength'=>4,'disabled'=>'disabled','class'=>'form-control','placeholder' => $model->getAttributeLabel('initials') )); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'first_name', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-10">
									<?php echo $form->textField($model,'first_name',array('maxlength'=>45,'disabled'=>'disabled','class'=>'form-control','placeholder' => $model->getAttributeLabel('first_name') )); ?>
								</div>
							</div>							

							<div class="form-group">
								<?php echo $form->labelEx($model,'second_name', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-10">
									<?php echo $form->textField($model,'second_name',array('maxlength'=>45,'disabled'=>'disabled','class'=>'form-control','placeholder' => $model->getAttributeLabel('second_name') )); ?>
								</div>
							</div>	


							<div class="form-group">
								<label class="col-lg-2"><?=Yii::app()->params['labels']['created']?></label>
								<div class="col-lg-10">									
									<?php if ($user = Yii::app()->user->userByID($model->updated_by)) : ?>
										<a href="http://vk.com/id<?=$user['vkid']?>" target="_blank"><?= $user['name']?></a> - 
										<?php echo Yii::app()->dateFormatter->format(Yii::app()->params['dateFormat'], $model->created_time);?>
									<?php else: ?>
										<?php echo Yii::app()->params['errors']['no_creator'] ?>
									<?php endif; ?>						
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-2"><?=Yii::app()->params['labels']['updated']?></label>
								<div class="col-lg-10">
									<?php if ($user = Yii::app()->user->userByID($model->updated_by)) : ?>
										<a href="http://vk.com/id<?=$user['vkid']?>" target="_blank"><?= $user['name']?></a> - 
										<?php echo Yii::app()->dateFormatter->format(Yii::app()->params['dateFormat'], $model->updated_time);?>
									<?php else: ?>
										<?php echo Yii::app()->params['errors']['no_creator'] ?>
									<?php endif; ?>						
								</div>
							</div>


							<div class="form-group">
								<?php echo $form->labelEx($model,'status', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-10">
									<?php echo Yii::app()->params['statuses'][$model->status]; ?>
								</div>
							</div>
													
						</fieldset>
					</form>
				</div>
			</div>
		</div>

<?php $this->endWidget(); ?>