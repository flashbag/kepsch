<?php
/* @var $this SchController */
/* @var $model Sch */
?>

	<div class="row" style="margin-bottom: 1%;">
		<div class="col-lg-12">
			<div class="col-lg-10 col-sm-12">
				<h1 class="">Розклад викладача <?=$teacher->surname?> <?=$teacher->initials?></h1>								
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
								<?php foreach ($record as $value): ?>
									<p class="title"><span class="number"><?=$n?>.</span> <a href="#"><?php echo Yii::app()->sch->groupName($value['group_id'])?></a></p>
									<p class="subitem subheader"> <?php echo Yii::app()->sch->lessonName($value['lesson_id'])?> </p>
									<p class="auditory subheader"> <?php echo Yii::app()->sch->audName($value['aud_id'])?>
								<?php endforeach; ?>																								
							<?php endforeach; ?>
							<?php else: ?>							
								<div class="no-lessons alert" style="background-color: rgba(223, 223, 223, 0.59); "> 
									<h4><?php echo Yii::app()->params['errors']['no_lessons_tch']?></h4>
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

