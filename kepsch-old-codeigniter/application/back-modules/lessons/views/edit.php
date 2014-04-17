
		<?php echo validation_errors(); ?>
		<?php echo form_open('admin/'.$this->router->class.'/edit/verify'); ?>

		<input type="hidden" name="id" value="<?php echo $lesson['id']; ?>" id="id">
		<br>
		
		<table class="form">
			<tr><td colspan="2">Редагувати предмет <b><?php echo $lesson['name']; ?></td></tr>

			<tr>
				<td class="right"><label for="code">назва:</label> 
				<td><input type="text" value="<?php echo $lesson['name']; ?>" name="name" id="name" maxlength="30" size="20" /> </td>
			</tr>

			<tr>
				<td class="right"><label for="description">повна:</label> </td>
				<td><textarea name="fullname" cols="32" rows="4"><?php echo $lesson['fullname'];  ?></textarea></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" value="редагувати"/></td>
			</tr>
				
		</table>
		
	</form>
