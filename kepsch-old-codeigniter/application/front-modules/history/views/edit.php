
		<?php echo validation_errors(); ?>
		
		<form action="<?= base_url() ?><?= $this->router->class ?>/<?= $this->router->method ?>/verify" method="POST" enctype="multipart/form-data" >

		<input type="hidden" name="id" value="<?php echo $item['id']; ?>" id="id">
		<br>

			<table class="form">
				
				<tr>
					<td>
					<td>Редагувати версію розкладу

				<tr>
					<td class="right"><label for="order">порядок:</label>
					<td><input type="number" name="order" id="order" maxlenght="20" size="30"  min="1" value="<?php echo $item['orderr']; ?>"/>

				<tr>
					<td class="right"><label for="title">заголовок:</label> 
					<td><input type="text" name="title" id="title" maxlength="100" size="30" value="<?php echo $item['title']; ?>"/>

				<tr>
					<td class="right"><label for="filename">ім'я файлу:</label> 
					<td><input type="text" name="filename" id="filename" maxlength="32" size="30" value="<?php echo $item['filename']; ?>" />

				<tr>
					<td class="right"><label for="image">зображення:</label> 
					<td><input type="file" name="image" size="30" />
				<tr><td>
					<td><?php if ($item['image']) { echo 'зображення присутнє'; } else { echo 'немає зображення'; } ?>

				<tr>
					<td class="right"><label for="file">архів:</label> 
					<td><input type="file" name="file" size="30" />
				<tr><td>
					<td><?php if ($item['file']) { echo 'архів присутній'; } else { echo 'немає завантаженого архіву'; } ?>

				<tr>
					<td class="right"><label for="description">опис:</label>
					<td><textarea name="description" cols="50" rows="10"><?php echo $item['description']; ?></textarea>

				

				<tr>
					<td>
					<td><input type="submit" value="<?= $this->config->item($this->router->method) ?>"/>

			</table>

		
	</form>
