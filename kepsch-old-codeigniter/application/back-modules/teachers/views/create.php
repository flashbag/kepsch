
		<br>
		<?php echo validation_errors(); ?>
		<?php echo form_open('admin/'.$this->router->class.'/create/verify'); ?>
 
		<table class="form">

			<tr>
				<td></td>
				<td>Додати викладача</td>
			</tr>

			<tr>
				<td class="right">
				<td>
					<input placeholder="Прізвище" type="text" name="surname" id="surname" maxlength="30" size="14" /> 
					<input placeholder="І.Пб." type="text" name="initials" id="initials" maxlength="4" size="4" /> 
				</td>
			</tr>

			<tr>
				<td class="right"><label for="name">ім'я:</label> 
				<td><input placeholder="Ім'я" type="text" name="name" id="name" maxlength="30" size="20" /> </td>
			</tr>

			<tr>
				<td class="right"><label for="name">ПБ:</label> 
				<td><input placeholder="По-батькові" type="text" name="second_name" id="second_name" maxlength="30" size="20" /> </td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" value="додати"/></td>
			</tr>

		</table>

		</form>

