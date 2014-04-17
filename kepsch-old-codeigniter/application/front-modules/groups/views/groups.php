
	<table id="table">	 
		<tr>
			<th></th><th>12</th><th>11</th><th>10</th><th>09</th>
		</tr>		
		<?php foreach($groups as $spec => $spec_groups) : ?>
		<tr>
			<th><?php echo $spec; $y = 1; ?></th>
			<?php foreach ($spec_groups as $year => $groups_row) : ?>
			<td>
				<?php $array = array();
				foreach ($groups_row as $link => $group) { if ($group['status']==1) { $array[] = anchor('group/'.$group['id'],$link); } }
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
	