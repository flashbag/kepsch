<?php
/* @var $this SchController */
/* @var $model Sch */
/* @var $form CActiveForm */
?>


<div class="row">
	<div class="col-lg-6"  style="margin: 0 auto; float: none">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">Історія редагування розкладу <?=$group->groupName()?></h1>


			</div>
			<div class="panel-body">

				<ul class="list-group">
					
					<?php foreach ($models as $model): $url_array = array('id'=>$group->id,'sch_id'=>$model->id); ?>
						<?php if (reset($models) == $model): ?>
						<li class="list-group-item" style="font-size: 110%">				
						<?php else: ?>
						<li class="list-group-item">				
						<?php endif; ?>
							<a href="http://vk.com/id<?=$model->modifiedBy->vkid?>" target="_blank"><?= $model->modifiedBy->first_name ?> <?= $model->modifiedBy->last_name ?></a> @  
							<?php if (reset($models) == $model): unset($url_array['sch_id']); ?>
								актуальна версія
							<?php else: ?>
							<?php echo Yii::app()->dateFormatter->format(Yii::app()->params['dateFormat'], $model->modified_time); ?>
							<?php endif; ?>
							<span class="pull-right">
								<a href="<?php echo Yii::app()->controller->createUrl('/sch/sch/manage',$url_array); ?>">Переглянути</a>
							</span>
						</li>
					<?php endforeach; ?>
					
				</ul>

			</div>
		</div>
	</div>
</div>