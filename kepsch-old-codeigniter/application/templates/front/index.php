<html>
<head>
<title><?php echo $this->lib->title(); ?></title>
<script type='text/javascript' src='<?php echo base_url() ?>js/ga.js'></script>
<script type='text/javascript' src='<?php echo base_url() ?>js/metrika.js'></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/mootools-1.2-core-nc.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/SqueezeBox.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
window.addEvent('domready', function() {
	/**
	 * That CSS selector will find all <a> elements with the
	 * class boxed
	 *
	 * The example loads the options from the rel attribute
	 */
	SqueezeBox.assign($$('a.boxed'), {
		parse: 'rel'
	});
});
/* ]]> */

function changeText(idElement, filename) {

	var element = document.getElementById('link' + idElement);
    var count = document.getElementById('count' + idElement).innerText;
    
    count++;
 
	element.innerHTML = 'завантажити ' + filename  + ' (' + count + ')';
    
}
</script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $theme = (isset($_COOKIE['theme'])) ? $_COOKIE['theme'] : 'black' ; ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/'.$theme; ?>.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/SqueezeBox.css">
</head>
<body>

	<div id="main">

		<div id="header">

			<h1><?php echo anchor('','розклад'); ?></h1>

			<div id="right">

				<?php  
				$needle = $this->uri->segment(1);

				if ($needle == 'group' || $needle == 'teacher') : 

					$id = $this->uri->segment(2);
				
					for ($w=1; $w<=4; $w++) :
						if ($week == $w) { $c = ' class ="week"'; } else { $c = ''; } ?>
						<h3><?php echo anchor($needle.'/'.$id.'/'.$w,$w,$c); ?> </h3>
						<?php 
					endfor;
					?>
					<h3> </h3>
					<h3><a href="http://vk.com/kepsch" target="_blank">вк</a></h3>
					<?php

				else: ?>
					<h3 style="margin-left:14.7%"> </h3>
					<h3><a href="http://vk.com/kepsch" target="_blank">вк</a></h3>
				<?php
				endif;  
				?>
				

				

			</div>

		</div>

		<div id="nav">

			<span>

				<?php if ($needle != '') :  ?>
				<?php

				switch ($this->uri->segment(1)) { 

					case 'group':		echo anchor('groups','групи');			break; 
					case 'teacher':		echo anchor('teachers','викладачі'); 	break; 

					case 'admin':		echo 'адміністрування';					break;

					case 'groups':		echo 'групи';							break;
					case 'teachers':	echo 'викладачі';						break; 

					

					case 'theme':		echo 'змінити тему';					break; 
					#case 'download':	echo 'завантажити';						break; 
					

 					default: $nothing = true; break; 
 				}  
				
				if (strlen($this->uri->segment(2))>0 && $this->uri->segment(2) != 'verify' && $this->uri->segment(1) != 'download') { echo $this->config->item('nav_delitmer'); } 
				if (isset($name) && $name != '') { echo $name; }

				?>
				<?php else: ?>
					
				<?php endif; ?>

			</span>

		</div>

		<div id="content">

		<?php echo $template['body']; ?>
			
		</div>

		<div class="clear"></div>

	</div>

	<div id="footer">		

		<a href="<?php echo $this->config->item('base').'/admin'?>">адміністрування</a>
		<a href="<?php echo $this->config->item('base').'/groups'?>">групи</a>
		<a href="<?php echo $this->config->item('base').'/teachers'?>">викладачі</a>
		<a href="<?php echo $this->config->item('base').'/theme'?>">змінити тему</a>

		<a href="<?php echo $this->config->item('base').'/download'?>">історія</a>
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
</body>
</html>
