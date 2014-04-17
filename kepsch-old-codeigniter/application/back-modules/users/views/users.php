

	<table class="results">	
		
		<?php if ($this->session->flashdata('info')) : ?>
		<tr>
			<th colspan="6" class="info">
				<?php echo $this->session->flashdata('info'); ?>
			</th>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<?php endif; ?>
		<tr>
			<th>тип</th> 
			<th>логін</th>
			<th>додано</th>
			<th>модерує</th>
			<th><?php echo anchor('admin/users/create','додати'); ?></th>
		</tr>

		<?php 

		$types = $this->config->item('users_types');
		foreach ($list as $key) { 
		?>
		<tr>
			<td width="20%"><?php echo $types[$key['level']]; ?></td>
			<td width="20%"><?php echo $key['username']; ?></td>
			<td><?php echo $key['added']; ?></td>
			<td><?php if ($key['id']!=1) { echo $key['group']['name']; } else { echo 'увесь всесвіт';  }?></td>
			<td width="40" align="left"><?php if ($key['id']!=1) { echo anchor('admin/users/edit/'.$key['id'],'редагувати'); } ?></td>
			<td width="40" align="left"><?php if ($key['id']!=1) { echo anchor('admin/users/delete/'.$key['id'],'видалити'); } ?></td> 
		</tr>
	<?php }?>	 
	</table>
	<br />
