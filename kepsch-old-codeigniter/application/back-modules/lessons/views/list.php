	
	

	<table class="results"> 	
		<?php if ($this->session->flashdata('info')) : ?>
		<tr>
			<th colspan="6" class="info">
				<?php echo $this->session->flashdata('info'); ?>
			</th>
		</tr>
		<tr><td></td></tr>
		<?php endif; ?>
		<tr>
			<td><nobr>знайдено <?php echo $total; ?></nobr></td>
			<td></td>
			<td colspan=2 class="left">
				<form action="<?php echo $this->config->item('base').'/'.$this->config->item('admin').'/'.$this->router->class.'/search'; ?>" method="post">
					<input placeholder="пошук" style="float:right" type="text" name="filter" value="<?php if (isset($filter)) echo $filter; ?>"  />
				</form>			
			</td>	
		</tr>
		<?php if ($list) : ?>
		<tr>
			<th>назва</th>
			<th>повна назва</th>
			<th width="80" colspan=2>
				<a href="<?php echo $this->config->item('base').'/admin/'.$this->router->class.'/create/'; ?>"><?= $this->config->item('add') ?></a>
			</th>
		</tr>
		 
		<?php foreach ($list as $key): ?>
	 
		<tr>
			<td><?php echo $key['name']; ?></td>
			<td><?php if ($key['fullname']) { echo $key['fullname']; } else { echo $key['name']; } ?></td>


			<td width="40" align="left" >
				<a href="<?php echo $this->config->item('base').'/admin/'.$this->router->class.'/edit/'.$key['id']; ?>"><?= $this->config->item('edit') ?></a>
			</td>

			<td width="40" align="left" >
				<a href="<?php echo $this->config->item('base').'/admin/'.$this->router->class.'/delete/'.$key['id']; ?>"><?= $this->config->item('delete') ?></a>
			</td>
	 
		</tr>
		<?php endforeach; ?>
		<?php else: ?>
		<tr>
			<th colspan="6" class="info">
				<?php echo $this->config->item('nothing_found'); ?>
			</th>
		</tr>
		<?php endif; ?>

	</table>
	<br />
	<div class="pagination">
		<?php echo $pager; ?>
	</div>
