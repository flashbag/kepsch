
		<?php echo validation_errors(); ?>
		<?php echo form_open('admin/'.$this->router->class.'/edit/verify'); ?>

		<input type="hidden" name="id" value="<?php echo $spec['id']; ?>" id="id">
		<br>
		
		<table class="form">
			<tr><td colspan="2">Редагувати спеціальність <b><?php echo $spec['code']; ?></td></tr>
			<tr>
				<td class="right"><label for="name">назва:</label> </td>
				<td><input type="text" value="<?php echo $spec['name']; ?>" name="name" id="name" maxlenght="20" size="20"  /> </td>
			</tr>

			<tr>
				<td class="right"><label for="description">опис:</label> </td>
				<td><textarea name="description" cols="32" rows="4"><?php echo $spec['description']; ?></textarea></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" value="редагувати"/></td>
			</tr>
				
		</table>
		
	</form>
