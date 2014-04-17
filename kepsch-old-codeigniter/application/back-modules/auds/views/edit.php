
		<?php echo validation_errors(); ?>
		<?php echo form_open('admin/'.$this->router->class.'/edit/verify'); ?>

		<input type="hidden" name="id" value="<?php echo $aud['id']; ?>" id="id">
		<input type="hidden" name="name" value="<?php echo $aud['name']; ?>" id="id">
		<br>
		
		<table class="form">
			<tr><td colspan="2">Редагувати аудиторію <b><?php echo $aud['name']; ?></td></tr>


			<tr>
				<td class="right"><label for="type">тип</label> 
				<td><?php echo form_dropdown('type', $types, $aud['type']); ?></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="редагувати"/></td>
			</tr>
				
		</table>
		
	</form>
