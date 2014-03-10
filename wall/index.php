<?php
$users = json_decode(file_get_contents('users.json'), true); 
shuffle($users);
$array = array();

foreach ($users as $user) {
	if ($user['photo_200']) { $array[] = $user; }
}

$users = $array;

?>
<title>Дошка пошани</title>
<meta charset='utf-8'> 
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<style type="text/css">

body 	{ 
	width: 100%; 
	position: fixed; 
	overflow: hidden; 
} 
body, img, tr, td {
	margin: 0; 
	padding: 0;
}

img {
	border: 0px solid red;
	margin-bottom: -2px;
}

* {
	border-spacing: 0;
}

img:hover {
	opacity: 0.9
}
</style>

<?php 

$ids = array();

echo '<table><tr>';
foreach($users as $user) {

	if ($curr%8 == 0) { echo '<tr>'; }
	echo '<td id="'.$user['uid'].'"><a target="_blank" href="http://vk.com/id'.$user['uid'].'"><img width="100%" src="'.$user['photo_200'].'"></a>';	
	$ids[] = $user['uid'];
	$curr++;

	#if ($curr%8 == 0 && $curr == 40) { break; } 
}

?>

<script type="text/javascript">

<?php foreach ($ids as $key => $value) { $out[] = '"'.$value.'"'; } $outString = implode(',', $out); unset($out); ?>
var items = new Array(<?= $outString ?>);

$(window).load(function(){

	function doAjax() {

		var item1 = items[Math.floor(Math.random()*items.length)];
		var item2 = items[Math.floor(Math.random()*items.length)];
		var A = $("#" + item1);
		var B = $("#" + item2);

		A.show(5000).replaceWith(B.hide(5000).clone());
		B.hide(5000).replaceWith(A);	

		$.ajax({
            type: "POST",
            url: 'index.php',
            data:{
            	ok : 'ok'
            }, 
			complete: function() {
   				 setTimeout(doAjax,300); //now that the request is complete, do it again in 1 second
			}

		});
	}

	doAjax(); // initial call will start rigth away, every subsequent call will happen 1 second after we get a response

});

</script>

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