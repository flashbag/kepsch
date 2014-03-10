<?php
/* @var $this SiteController */
?>

<div class="jumbotron">
	<h1>Ваш розклад у ваших руках.</h1>
	<p class="lead">
		Тепер ви створюєте свій розклад самі. 
	</p>
	<p>
		Про знайдені глюки та іншу єресь повідомляйте <a href="http://vk.com/kepsch?w=wall-25902243_253" target="_blank">сюди</a>.
	
		<div class="btn-group pull-right">
			<button type="button" class="btn btn-success btn-lg dropdown-toggle" data-toggle="dropdown">
			Створити щось нове <span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li><a href="<?php echo Yii::app()->controller->createUrl('/group/group/create'); ?>">Створити групу</a></li>
				<li><a href="<?php echo Yii::app()->controller->createUrl('/teacher/teacher/create'); ?>">Створити викладача</a></li>				
				<li><a href="<?php echo Yii::app()->controller->createUrl('/spec/spec/create'); ?>">Створити спеціальність</a></li>
				<li><a href="<?php echo Yii::app()->controller->createUrl('/aud/aud/create'); ?>">Створити аудиторію</a></li>
				<li><a href="<?php echo Yii::app()->controller->createUrl('/lesson/lesson/create'); ?>">Створити предмет</a></li>
				
			</ul>
		</div>

	<br>
	
</div>
