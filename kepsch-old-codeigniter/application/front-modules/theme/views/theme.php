
	<div class="home">
		<br>
		<table class="theme" border="1">

			
			<?php foreach ($themes as $row) : ?>
			<tr>
				<?php foreach ($row as $theme) : ?>
				<?php $c = ($theme == $active) ? 'active' : 'opac' ; ?>
				<td class="<?= $c ?>">
					<a href="<?php echo base_url(); ?>theme/set/<?= $theme ?>"><img  height="180" width="320" src="<?php echo base_url(); ?>img/theme/<?= $theme ?>.png"></a>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</table>

	</div>
	<br>
