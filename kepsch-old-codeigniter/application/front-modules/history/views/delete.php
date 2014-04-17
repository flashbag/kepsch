
		
		<br>
		<?php echo validation_errors(); ?>
		<?php echo form_open($this->router->class.'/delete/verify'); ?>

		<input type="hidden" name="id" value="<?php echo $item['id']; ?>" id="id">

		
			<table class="form">
				<tr><td colspan="2">Видалити версію <br><b><?php echo $item['title']; ?></b>?</td></tr>

				<tr>
					<td><input type="password" name="password" id="password" maxlength="10" size="20"/></td>
				</tr>
				
				<tr><td><input type="submit" value="видалити"/></td></tr>
			</table>
			<br />

		</form>
