<?php
/* @var $this LessonController */
/* @var $data Lesson */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lesson-form',
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
								<a class="model-link" href="<?php echo Yii::app()->controller->createUrl('/lesson'); ?>"><?php echo $model->modelName(); ?></a>
								&nbsp;&raquo;&nbsp;
								<span class="model-link">
								<?php 
									echo $model->singleName();
									echo $model->isNewRecord ? '' : '&nbsp;'.$model->name ; 
								?>
								</span>
								 
							</legend>


							<div class="form-group">
								<?php echo $form->labelEx($model,'name', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-10">
									<?php echo $form->textField($model,'name',array('maxlength'=>45,'disabled'=>'disabled','class'=>'form-control','placeholder' => $model->getAttributeLabel('name') )); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'fullname', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-10">
									<?php echo $form->textField($model,'fullname',array('maxlength'=>45,'disabled'=>'disabled','class'=>'form-control','placeholder' => $model->getAttributeLabel('fullname') )); ?>
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


							



						</fieldset>
					</form>
				</div>
			</div>
		</div>

<?php $this->endWidget(); ?>