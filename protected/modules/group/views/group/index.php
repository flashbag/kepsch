<?php
/* @var $this groupController */
/* @var $model group */
?>


<div class="row">
	<div class="col-lg-12">
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="alert alert-dismissable alert-' . $key . '"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $message . "</div>\n";
    }
?>		
	</div>
</div>


<div class="row lists groups">
	<div class="col-lg-12">
		<?php foreach ($groups as $c => $course): ?>
			<div class="col-lg-3">
				<div class="list-group">
					<span class="list-group-item active course-<?=$c?>"><?=$c?> курс</span>
					<?php foreach ($course as $i => $items): ?>
						<div class="list-group-item buttons">
							<div class="btn-group">  							
								<?php foreach ($items as $id => $item): ?>
									<a href="<?php echo Yii::app()->controller->createUrl('/sch/sch/group',array('id'=>$id)); ?>" type="button" class="btn btn-default"><?=$i?>-<?=$item?></a>
								<?php endforeach; ?>  								  
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>



<div class="jumbotron">
	<p class="text-center centered">        
		<a class="btn btn-success btn-lg" href="<?php echo Yii::app()->controller->createUrl('/group/group/admin'); ?>"><?php echo Yii::app()->params['messages']['goto_edit_mode']; ?></a>                        
	</p>
</div>