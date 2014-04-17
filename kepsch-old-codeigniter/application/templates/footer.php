	<div id="footer">		

		<a href="<?php echo $this->config->item('base').'/admin'?>">адміністрування</a>
		<a href="<?php echo $this->config->item('base').'/theme'?>">змінити тему</a>
		<!--<a href="<?php echo $this->config->item('base').'/download'?>">завантажити</a>		-->
		<?php if ($this->session->userdata('user_id')) : ?>

		<a href="<?php echo $this->config->item('base').'/logout'?>">вийти [<?php echo $this->session->userdata('username'); ?>]</a>			
		<?php else: ?>
		
		<a href="<?php echo $this->config->item('base').'/login'?>">увійти</a>			
		<?php endif; ?>
		
		<?php if ($theme == 'pink') : ?>
		<br>
		<br><a>рожева тема для іри яцук</a>
		<?php endif; ?>
		<div id="copyright">
			(c) <a href="http://flashbag.if.ua/" target="_blank">flashbag.if.ua</a>
		</div>
	</div>