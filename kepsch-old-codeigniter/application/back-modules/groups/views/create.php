
		<br>
		<?php echo validation_errors(); ?>
		<?php echo form_open('admin/'.$this->router->class.'/create/verify'); ?>
 
		<table class="form">

			<tr>
				<td>
				<td>Додати групу
			</tr>

			<tr>
				<td class="right">&nbsp;&nbsp;&nbsp;
				<td>
					<?php echo form_dropdown('spec', $specs, 0); ?>
					<?php echo form_dropdown('year', $years, 0); ?>
					<?php echo form_dropdown('number', $nums, 0); ?>
				
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" value="додати"/></td>
			</tr>

		</table>

		</form>

