

	<table class="results">	
		
		<?php if ($this->session->flashdata('info')) : ?>
		<tr>
			<th colspan="6" class="info">
				<?php echo $this->session->flashdata('info'); ?>
			</th>
		</tr>
		<?php endif; ?>
		<tr>
			<th>код</th> 
			<th>назва</th>
			<th>повна назва</th>
			<th colspan=2><?php echo anchor('admin/'.$this->router->class.'/create','додати'); ?></th>
		</tr>
		 
		<?php foreach ($list as $key): ?>
	 
		<tr>
			<td><?php echo $key['code']; ?></td>
	 
			<td width="30%"><?php echo $key['name']; ?></td>
			<td><?php echo $key['description']; ?></td>

			<td width="40" align="left" >
				<?php echo anchor('admin/'.$this->router->class.'/edit/'.$key['id'],'редагувати'); ?>
			</td>

			<td width="40" align="left" >
				<?php echo anchor('admin/'.$this->router->class.'/delete/'.$key['id'],'видалити'); ?>
			</td>
	 
		</tr> 
	<?php endforeach; ?>

	</table>
	<br />
