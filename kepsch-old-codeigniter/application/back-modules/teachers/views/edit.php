
		<?php echo validation_errors(); ?>
		<?php echo form_open('admin/'.$this->router->class.'/edit/verify'); ?>

		<input type="hidden" name="id" value="<?php echo $teacher['id']; ?>" id="id">
		<br>
		
		<table class="form">
			<tr><td colspan="2">Редагувати викладача <b><?php echo $teacher['surname'].' '.$teacher['initials']; ?></td></tr>


			<tr>
				<td class="right"><label for="name">ім'я:</label> 
				<td><input placeholder="Ім'я" value="<?php echo $teacher['name']; ?>" type="text" name="name" id="name" maxlength="30" size="20" /> </td>
			</tr>

			<tr>
				<td class="right"><label for="name">ПБ:</label> 
				<td><input placeholder="По-батькові" value="<?php echo $teacher['second_name']; ?>" type="text" name="second_name" id="second_name" maxlength="30" size="20" /> </td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="редагувати"/></td>
			</tr>
				
		</table>
		
	</form>
