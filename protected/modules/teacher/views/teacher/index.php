<?php
/* @var $this SpecController */
/* @var $model Spec */
?>

  		<div class="row lists">
  			<div class="col-lg-12">
			<?php for ($c=0; $c<4; $c++): ?>
  				<div class="col-lg-3">
  					<div class="list-group">
             	<span class="list-group-item active teacher"><?php $t1 = $teachers[$c*ceil(count($teachers)/4)]; $t2 = (isset($teachers[($c+1)*ceil(count($teachers)/4)-1])) ? $teachers[($c+1)*ceil(count($teachers)/4)-1] : end($teachers); echo substr($t1['text'],0,2).'&nbsp;-&nbsp;'.substr($t2['text'],0,2); ?></span>
             <?php for($i=$c*ceil(count($teachers)/4); $i<($c+1)*ceil(count($teachers)/4); $i++) : ?>		
             <?php if (isset($teachers[$i])) : ?>
  						<a href="<?php echo Yii::app()->controller->createUrl('/sch/sch/teacher',array('id'=>$teachers[$i]['id'])); ?>" class="list-group-item" title=""><?=$teachers[$i]['text']?></a>
  						<?php else: ?>
  						<a href="#" class="list-group-item t-empty" title=""></a>
  						<?php endif; ?>
  						<?php endfor; ?>
  					</div>
  				</div>
  			<?php endfor; ?>
  			</div>
  		</div>



  		<div class="jumbotron">
  			<p class="text-center centered">
  				<a class="btn btn-success btn-lg dropdown-toggle" href="<?php echo Yii::app()->controller->createUrl('/teacher/teacher/admin'); ?>"><?php echo Yii::app()->params['messages']['goto_edit_mode']; ?></a>
  			</p>
  		</div>