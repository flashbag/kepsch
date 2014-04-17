
		<br>
		<?php echo validation_errors(); ?>
		<?php echo form_open('admin/'.$this->router->class.'/create/verify'); ?>
 
		<table class="form">

			<tr>
				<td></td>
				<td>Додати аудиторію</td>
			</tr>

			<tr>
				<td class="right">назва</td>
				<td>
					<input placeholder="назва" type="text" name="name" id="name" maxlength="30" size="14" /> 
				</td>
			</tr>

			<tr>
				<td class="right"><label for="type">тип</label> 
				<td><?php echo form_dropdown('type', $types, 0); ?></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" value="додати"/></td>
			</tr>

		</table>

		</form>

