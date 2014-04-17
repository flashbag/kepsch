
		
		<br>
		<?php echo validation_errors(); ?>
		<?php echo form_open('admin/'.$this->router->class.'/delete/verify'); ?>

		<input type="hidden" name="id" value="<?php echo $aud['id']; ?>" id="id">
		<input type="hidden" name="name" value="<?php echo $aud['name']; ?>" id="id">
		
		<table class="form">
			<tr><td colspan="2"><nobr>Видалити аудиторію <b><?php echo $aud['name']; ?></b>?</nobr></td></tr>

			<tr>
				<td><input type="password" name="password" id="password" maxlength="10" size="20"/></td>
			</tr>
				
			<tr><td><input type="submit" value="видалити"/></td></tr>
		</table>
		<br />

		</form>
