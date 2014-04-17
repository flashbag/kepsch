
		<br>
		<?php echo validation_errors(); ?>
		<?php echo form_open('admin/'.$this->router->class.'/create/verify'); ?>
 
		<table class="form">

			<tr>
				<td></td>
				<td>Додати предмет</td>
			</tr>

			<tr>
				<td class="right"><label for="code">назва:</label> 
				<td><input type="text" name="name" id="name" maxlength="30" size="20" /> </td>
			</tr>

			<tr>
				<td class="right"><label for="description">повна:</label> </td>
				<td><textarea name="fullname" cols="32" rows="4"></textarea></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" value="додати"/></td>
			</tr>

		</table>

		</form>

