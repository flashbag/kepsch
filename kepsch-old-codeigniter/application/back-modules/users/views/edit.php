
		<?php echo validation_errors(); ?>
		<?php echo form_open('admin/users/edit/verify'); ?>

		<input type="hidden" name="id" value="<?php echo $user['id']; ?>" id="id">
		<input type="hidden" name="username" value="<?php echo $user['username']; ?>" id="id">
		<br>
		
			<table class="form">
				<tr><td colspan="2">Користувач <b><?php echo $user['username']; ?></td></tr>

				<?php if ($group) : ?>
				<tr>
					<td colspan="2">модерує групу <?= $group ?></td>
				</tr>
				<?php endif; ?>
 				<tr>					
					<td><?php echo form_dropdown('level', $types, $user['level']); ?></td>
				
					<td>
						<nobr>
							<?php echo form_dropdown('spec_id', $specs, 0); ?>
							<?php echo form_dropdown('year', $years, 0); ?>
							<?php echo form_dropdown('number', $nums, 0); ?>
						</nobr>
					</td>

				</tr>
				<tr><td><input type="submit" value="редагувати"/></td></tr>
			</table>
			<br />

	</form>
