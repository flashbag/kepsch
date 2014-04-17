
		
		<br>
		<?php echo validation_errors(); ?>
		<?php echo form_open('admin/users/delete/verify'); ?>

		<input type="hidden" name="id" value="<?php echo $user['id']; ?>" id="id">
		<input type="hidden" name="username" value="<?php echo $user['username']; ?>" id="id">
		
		
			<table class="form">
				<tr><td colspan="2">Користувач <b><?php echo $user['username']; ?></td></tr>

				<?php if ($group) : ?>
				<tr>
					<td colspan="2"><nobr>модерує групу <?= $group ?></nobr></td>
				</tr>
				<?php endif; ?>

				<tr>
					<td><input type="password" name="password" id="password" maxlength="10" size="20"/></td>
				</tr>
				
				<tr><td><input type="submit" value="видалити"/></td></tr>
			</table>
			<br />

		</form>
