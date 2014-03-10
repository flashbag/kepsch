<?php
/* @var $this SiteController */
/* @var $model LoginForm */
?>

		<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<?php echo Yii::app()->params['errors']['unauthorized'] ?>
		</div>


		<div class="jumbotron login-page">
  			<div class="container">
    			<h1>Вхід на сайт 
    				<span class="pull-right">
    					<a href="<?php echo Yii::app()->controller->createUrl('/site/login',array('force'=>'true')); ?>" class="btn btn-default btn-lg">
    						<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/vk-icon.png" width="30" height="30"> Увійти через VK
    					</a>
    				</span></h1>
    			<br>
    			<p>Для того щоб додавати та редагувати що небудь на сайті, вам потрібно ідентифікуватися. </p>
    			<p>
    				Стандартна рейстрація/авторизація вже в минулому.
    				Зараз усі ми присутні в такій чудовій соціальній мережі як VK.com. 
    				А це дозволяє усім розробникам використовувати можливості API VK у своїх розробках.
    				І скористатися такою чудовою можливістю як вхід через VK було б просто безглуздо.    				
    			</p>

    			<p>
    				Тому ви можете увійти і водночас зарейструватися всього одним кліком!
    			</p>

    			<p>
					А на рахунок безпеки: ніякі ваші конфіденційні дані не передаються, передається тільки загальна інформація.
    			</p>
    			<p class="pull-right"></p>
  			</div>
		</div>