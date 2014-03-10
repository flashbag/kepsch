<?php
/* @var $this GroupController */
/* @var $model Group */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'spec-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=> array(
			'class' => 'bs-example form-horizontal',
		), 
)); ?>


<?php 

if ($this->action->id == 'update') {


	Yii::app()->clientScript->registerScript('group-update',"

		$('.g-select').attr('disabled','disabled');

	",CClientScript::POS_READY);


} else {

	Yii::app()->clientScript->registerScript('group-create',"

		data = JSON.parse($('#existing-groups').html());

		$('.g-select').change(function(){

			$('#number-select option').removeAttr('disabled');

			code = $('#code-select').val();
			year = $('#year-select').val();

			if (code != '0' && year != '0'){
				$.each(data, function(i, group) {
					if (code == group[0] && year == group[1]) {
						console.log(group);	
						console.log( $('#number-select option[value=' + group[2] + ']'));
						$('#number-select option[value=' + group[2] + ']').attr('disabled','disabled');
					}
				});
			} 

		});

	",CClientScript::POS_READY);

}
?>



		<div class="row">
			<div class="col-lg-6" style="margin: 0 auto; float: none">
				<div class="well">
						<fieldset>
						
							<legend>
								<a class="model-link" href="<?php echo Yii::app()->controller->createUrl('/group/admin'); ?>"><?php echo $model->modelName(); ?></a>
								&nbsp;&raquo;&nbsp;
								<?php 
									echo $model->isNewRecord ? Yii::app()->params['actions']['create'] : Yii::app()->params['actions']['update']; 
									echo '&nbsp;групу';
									echo $model->isNewRecord ? '' : '&nbsp;'.$model->group_spec->code.'-'.$model->year.'-0'.$model->number ; 
								?>
								 
							</legend>

							<?php echo $form->errorSummary($model); ?>
							<br>
							
							<div class="form-group">
								<?php echo $form->labelEx($model,'code', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-2" style="padding-right:0">
									<?php echo $form->dropDownList($model, 'code', Yii::app()->sch->activeSpecs(),array('class'=>'form-control g-select','id'=>'code-select'));?>
								</div>
								<div class="col-lg-2" style="padding-right:0">
									<?php echo $form->dropDownList($model, 'year', Yii::app()->sch->activeYears(),array('class'=>'form-control g-select','id'=>'year-select'));?>
								</div>
								<div class="col-lg-2" style="padding-right:0">
									<?php echo $form->dropDownList($model, 'number', Yii::app()->sch->activeNumbers(),array('class'=>'form-control g-select','id'=>'number-select'));?>
								</div>
								
							</div>


							<?php if ($this->action->id == 'update'): ?>
							<div class="form-group">
								<?php echo $form->labelEx($model,'status', array('class'=>'col-lg-2')); ?>
								<div class="col-lg-6">
									<?php echo $form->dropDownList($model, 'status', array(0 => Yii::app()->params['statuses']['0'], 1=> Yii::app()->params['statuses']['1']),array('class'=>'form-control'));?>
								</div>
							</div>
							<?php else: ?>
							<div class="form-group">								
								<label class="col-lg-2">&nbsp;</label>
								<div class="col-lg-6">
								<span class="help-block">Підказка: якщо ви не можете вибрати потрібний номер для створення групи, значить така група вже існує.</span>
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

<div id="existing-groups" style="display:none"><?php echo json_encode(Yii::app()->sch->existingGroups(),JSON_FORCE_OBJECT);  ?></div>