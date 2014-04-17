<html>
<head>
<title><?php echo $this->lib->title(); ?></title>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27781093-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter19745365 = new Ya.Metrika({id:19745365,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/19745365" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


<script type="text/javascript" language="JavaScript">
<!--
	function HideContent(d) {
		document.getElementById(d).style.display = "none";
	}

	function ShowContent(d) {
		document.getElementById(d).style.display = "table-row";
	}

	function ReverseDisplay(d) {
		if(document.getElementById(d).style.display == "none") { document.getElementById(d).style.display = "table-row"; }
			else { document.getElementById(d).style.display = "none"; }
	}
//-->
</script>

</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $theme = ($this->session->userdata('theme')) ? $this->session->userdata('theme') : 'black' ; ?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('css_path').'/css/'.$theme; ?>.css" />
<link href="<?php echo $this->config->item('css_path'); ?>favicon.ico" rel="shortcut icon" type="image/x-icon" />


<body>
	<div id="main">
		<div id="header">

			<h1><?php echo anchor($this->config->item('css_path'),'розклад'); ?></h1>

			<div id="right">

				<h3 style="margin-left:14.7%"> </h3>
				<h3><a href="http://vk.com/kepsch" target="_blank">вк</a></h3>
				
			</div>

		</div>

		<div id="panel">

			<span>
				<?php foreach ($this->config->item('panel_items') as $link => $name) : ?>				
					<?php $c = ($this->router->class == $link) ? ' class="this"' : '';  ?>

				<a href="<?php echo $this->config->item('base').'/admin/'.$link; ?>"<?= $c ?>><?= $name ?></a>
				
				<?php endforeach; ?>
			</span>

		</div>

		<div id="content">

		<?php echo $template['body']; ?>
			
		</div>

		<div class="clear"></div>

	</div>

	<div id="footer">		

		<a href="<?php echo $this->config->item('base').'/admin'?>">адміністрування</a>
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
