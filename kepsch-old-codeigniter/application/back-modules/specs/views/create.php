

		<br>
		<?php echo validation_errors(); ?>
		<?php echo form_open('admin/specs/create/verify'); ?>
 
			<table class="form">

				<tr>
					<td></td>
					<td>Додати cпеціальність</td>
				</tr>

				<tr>
					<td class="right"><label for="code">код:</label> 
					<td><input type="text" name="code" id="code" maxlength="3" size="20" /> </td>
				</tr>

				<tr>
					<td class="right"><label for="name">назва:</label> </td>
					<td><input type="text" name="name" id="name" maxlenght="20" size="20"  /> </td>
				</tr>

				<tr>
					<td class="right"><label for="description">опис:</label> </td>
					<td><textarea name="description" cols="32" rows="4"></textarea></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="submit" value="додати"/></td>
				</tr>

			</table>

		</form>

