<div class="content">

	<div class="error"><?php echo validation_errors(); ?> </div>
	
		<?php echo form_open('login/verify'); ?>

			<table class="form">

				<tr> 
					<td> </td>
					<td class="left"><label>Авторизація</label></td>
				</tr>
				<tr>
					<td class="right"><label for="username">логін:</label></td>
					<td><input type="text" size="10" id="username" name="username"/> </td>
				</tr>
				<tr>
					<td class="right"><label for="password">пароль:</label></td>
					<td><input type="password" size="10" id="passowrd" name="password"/> </td>
				</tr>
				<tr>
					<td></td>
					<td align="left"><input type="submit" value="увійти"/></td>
				</tr>
			</table>

	</form>
	<br />

</div>