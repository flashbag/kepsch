<pre>
<?php

header('Content-Type: text/html; charset=utf-8');

$appid = '3685024';
$code = $_GET['code'];
$secret = 'WETngl0p14cJ9IuHbCQY';
$url = 'http://kepsch.if.ua/wall/updating.php';

$response = file_get_contents('https://oauth.vk.com/access_token?client_id='.$appid.'&redirect_uri='.$url.'&code='.$code.'&client_secret='.$secret);
$data = json_decode($response, true);


if ($data['access_token']) {

	$uid = $data['user_id'];
	$access_token = $data['access_token'];
	
	$request = 'https://api.vk.com/method/users.get?uids='.$uid.'&fields=photo_50,sex,bdate&access_token='.$access_token;
	$response = json_decode(file_get_contents($request),true);
	$user_info = $response['response'][0];

	$request = 'https://api.vk.com/method/groups.getMembers?gid=kepsch&sort=id_asc&offset=0&access_token='.$access_token;
	$response = json_decode(file_get_contents($request),true);
	$uids = $response['response']['users'];
	
	$request = 'https://api.vk.com/method/users.get?uids='.implode(',', $uids).'&fields=photo_200&access_token='.$access_token;
	$users = json_decode(file_get_contents($request),true);
	$users = $users['response'];
	
	if (file_put_contents("users.json",json_encode($users))) echo '<h2>updated</h2>';

}

?>
