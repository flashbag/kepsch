
		<div id="table">
			<?php 

			$start = 1;
			$column = ceil(count($teachers)/5);

			?>
			<div class="column">
			<?php foreach ($teachers as $id => $teacher) : ?>
			<div><?php echo anchor('teacher/'.$id, $teacher['href'], 'title="'.$teacher['title'].'"') ?></div>
		
			<?php $start++; if ($start>$column) { ?> 
			</div>
			<div class="column"> 
			<?php $start=1; } ?>

			<?php endforeach; ?>
		
		</div>

	</div>
