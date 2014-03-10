<?php

$lessonsPerDay = 9;
$numbers = array('-');
for ($i=1; $i < $lessonsPerDay - 1 ; $i++) { 
	$numbers[$i] = $i;
}

$weeks = array('-',

	1234 => 'усі тижні',
	13 => '1,3 тижні',
	24 => '2,4 тижні',

	1 => '1 тиждень',
	2 => '2 тиждень',
	3 => '3 тиждень',
	4 => '4 тиждень',

	123 => '1,2,3 тижні',
	124 => '1,2,4 тижні',
	134 => '1,3,4 тижні',
	234 => '2,3,4 тижні'

);


return array(
	'pageTitle' => 'Розклад',
	'pagesize' => 10,
	'maxSchs'  => 20,
	'lessonsPerDay' => $lessonsPerDay,
	'numbers' => $numbers,
	'weeks' => $weeks,
	'weeksSelect' => array(1 => '1 тиждень', '2 тиждень', '3 тиждень', '4 тиждень'),
	'adminVkID' => '18136043',
	'adminEmail'=>'webmaster@example.com',
	'vkOauth' => 'http://oauth.vk.com/authorize?client_id=3685024&redirect_uri=http://kepsch.if.ua/vkoauth.php&display=page&scope=&response_type=code',
	'total' => 'Всього',
	'labels' => array(
		'created' => 'Створено',
		'updated' => 'Змінено',
	),
	'postActions' => array(
		'create' => 'створено',
		'update' => 'відредаговано',
		'delete' => 'видалено',
	),
	'dateFormat' => 'd MMMM yyyy о HH:mm:ss',
	'statuses' => array('Не активно','Активно'),
	'aud_types' => array('невідомо','лабораторна','комп\'ютерна','лекційна'),
	'days' => array(1=> 'Понеділок','Вівторок','Середа','Четвер','П\'ятниця'),
	'actions' => array(

		'create' => 'Додати',
		'view'	 => 'Переглянути',
		'update' => 'Редагувати',
		'delete' => 'Видалити',
		'cancel' => 'Скасувати',

 	),
 	'activity' => array(
 		'actions' => array(
 			'update-2' => 'відредагував',
 			'update-1' => 'відредагувала',
 			'create-2' => 'створив',
 			'create-1' => 'створила',
 		),
 		'modules' => array(
 			'aud' => 'аудиторію',
 			'group' => 'групу',
 			'lesson' => 'предмет',
 			'sch'	=> 'розклад групи',
 			'spec'	=> 'спеціальність',
 			'teacher'	=> 'викладача',
 		),
 		'modules_filter' => array( 		
 			'all'	=> 'Уся активність',
 			'sch'	=> 'Розклади',
 			'group' => 'Групи',
 			'spec'	=> 'Спеціальності',
 			'teacher' => 'Викладачі',
 			'lesson' => 'Предмети',
 			'aud' => 'Аудиторії', 			 			 	
 		),
 	),
 	'errors' => array(
 		'unauthorized'	=> 'Ви не можете виконати цю операцію',
 		'no_creator' => 'НЛО @ в момент Великого Вибуху',
 		'no_group' => 'Мені дуже шкодка, але такої групи не існує...Жизньболь.',
 		'no_teacher' => 'Мені дуже шкодка, але такого викладача не існує...Жизньболь.',
 		'no_lessons' => 'У цей день немає пар, або розклад не ще не заповнений повністю. Якщо знаєш пари - додай їх.',
 		'no_lessons_tch' => 'У цей день немає пар, або розклад не ще не заповнений повністю. Розклад викладача базується на розкладах груп.',
 	),
 	'messages' => array(
 		'not_edited_yet' => 'Ще не редагувався',
 		'sch_button' => 'Зберегти цей розклад як актуальний',
 		'goto_edit_mode' => 'Перейти в режим редагування',
 	),
 	'default' => array(
 		'sch' => '{"1":{"1":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"2":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"3":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"4":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"5":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"6":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"7":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"8":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"9":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}}},"2":{"1":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"2":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"3":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"4":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"5":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"6":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"7":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"8":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"9":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}}},"3":{"1":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"2":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"3":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"4":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"5":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"6":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"7":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"8":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"9":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}}},"4":{"1":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"2":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"3":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"4":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"5":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"6":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"7":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"8":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"9":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}}},"5":{"1":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"2":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"3":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"4":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"5":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"6":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"7":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"8":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}},"9":{"number":"0","lesson":"0","rows":{"1":{"week":"0","aud":"0","teacher":"0"},"2":{"week":"0","aud":"0","teacher":"0"},"3":{"week":"0","aud":"0","teacher":"0"}}}}}',
 	),
);
