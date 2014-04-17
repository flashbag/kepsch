
	<div class="home">
		<p>
				<a href="http://vk.com/wall-25902243_200">Що це за нове лайно?</a><br>
		</p>

		<table class="select" border="0">

		<?php if ($last) : ?>
			<tr><td colspan="2"><?php echo anchor($last,'показати останній переглянутий розклад'); ?>
		<?php endif; ?>
	
			<tr>
				<td><?php echo anchor('groups',$this->config->item('select_group')); ?>
				<td><?php echo anchor('teachers',$this->config->item('select_teacher')); ?>
		</table>
	</div>
	<br>
