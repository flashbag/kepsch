
	<div class="home">
		
		<?php if ($this->session->flashdata('info')) : ?>	
		<div  class="info"><?php echo $this->session->flashdata('info'); ?></div>
		<?php endif; ?>	
		<br>
		<table style=" width: 100%" class="center download" >

			<tr><td colspan="3">
				Ти можеш завантажити останню версію розкладу тут <a href="https://github.com/flashbag/kepsch" target="_blank">https://github.com/flashbag/kepsch</a>
			<?php if ($this->lib->logged() && $this->lib->admin()) : ?>
				<tr><td colspan="2" >
				<span class="link load"><a href="<?php echo base_url().$this->router->class.'/create'; ?>"><?php echo $this->config->item('add'); ?></a></span>
			<?php endif; ?>

			<?php foreach ($list as $e) : ?>
			<script type="text/javascript">
   				var count = "<?php echo $e['loaded'] ?>";   		
			</script>
			<?php $image = ($e['image'] == '') ? 'noimage.png' : $e['image'] ; ?>

			<tr>
				<td colspan="2" class="title"><?= $e['title'] ?>
			<tr>
				<td class="descr" rowspan="1" width="25%">
					
					<a href="<?php echo base_url().'uploads/download/'.$image; ?>" class="boxed img" >
          				<img src="<?php echo base_url().'uploads/download/'.$image; ?>" width="200" border="0">
          			</a>

          		<?= $e['description'] ?>

			<tr><td colspan="2" class="link">
					<?php if ($this->lib->logged() && $this->lib->admin()) : ?>
					<span class="btns">
					<a href="<?php echo base_url().$this->router->class.'/edit/'.$e['id']; ?>"><?php echo $this->config->item('edit'); ?></a>
					<a href="<?php echo base_url().$this->router->class.'/delete/'.$e['id']; ?>"><?php echo $this->config->item('delete'); ?></a>
					</span>
					<?php endif; ?>

					<!--
					<span class="load">
						<?php if ($e['file']): ?>
						<a id="link<?= $e['id'] ?>" onClick="javascript:changeText(<?= $e['id'] ?>,'<?= $e['filename'] ?>')" style="text-align:right" href="download/dothisfuckingdownload/<?= $e['id'] ?>">завантажити <?= $e['filename'] ?>
						(<span id="count<?= $e['id'] ?>"><script>document.write(count)</script></span>)</a>
						<?php else: ?>	
						архів ще не завантажений
						<?php endif; ?>
					-->
						
			
			<tr><td>&nbsp;
			<tr><td colspan="3"><hr>
			<tr><td>&nbsp;
			<?php endforeach; ?>

		</table>
	</div>
	<br>
