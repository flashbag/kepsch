
		
		<br>
		<?php echo validation_errors(); ?>
		<?php echo form_open('admin/'.$this->router->class.'/delete/verify'); ?>

		<input type="hidden" name="id" value="<?php echo $teacher['id']; ?>" id="id">
		<input type="hidden" name="name" value="<?php echo $teacher['name']; ?>" id="id">
		
		<table class="form">
			<tr><td colspan="2"><nobr>Видалити викладача <b><?php echo $teacher['surname'].' '.$teacher['initials']; ?></b>?</nobr></td></tr>

			<tr>
				<td><input type="password" name="password" id="password" maxlength="10" size="20"/></td>
			</tr>
				
			<tr><td><input type="submit" value="видалити"/></td></tr>
		</table>
		<br />

		</form>
