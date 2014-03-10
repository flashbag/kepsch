<?php
/* @var $this SpecController */
/* @var $model Spec */
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
								<span class="model-link">
								<?php 
									echo $model->singleName();
									echo $model->isNewRecord ? '' : '&nbsp;'.$model->code ; 
								?>
								</span>
								 
							</legend>

							<div class="form-group">
								<?php echo $form->labelEx($model,'code', array('class'=>'col-lg-2') ); ?>
								<div class="col-lg-10">
									<?php echo $form->textField($model,'code',array('maxlength'=>10,'disabled'=>'disabled','class'=>'form-control','placeholder' => $model->getAttributeLabel('code') )); ?>
								</div>
							</div>


							<div class="form-group">
								<?php echo $form->labelEx($model,'name', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-10">
									<?php echo $form->textField($model,'name',array('maxlength'=>45,'disabled'=>'disabled','class'=>'form-control','placeholder' => $model->getAttributeLabel('name') )); ?>
								</div>
							</div>




							<div class="form-group">
								<?php echo $form->error($model,'description'); ?>
								<?php echo $form->labelEx($model,'description', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-10">
									<?php echo $form->textArea($model,'description',array('rows'=>3,'disabled'=>'disabled','class'=>'form-control')); ?>
								</div>
							</div>


							<div class="form-group">
								<label class="col-lg-2"><?=Yii::app()->params['labels']['created']?></label>
								<div class="col-lg-10">									
									<?php if ($user = Yii::app()->user->userByID($model->updated_by)) : ?>
										<a href="http://vk.com/id<?=$user['vkid']?>" target="_blank"><?= $user['name']?></a> - 
										<?php echo Yii::app()->dateFormatter->format(Yii::app()->params['dateFormat'], $model->created_time);?>
									<?php else: ?>
										undefined
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
										undefined
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