
	<table class="results">
		<?php if ($this->session->flashdata('info')) : ?>
		<tr>
			<th colspan="5" class="info">
				<?php echo $this->session->flashdata('info'); ?>
			</th>
		</tr>
		<tr><td></td></tr>
		<?php endif; ?>
		<tr>
			<th>
				<?php echo anchor('admin/groups/create','[ + ]'); ?>
			</th>
			<th>12</th><th>11</th><th>10</th><th>09</th>
		</tr>		
		<?php foreach($groups as $spec => $spec_groups) : ?>
		<tr>
			<th><?php echo $spec; $y = 1; ?></th>
			<?php foreach ($spec_groups as $year => $groups_row) : ?>
			<td>
				<?php $array = array();
				foreach ($groups_row as $link => $group) {
					$c = ($group['status']==1) ? 'ready' : 'dev' ;
					$array[] = anchor('admin/edit/'.$group['id'],$link,' class="'.$c.'"').anchor('admin/groups/delete/'.$group['id'],'(-)'); 
				}
				echo implode(', ', $array);	$y++;
				?>
			</td>
			<?php endforeach; ?>

			<?php if ($y < 5) : ?>
				<?php for ($yi=1; $yi<=5-$y; $yi++): ?>
					<td></td>
				<?php endfor; ?>
			<?php endif; ?>
		</tr>
		<?php endforeach; ?>
	</table>
	