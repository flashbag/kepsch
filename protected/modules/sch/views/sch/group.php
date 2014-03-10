<?php
/* @var $this SchController */
/* @var $model Sch */
?>

	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-6 col-sm-12">
				<h1 class="">Розклад групи <?=$group->groupName()?></h1>								
			</div>
			<div class="col-lg-6 col-sm-12">								
				<p class="pull-right" style="display: block; margin-top: 4%;">
				<a href="<?php echo Yii::app()->controller->createUrl('/sch/sch/manage',array('id'=>$group->id)); ?>" class="btn btn-primary btn-lg">Редагувати розклад</a>
				</p>									
			</div>
		</div>
	</div>


  		<div class="row lists">
  			<div class="col-lg-12">			
				<ul id="flexisel">
					<?php foreach (Yii::app()->params['days'] as $d => $day): ?>
					<li class="col-lg-4">  
						<h2><?=$day?></h2>
						<div class="text-left entry">
							<?php if (isset($sch[$d])): ?>
							<?php foreach ($sch[$d] as $n => $record): ?>
								<?php foreach ($record as $l => $lesson): ?>
									<p class="title"><span class="number"><?=$n?>.</span> <?php echo Yii::app()->sch->lessonName($l)?></p>	
									<?php foreach ($lesson['tchs'][$l] as $t => $tch): ?>
									<p class="subitem subheader"><a href="#"><?php echo Yii::app()->sch->teacherName($tch)?></a></p>
									<?php endforeach; ?>
									<p class="auditory subheader">
										<?php echo Yii::app()->sch->audsName($lesson['auds'][$l])?>
									</p>
										
								<?php endforeach; ?>
							<?php endforeach; ?>
							<?php else: ?>
								<div class="no-lessons alert" style="background-color: rgba(223, 223, 223, 0.59); "> 
									<h4><?php echo Yii::app()->params['errors']['no_lessons']?></h4>
									<br><br>
									<a class="btn btn-md btn-success" style="padding: 8px;" target="_blank" href="<?php echo Yii::app()->controller->createUrl('/sch/sch/manage',array('id'=>$group->id)); ?>#day<?=$d?>">Додати пари</a>
								</div>
							<?php endif; ?>
						</div>            			
					</li> 
					<?php endforeach; ?>				
					<li class="col-lg-4"> 
					</li>
				</ul>
			</div>
  		</div>


<?php

$today = (date('w')<6) ? date('w') : 1;

Yii::app()->clientScript->registerScript('row-control',"

    $('#flexisel').flexisel({
        clone:false,
        today: ".$today.",    	
    	visibleItems : 3,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:500,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:810,
                visibleItems: 2
            },
            tablet: { 
                changePoint:1024,
                visibleItems: 3
            }
        },
    });

",CClientScript::POS_READY);
	
?>

