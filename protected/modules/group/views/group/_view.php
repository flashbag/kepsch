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
								<a class="model-link" href="<?php echo Yii::app()->controller->createUrl('/group/admin'); ?>"><?php echo $model->modelName(); ?></a>
								&nbsp;&raquo;&nbsp;
								<span class="model-link">
								<?php 
									echo $model->singleName();
									echo $model->isNewRecord ? '' : '&nbsp;'.$model->group_spec->code.'-'.$model->year.'-0'.$model->number ; 
								?>
								</span>
								 
							</legend>

							<div class="form-group">
								<?php echo $form->labelEx($model,'code', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-2" style="padding-right:0">
									<?php echo $form->dropDownList($model, 'code', Yii::app()->sch->activeSpecs(),array('disabled' => 'disabled', 'class'=>'form-control g-select','id'=>'code-select'));?>
								</div>
								<div class="col-lg-2" style="padding-right:0">
									<?php echo $form->dropDownList($model, 'year', Yii::app()->sch->activeYears(),array('disabled' => 'disabled', 'class'=>'form-control g-select','id'=>'year-select'));?>
								</div>
								<div class="col-lg-2" style="padding-right:0">
									<?php echo $form->dropDownList($model, 'number', Yii::app()->sch->activeNumbers(),array('disabled' => 'disabled', 'class'=>'form-control g-select','id'=>'number-select'));?>
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