<?php
/* @var $this ActivityController */

$days = array(); 
$classes = array('list-group-item-odd','list-group-item-even');

?>

<div class="row">
	<div class="col-lg-12">
		<div class="col-lg-6">
			<h1 class="">Активність</h1>
		</div>

		<div class="col-lg-6">								
			<p class="pull-right" style="display: block; margin-top: 4%; margin-bottom: 0;">
			<?php echo CHtml::dropDownList('activity_filter', '', Yii::app()->params['activity']['modules_filter'], array('class'=>'activity-filter form-control'));?>
			</p>
		</div>

	</div>
</div>


<div class="row">
	<div class="col-lg-12">

		<ul class="list-group" style="font-size: 120%;">
			<?php foreach ($entries as $key => $activity) : ?>

				<?php if (!in_array(Yii::app()->dateFormatter->format('dd', $activity['time']), $days)) : ?>
				<li class="list-group-item <?php echo $classes[count($days)%2]; ?>"><big><?php echo Yii::app()->dateFormatter->format('d MMMM', $activity['time']) ?></big></li>
				<?php $days[] = Yii::app()->dateFormatter->format('dd', $activity['time']); endif; ?>
			
				<?php $user = User::model()->findByAttributes(array('id'=>$activity['user'])); ?>

				<li class="list-group-item <?php echo $classes[(count($days)-1)%2]; ?> activity-entry <?php echo strtolower($activity['module']); ?>"> 
				
					<a href="http://vk.com/id<?=$user->vkid?>" target="_blank">
					<img class="activity_image" src="<?=$user->photo_50?>"> <?=$user->first_name?> <?=$user->last_name?>
					</a>
					<?php echo ($activity['module'] != 'sch') ? Yii::app()->params['activity']['actions'][$activity['action'].'-'.$user->sex] :  Yii::app()->params['activity']['actions']['update-'.$user->sex]; ?>
					<?php echo Yii::app()->params['activity']['modules'][$activity['module']]; ?>

					<?php if ($activity['module'] == 'sch'): ?>
					<a href="<?php echo Yii::app()->controller->createUrl('/sch/sch/group',array('id'=>$activity['id'])); ?>">
					<?php echo Yii::app()->activity->name('group',$activity['id']); ?>
					<?php else: ?>
					<a href="<?php echo Yii::app()->controller->createUrl('/'.$activity['module'].'/'.$activity['id']); ?>">
					<?php echo Yii::app()->activity->name($activity['module'],$activity['id']); ?>
					<?php endif; ?>
						
					</a>

					<span class="pull-right">
					<?php echo Yii::app()->dateFormatter->format(Yii::app()->params['dateFormat'], $activity['time']);?>
					</span>
					
				</li>

			<?php endforeach; ?>			
		</ul>

	</div>
</div>
<?php 
/*

?>


<div class="row">
	<div class="col-lg-12">

		<ul class="list-group" style="font-size: 120%;">

			<?php foreach ($activities as $activity) : ?>

				

				<li class="list-group-item <?php echo $classes[(count($days)-1)%2]; ?> activity-entry <?php echo strtolower($activity->module); ?>"> 
					<a href="http://vk.com/id<?=$activity->user->vkid?>" target="_blank">
					<img class="activity_image" src="<?=$activity->user->photo_50?>"> <?=$activity->user->first_name?> <?=$activity->user->last_name?>
					</a>
					<?php echo ($activity->module != 'Sch') ? Yii::app()->params['activity']['actions'][$activity->action.'-'.$activity->user->sex] :  Yii::app()->params['activity']['actions']['update-'.$activity->user->sex]; ?>
					<?php echo Yii::app()->params['activity']['modules'][$activity->module]; ?>

					<?php if ($activity->module == 'Sch'): ?>
					<a href="<?php echo Yii::app()->controller->createUrl('/sch/sch/group',array('id'=>$activity->act_id)); ?>">
					<?php else: ?>
					<a href="<?php echo Yii::app()->controller->createUrl('/'.strtolower($activity->module).'/'.$activity->act_id); ?>">
					<?php endif; ?>
						<?php echo Yii::app()->activity->name($activity->module,$activity->act_id); ?>
					</a>

					<span class="pull-right">
					<?php echo Yii::app()->dateFormatter->format(Yii::app()->params['dateFormat'], $activity->time);?>
					</span>
				</li>
			<?php endforeach; ?>

		</ul>


	</div>			
</div>



<?php

	Yii::app()->clientScript->registerScript('row-control',"

		$('.activity-filter').click(function(){
			value = $(this).val();
			if (value == 'all') {
				$('.activity-entry').show();
			} else {
				$('.activity-entry').each(function() {
					if (!$(this).hasClass(value)) {
						$(this).hide();
					}
				});	

				$('.' + value).show();		
			}

		});

	",CClientScript::POS_READY);

*/	
?>
