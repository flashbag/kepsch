

		<br>
		<?php echo validation_errors(); ?>
		
		<form action="<?= base_url() ?><?= $this->router->class ?>/<?= $this->router->method ?>/verify" method="POST" enctype="multipart/form-data" >
 
			<table class="form">

				<tr>
					<td>
					<td>Додати версію розкладу

				<tr>
					<td class="right"><label for="order">порядок:</label>
					<td><input type="number" name="order" id="order" maxlenght="20" size="30"  min="1" step="1"/>

				<tr>
					<td class="right"><label for="filename">ім'я файлу:</label> 
					<td><input type="text" name="filename" id="filename" maxlength="32" size="30" />

				<tr>
					<td class="right"><label for="title">заголовок:</label> 
					<td><input type="text" name="title" id="title" maxlength="100" size="30" />
	
				<tr>
					<td class="right"><label for="image">зображення:</label> 
					<td><input type="file" name="image" size="30" />

				<tr>
					<td class="right"><label for="image">архів:</label> 
					<td><input type="file" name="archive" size="30" />

				<tr>
					<td class="right"><label for="description">опис:</label>
					<td><textarea name="description" cols="50" rows="10"></textarea>


						

				<tr>
					<td><? $this->router->method ?>
					<td><input type="submit" value="<?= $this->config->item('add') ?>"/>

			</table>

		</form>


