<?php


$request = 'https://oauth.vk.com/access_token?client_id=3685024&redirect_uri=http://'.$_SERVER['SERVER_NAME'].'/token.php&code='.$_GET['code'].'&client_secret=WETngl0p14cJ9IuHbCQY';
$response = json_decode(file_get_contents($request), true);

if ($response['access_token']) {
	
	$request = 'https://api.vk.com/method/users.get?uids='.$response['user_id'].'&fields=photo_50,photo_100,photo_200,sex,bdate,nickname&access_token='.$response['access_token'];
	$response = json_decode(file_get_contents($request),true);

	$user = $response['response'][0];

	$bdate = explode('.', $user['bdate']);

	$User = array(
			'vkid' 			=> $user['uid'],
			'sex' 			=> $user['sex'],
			'first_name' 	=> $user['first_name'],
			'last_name' 	=> $user['last_name'],
			'birth_day'		=> $bdate[0],
			'birth_month'	=> $bdate[1],
			'birth_year'	=> $bdate[2],
			'photo_50' 		=> $user['photo_50'],
			'photo_100' 	=> $user['photo_100'],
			'photo_200' 	=> $user['photo_200'],
			'username' 		=> empty($user['nickname']) ? $user['uid'] : $user['nickname'],
		);
}

?>

<body onload="document.getElementById('user').submit()">

<form enctype="multipart/form-data" action="./index.php?r=site/identify" id="user" method="post" style="display: none;">
	<input type="hidden" name="action" value="homePage" />
	<?php foreach ($User as $name => $value) : ?>
		<input type="hidden" name="user[<?=$name?>]" value="<?=$value?>" />
	<?php endforeach; ?>
</form>
