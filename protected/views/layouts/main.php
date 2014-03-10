<!DOCTYPE html>
<html lang="uk">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
        <meta name='yandex-verification' content='6e5bba87b105f43a' />
	<meta name="author" content="">
	<link rel="shortcut icon" href="/favicon.ico">

	<title><?php echo CHtml::encode(Yii::app()->params['pageTitle']); ?></title>
	<!-- Bootstrap core CSS -->
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-theme.css" rel="stylesheet" media="screen">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/sticky-footer.css" rel="stylesheet" media="screen">

	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/flexisel.css" rel="stylesheet" media="screen">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" rel="stylesheet" media="screen">

</head>

<body>

	<div id="wrap">
		<div class="container">

			<!-- Static navbar -->
			<div class="navbar navbar-inverse">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">Розклад <sup>beta</sup></a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li <?php if (isset($this->module->id) && (($this->module->id == 'group') || ($this->module->id == 'sch' && Yii::app()->controller->action->id == 'group'))) echo ' class="active"'; ?>><a href="<?php echo Yii::app()->controller->createUrl('/group'); ?>" >Групи</a></li>
						<li <?php if (isset($this->module->id) && (($this->module->id == 'teacher') || ($this->module->id == 'sch' && Yii::app()->controller->action->id == 'teacher'))) echo ' class="active"'; ?>><a href="<?php echo Yii::app()->controller->createUrl('/teacher'); ?>" >Викладачі</a></li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Інше <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo Yii::app()->controller->createUrl('/spec'); ?>"   <?php if (isset($this->module->id) && $this->module->id == 'spec') echo ' class="active"'; ?>>Спеціальності</a></li>
								<li><a href="<?php echo Yii::app()->controller->createUrl('/aud'); ?>" 	  <?php if (isset($this->module->id) && $this->module->id == 'aud') echo ' class="active"'; ?>>Аудиторії</a></li>
								<li><a href="<?php echo Yii::app()->controller->createUrl('/lesson'); ?>" <?php if (isset($this->module->id) && $this->module->id == 'lesson') echo ' class="active"'; ?>>Предмети</a></li>
							</ul>
						</li>
						<li <?php if (isset($this->module->id) && $this->module->id == 'activity') echo ' class="active"'; ?>><a href="<?php echo Yii::app()->controller->createUrl('/activity'); ?>" >Активність</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php if (isset($this->module->id) && $this->module->id == 'sch' && (Yii::app()->controller->action->id == 'group' || Yii::app()->controller->action->id == 'teacher')): ?>
							<?php $week = (isset($_GET['week'])) ? Yii::app()->sch->getWeek($_GET['week']) : Yii::app()->sch->getWeek(); ?>
							<?php  $uri = $_SERVER['REQUEST_URI']; if (isset($_GET['week'])) { $u = explode('/', $uri); unset($u[count($u)-1]); $uri = implode('/', $u); } ?>
							<li class="dropdown">
							<a href="<?=$uri?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo Yii::app()->params['weeksSelect'][$week] ?><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<?php foreach (Yii::app()->params['weeksSelect'] as $wid => $w): ?>
									<li><a href="<?php echo $uri.'/'.$wid; ?>" class="<?php if ($wid == $week) echo 'active ';  if ($w == Yii::app()->sch->getWeek()) echo 'today-week'; ?>"><?=$w?></a></li>
								<?php endforeach; ?>
							</ul>
						</li>
						<?php endif; ?>


				
						<?php if (Yii::app()->user->isGuest): ?>
						<li><a href='<?php echo Yii::app()->controller->createUrl('/site/login',array('force'=>'true')); ?>'>Увійти</a></li>
						<?php else: ?>
						<li><a href="<?php echo Yii::app()->controller->createUrl('/site/logout'); ?>"><?= Yii::app()->user->full_name ?> (вийти)</a></li>
						<!--
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="index.html#" id="themes">Олег Кукіль <span class="caret"></span></a>
							<ul class="dropdown-menu" aria-labelledby="themes">
								<li><a tabindex="-1" href="#">Профіль</a></li>
								<li><a tabindex="-1" href="#">Налаштування</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="#">Вийти</a></li>
							</ul>
						</li>
						-->
						<?php endif; ?>

					</ul>
				</div><!--/.nav-collapse -->
			</div>

		<?php echo $content; ?>

		</div> <!-- /container -->
	</div>

	<div id="footer">
		<div class="container">
			<p class="text-muted credit">
				
				<a target="_blank" href="http://vk.com/kepsch">Розклад пар КЕПу</a> - 2011-<?=date('Y')?><br>
				розробка <a target="_blank" href="http://vk.com/flashbag">flashbag</a>
				
			</p>
		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="//code.jquery.com/jquery.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>

	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.flexisel.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ga.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/metrika.js"></script>


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

</body>
</html>