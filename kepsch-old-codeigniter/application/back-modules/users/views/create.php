

		<br>
		<?php echo validation_errors(); ?>
		<?php echo form_open('admin/users/create/verify'); ?>
 
			<table class="form">

				<tr>
					<td></td>
					<td>Додати користувача</td>
				</tr>
				<tr>
					<td class="right"><label for="username">логін:</label></td>
					<td><input type="text" name="username"  id="username" value="<?php echo set_value('username'); ?>" maxlength="10" size="20" /> </td>
				</tr>

				<tr>
					<td class="right"><label for="password">пароль:</label> </td>
					<td><input type="text" name="password" id="password" value="<?php echo set_value('password'); ?>" maxlenght="20" size="20"  /></td>
				</tr>
	
				<tr>
					<td></td>
					<td class="left"><?php echo form_dropdown('level', $types, 1); ?></td>
				</tr>

				
				<tr>
					<td></td>
					<td>
							<?php echo form_dropdown('spec_id', $specs, 0); ?>
							<?php echo form_dropdown('year', $years, 0); ?>
							<?php echo form_dropdown('number', $nums, 0); ?>
					</td>
				</tr>
				

				<tr>
					<td></td>
					<td><input type="submit" value="додати"/></td>
				</tr>

			</table>

		</form>

