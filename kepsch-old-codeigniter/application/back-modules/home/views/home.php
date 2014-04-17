	
		<table  class="stats">

		<?php if ($this->session->flashdata('info')) : ?>
		<tr>
			<td colspan="4" class="center">
			<?php echo $this->session->flashdata('info'); ?>
			</td>
		</tr>
		<?php endif; ?>
		<tr><td colspan="4">&nbsp;</td></tr>
		
		<tr>
			<td class="r">груп :</td>
			<td class="l"><?php echo $stats['groups']; ?></td>
			<td class="r"> предметів :</td>
			<td class="l"><?php echo $stats['lessons']; ?></td>
		</tr>
		<tr>
			<td class="r">готових :</td>
			<td class="l"><?php echo $stats['ready']; ?></td>
			<td class="r"> викладачів :</td>
			<td class="l"><?php echo $stats['teachers']; ?></td>
		</tr>
		<tr>
			<td class="r">модераторів :</td>
			<td class="l"><?php echo $stats['moders']; ?></td>
			<td class="r">аудиторій :</td>
			<td class="l"><?php echo $stats['auds']; ?></td>
		</tr>
		
		<tr>
		</tr>
		<tr><td colspan="4">&nbsp;</td></tr>		
		<tr>
			<td class="bb" colspan="4"> Останні редаговані розклади</td>
		</tr>
		<?php foreach ($stats['last_edited'] as $id => $entry) { ?>
		<tr>
			<td colspan="1"><?php echo anchor(base_url().'group/'.$id, $entry['group']); ?></td>
			<td align="left" colspan="2"><?php echo $entry['updated_time']; ?></td>
			<td align="left" colspan="1"><?php echo $entry['updated_by']; ?></td>
		</tr>
		<?php } ?>


		
	</table>




	<br>
