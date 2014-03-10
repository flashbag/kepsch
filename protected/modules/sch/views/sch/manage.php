<?php
/* @var $this SchController */
/* @var $model Sch */
/* @var $form CActiveForm */
?>

	<div class="row">
		<div class="col-lg-12">

		<?php if ($sch['type'] == 'history'): ?>
		<div class="alert alert-info">
        	Ви переглядаєте версію розкладу з історії редагувань. <b><a href="<?php echo Yii::app()->controller->createUrl('/sch/sch/manage',array('id'=>$group->id)); ?>">Переглянути актуальну версію</a></b>
      	</div>
      	<?php elseif(isset($_GET['sch_id']) && $sch['type'] == 'latest'): ?>
      	<div class="alert alert-info">
        	Таку версію розкладу не знайдено або вона була видалена, тому що зберігаються тільки <?php echo Yii::app()->params['maxSchs']; ?> версій розкладу. Сорі Майкл, це бізнес.
      	</div>
      	<?php endif; ?>

      	</div>
    </div>


	<div class="row">
		<div class="col-lg-12">

			<div class="col-lg-6">
				<h1 class="">Редагування розкладу 
					 <!--<a target="_blank" href="<?php echo Yii::app()->controller->createUrl('/sch/sch/group',array('id'=>$group->id)); ?>" target="_blank">-->
					 	<?=$group->groupName()?>
				</h1>
				
				<div>
					<?php if ($sch['info']): ?>
						Відредаговано: <a href="http://vk.com/id<?=$sch['info']->modifiedBy->vkid?>" target="_blank"><?= $sch['info']->modifiedBy->first_name ?> <?= $sch['info']->modifiedBy->last_name ?></a> @  <?php echo Yii::app()->dateFormatter->format(Yii::app()->params['dateFormat'], $sch['info']->modified_time); ?>
					<?php else: ?>
						<?php echo Yii::app()->params['messages']['not_edited_yet']; ?>
					<?php endif; ?>					
				</div>
				
			</div>
			
			<div class="col-lg-6">								
				<p class="pull-right" style="display: block; margin-top: 4%; margin-bottom: 0;">
					<a href="<?php echo Yii::app()->controller->createUrl('/sch/sch/group',array('id'=>$group->id)); ?>" class="btn btn-primary btn-lg">Повернутися до розкладу</a>
					<?php if ($sch['info']): ?>
						<br><a href="<?php echo Yii::app()->controller->createUrl('/sch/sch/history',array('id'=>$group->id)); ?>" style="display: block; margin-top: 2%; margin-right: 2%" class="btn btn-md btn-default pull-right" >Історія редагувань</a>
					<?php endif; ?>									
				</p>
			</div>
			
		</div>
	</div>


	<br>


	<div class="row">
		<div class="col-lg-12">
		<?php foreach(Yii::app()->user->getFlashes() as $key => $message): ?>
        	<div class="alert alert-dismissable alert-<?=$key?>"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?=$message?></div>
		<?php endforeach; ?>		
		</div>
	</div>


	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'sch-form-form',
		'enableAjaxValidation'=>false,
		'htmlOptions' => array(
			'id' => 'sch-manage',
			'class' => 'bs-example form-horizontal',			
		),
	)); ?>


		<div class="row">
			<div class="col-lg-12" style="margin: 0 auto; float: none">
				<div class="well">

						<?php foreach (Yii::app()->params['days'] as $did => $day): ?>
						<fieldset id="day<?=$did?>">
							<legend><h2><?=$day?></h2></legend>
							<?php for ($i=1;$i<=Yii::app()->params['lessonsPerDay'];$i++): ?>

							<?php $display2 = ($sch['sch'][$did][$i]['rows'][2]['week'] != '0' && $sch['sch'][$did][$i]['rows'][2]['teacher'] != '0')	? 'block' : 'none'; ?>							
							<?php $display3 = ($sch['sch'][$did][$i]['rows'][3]['week'] != '0' && $sch['sch'][$did][$i]['rows'][3]['teacher'] != '0')	? 'block' : 'none'; ?>							
							<?php $plusicon = ($display2 == 'block' && $display3 == 'block') ? 'none' : 'inline-block'; ?>
							<div class="record">
								<div class="form-group row first-row">
									<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="padding-left: 20px;">
										<?php echo CHtml::dropDownList('Sch['.$did.']['.$i.'][number]', $sch['sch'][$did][$i]['number'], Yii::app()->params['numbers'],array('class'=>'form-control'));?>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
										<?php echo CHtml::dropDownList('Sch['.$did.']['.$i.'][lesson]', $sch['sch'][$did][$i]['lesson'], $data['lessons'],array('class'=>'form-control'));?>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
										<?php echo CHtml::dropDownList('Sch['.$did.']['.$i.'][rows][1][week]', $sch['sch'][$did][$i]['rows'][1]['week'], Yii::app()->params['weeks'],array('class'=>'form-control'));?>
									</div>
									<div class="col-lg-1 col-md-2 col-sm-2 col-xs-2">
										<?php echo CHtml::dropDownList('Sch['.$did.']['.$i.'][rows][1][aud]', $sch['sch'][$did][$i]['rows'][1]['aud'], $data['auds'],array('class'=>'form-control'));?>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										<?php echo CHtml::dropDownList('Sch['.$did.']['.$i.'][rows][1][teacher]', $sch['sch'][$did][$i]['rows'][1]['teacher'], $data['teachers'],array('class'=>'form-control'));?>
									</div>
									<div class="col-lg-1 col-md-2 col-sm-2 col-xs-2 text-center centered">
										<a class="btn btn-default row-control" style="display:<?=$plusicon?>"><i class="glyphicon glyphicon-plus"></i></a>
									</div>						
								</div>


								
								<div class="form-group row second-row" style="display:<?=$display2?>">

									<div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
										<?php echo CHtml::dropDownList('Sch['.$did.']['.$i.'][rows][2][week]', $sch['sch'][$did][$i]['rows'][2]['week'], Yii::app()->params['weeks'],array('class'=>'form-control'));?>
									</div>
									<div class="col-lg-1 col-md-2 col-sm-2">
										<?php echo CHtml::dropDownList('Sch['.$did.']['.$i.'][rows][2][aud]', $sch['sch'][$did][$i]['rows'][2]['aud'], $data['auds'],array('class'=>'form-control'));?>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-3">
										<?php echo CHtml::dropDownList('Sch['.$did.']['.$i.'][rows][2][teacher]', $sch['sch'][$did][$i]['rows'][2]['teacher'], $data['teachers'],array('class'=>'form-control'));?>
									</div>
									<div class="col-lg-1 col-md-2 col-sm-2 col-xs-2 text-center centered">
										<a class="btn btn-default row-control"><i class="glyphicon glyphicon-minus"></i></a>
									</div>								
								</div>

								
								<div class="form-group row third-row" style="display:<?=$display3?>">

									<div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
										<?php echo CHtml::dropDownList('Sch['.$did.']['.$i.'][rows][3][week]', $sch['sch'][$did][$i]['rows'][3]['week'], Yii::app()->params['weeks'],array('class'=>'form-control'));?>
									</div>
									<div class="col-lg-1 col-md-2 col-sm-2">
										<?php echo CHtml::dropDownList('Sch['.$did.']['.$i.'][rows][3][aud]', $sch['sch'][$did][$i]['rows'][3]['aud'], $data['auds'],array('class'=>'form-control'));?>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-3">
										<?php echo CHtml::dropDownList('Sch['.$did.']['.$i.'][rows][3][teacher]', $sch['sch'][$did][$i]['rows'][1]['teacher'], $data['teachers'],array('class'=>'form-control'));?>
									</div>
									<div class="col-lg-1 col-md-2 col-sm-2 col-xs-2 text-center centered">
										<a class="btn btn-default row-control"><i class="glyphicon glyphicon-minus"></i></a>
									</div>								
								</div>
							</div>
							<?php endfor; ?>

						</fieldset>
						<?php endforeach; ?>
				

					<div class="text-center">
						<input type="submit" class="btn btn-lg btn-primary" value="<?php echo Yii::app()->params['messages']['sch_button']; ?>">
					</div>

				</div>
			</div>
		</div>


<?php $this->endWidget(); ?>	

<?php

	Yii::app()->clientScript->registerScript('row-control',"

		$('.row-control').click(function(){

			var this_row = $(this).parent().parent();
			
			var first_row = $(this).parent().parent().parent().find('div.first-row');	
			var second_row = $(this).parent().parent().parent().find('div.second-row');
			var third_row = $(this).parent().parent().parent().find('div.third-row');

			if (this_row.hasClass('first-row')) {

				if (!second_row.is(':visible') && !third_row.is(':visible')) {
					second_row.fadeIn('slow');
				} else if (second_row.is(':visible') && !third_row.is(':visible')){
					third_row.fadeIn('slow');
					$(this).fadeOut('slow');
				} else if (!second_row.is(':visible') && third_row.is(':visible')){
					second_row.fadeIn('slow');
					$(this).fadeOut('slow');
				} 

			} else if (this_row.hasClass('second-row') || this_row.hasClass('third-row')) {
				this_row.hide();
				first_row.find('.row-control').show();
			}
		});

	",CClientScript::POS_READY);
	
?>