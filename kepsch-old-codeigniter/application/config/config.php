<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
 * Pagination
 */
$config['per_page'] = 10;
$config['num_links'] = 4;
$config['first_link'] = '&lsaquo;&lsaquo;';
$config['last_link'] = '&rsaquo;&rsaquo;';
$config['next_link'] = '&rsaquo;';
$config['prev_link'] = '&lsaquo;';


$config['pars'] = 7;

$config['nothing_found'] = 'вибач, але нічого не знайдено.';

$config['has_been_edited'] = 'Розклад відредаговано!';

$config['admin'] = 'admin';

$config['super'] = '3e85e6c7fc69e5292af7ac82c36a1e05';

$config['bad_super'] = 'Неправильний супер пароль!';

$config['select_group'] = 'вибрати групу';
$config['select_teacher'] = 'вибрати викладача';

$config['error'] = 'помилка';

$config['unknown_group'] = 'невідома';
$config['unknown_teacher'] = 'невідомий';

$config['add'] = 'додати';
$config['edit'] = 'редагувати';
$config['delete'] = 'видалити';


$config['nav_delitmer'] = '&nbsp;&raquo;&nbsp;';  

$config['sorry'] = 'сорі майкл, це бізнес.';

$config['nothing'] = 'немає пар або розклад не заповнений';
$config['nothing_group'] = 'такої групи не існує <br> або її розклад ще цнотливий. <br>'.$config['sorry'];
$config['nothing_teacher'] = 'такого викладача не існує <br> або його розклад ще цнотливий. <br>'.$config['sorry'];

$config['you_cant'] = 'Ти не можеж виконати цю операцію.';
$config['you_cant_edit'] = 'Вибач, але ти не можеж редагувати розклад.';

$config['days'] = array(1 => 'Понеділок', 'Вівторок', 'Середа', 'Четвер', 'П\'ятниця');

$config['panel_items'] = array(

		'users' 	=> 'користувачі ',
		'specs' 	=> 'спеціальності',
		'lessons' 	=> 'предмети',
		'teachers' 	=> 'викладачі',
		'auds' 		=> 'аудиторії',
		'groups' 	=> 'групи',

		); 

$config['users_types'] = array( 'адміністратор', 'модератор' , 'гість' );
$config['auds_types'] = array('невідомо','лекційна','лабораторна','комп\'ютерна');

$config['week'] = array(0 => ' - ', 1234 => 'усі тижні', 13 => '1,3 тижні', 24 => '2,4 тижні', 1 => '1 тиждень', 2=> '2 тиждень', 3 => '3 тиждень', 4 => '4 тиждень', 234 => '2,3,4 тижні', 134 => '1,3,4 тижні', 124 => '1,2,4 тижні', 123 => '1,2,3 тижні');
$config['number'] = array('-','1','2','3','4','5','6','7','8');
$config['status'] = array('розробляється', 'готовий');

$config['group_exist'] ='Така група вже існує!';


$config['o_aud'] = 'Аудиторію';
$config['o_user'] = 'Користувача';
$config['o_spec'] = 'Спеціальність';
$config['o_group'] = 'Групу';
$config['o_lesson'] = 'Предмет';
$config['o_teacher'] = 'Викладача';


$config['created_info'] = 'Створено!';
$config['deleted_info'] = 'Видалено!';
$config['edited_info'] = 'Відредаговано!';


$config['created'] = 'створено';
$config['deleted'] = 'видалено';
$config['edited'] = 'відредаговано';

$config['created_aud'] = $config['o_aud'].' "%s" '.$config['created'].'!';
$config['deleted_aud'] = $config['o_aud'].' "%s" '.$config['deleted'].'!';
$config['updated_aud'] = $config['o_aud'].' "%s" '.$config['edited'].'!';

$config['created_user'] = $config['o_user'].' "%s" '.$config['created'].'!';
$config['deleted_user'] = $config['o_user'].' "%s" '.$config['deleted'].'!';
$config['updated_user'] = $config['o_user'].' "%s" '.$config['edited'].'!';

$config['created_spec'] = $config['o_spec'].' "%s" '.$config['created'].'!';
$config['deleted_spec'] = $config['o_spec'].' "%s" '.$config['deleted'].'!';
$config['updated_spec'] = $config['o_spec'].' "%s" '.$config['edited'].'';

$config['created_group'] = $config['o_group'].' "%s" '.$config['created'].'!';
$config['deleted_group'] = $config['o_group'].' "%s" '.$config['deleted'].'!';

$config['created_lesson'] = $config['o_lesson'].' "%s" '.$config['created'].'!';
$config['deleted_lesson'] = $config['o_lesson'].' "%s" '.$config['deleted'].'!';
$config['updated_lesson'] = $config['o_lesson'].' "%s" '.$config['edited'].'!';

$config['created_teacher'] = $config['o_teacher'].' "%s"'.$config['created'].'!';
$config['deleted_teacher'] = $config['o_teacher'].' "%s" '.$config['deleted'].'!';
$config['updated_teacher'] = $config['o_teacher'].' "%s" '.$config['edited'].'!';




if (date('m')<7) { $d=-1; } else { $d=0; } 
for ($i=1; $i<=5; $i++) {  $n=(strlen($i)==1)?'0'.$i:$i; $nums[$i] = $n; }
for ($y=date('y')-3+$d; $y<=date('y')+$d; $y++) { $yy=(strlen($y)==1)?'0'.$y:$y; $years[$y] = $yy; } 

krsort($years); 


$config['nums'] = $nums;
$config['years'] = $years;


$config['numbers'] = array(0 => '-', 1 => '1','2','3','4','5','6','7','8');
// DON'T TOUCH CONFIG BELOW

/*
|--------------------------------------------------------------------------
| URI PROTOCOL
|--------------------------------------------------------------------------
|
| This item determines which server global should be used to retrieve the
| URI string.  The default setting of 'AUTO' works for most servers.
| If your links do not seem to work, try one of the other delicious flavors:
|
| 'AUTO'			Default - auto detects
| 'PATH_INFO'		Uses the PATH_INFO
| 'QUERY_STRING'	Uses the QUERY_STRING
| 'REQUEST_URI'		Uses the REQUEST_URI
| 'ORIG_PATH_INFO'	Uses the ORIG_PATH_INFO
|
*/

$config['index_page'] = '';
$config['base_url']	= 'http://localhost/kepsch';
$config['uri_protocol']	= 'AUTO';
$config['base'] = $config['base_url'];
$config['css_path'] = $config['base_url'];
/*
|--------------------------------------------------------------------------
| URL suffix
|--------------------------------------------------------------------------
|
| This option allows you to add a suffix to all URLs generated by CodeIgniter.
| For more information please see the user guide:
|
| http://codeigniter.com/user_guide/general/urls.html
*/

$config['url_suffix'] = '';



/*
|--------------------------------------------------------------------------
| Default Language
|--------------------------------------------------------------------------
|
| This determines which set of language files should be used. Make sure
| there is an available translation if you intend to use something other
| than english.
|
*/
$config['language']	= 'english';

/*
|--------------------------------------------------------------------------
| Default Character Set
|--------------------------------------------------------------------------
|
| This determines which character set is used by default in various methods
| that require a character set to be provided.
|
*/
$config['charset'] = 'UTF-8';

/*
|--------------------------------------------------------------------------
| Enable/Disable System Hooks
|--------------------------------------------------------------------------
|
| If you would like to use the 'hooks' feature you must enable it by
| setting this variable to TRUE (boolean).  See the user guide for details.
|
*/
$config['enable_hooks'] = FALSE;


/*
|--------------------------------------------------------------------------
| Class Extension Prefix
|--------------------------------------------------------------------------
|
| This item allows you to set the filename/classname prefix when extending
| native libraries.  For more information please see the user guide:
|
| http://codeigniter.com/user_guide/general/core_classes.html
| http://codeigniter.com/user_guide/general/creating_libraries.html
|
*/
$config['subclass_prefix'] = 'MY_';


/*
|--------------------------------------------------------------------------
| Allowed URL Characters
|--------------------------------------------------------------------------
|
| This lets you specify with a regular expression which characters are permitted
| within your URLs.  When someone tries to submit a URL with disallowed
| characters they will get a warning message.
|
| As a security measure you are STRONGLY encouraged to restrict URLs to
| as few characters as possible.  By default only these are allowed: a-z 0-9~%.:_-
|
| Leave blank to allow all characters -- but only if you are insane.
|
| DO NOT CHANGE THIS UNLESS YOU FULLY UNDERSTAND THE REPERCUSSIONS!!
|
*/
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';


/*
|--------------------------------------------------------------------------
| Enable Query Strings
|--------------------------------------------------------------------------
|
| By default CodeIgniter uses search-engine friendly segment based URLs:
| example.com/who/what/where/
|
| By default CodeIgniter enables access to the $_GET array.  If for some
| reason you would like to disable it, set 'allow_get_array' to FALSE.
|
| You can optionally enable standard query string based URLs:
| example.com?who=me&what=something&where=here
|
| Options are: TRUE or FALSE (boolean)
|
| The other items let you set the query string 'words' that will
| invoke your controllers and its functions:
| example.com/index.php?c=controller&m=function
|
| Please note that some of the helpers won't work as expected when
| this feature is enabled, since CodeIgniter is designed primarily to
| use segment based URLs.
|
*/
$config['allow_get_array']		= TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger']	= 'c';
$config['function_trigger']		= 'm';
$config['directory_trigger']	= 'd'; // experimental not currently in use

/*
|--------------------------------------------------------------------------
| Error Logging Threshold
|--------------------------------------------------------------------------
|
| If you have enabled error logging, you can set an error threshold to
| determine what gets logged. Threshold options are:
| You can enable error logging by setting a threshold over zero. The
| threshold determines what gets logged. Threshold options are:
|
|	0 = Disables logging, Error logging TURNED OFF
|	1 = Error Messages (including PHP errors)
|	2 = Debug Messages
|	3 = Informational Messages
|	4 = All Messages
|
| For a live site you'll usually only enable Errors (1) to be logged otherwise
| your log files will fill up very fast.
|
*/
$config['log_threshold'] = 0;

/*
|--------------------------------------------------------------------------
| Error Logging Directory Path
|--------------------------------------------------------------------------
|
| Leave this BLANK unless you would like to set something other than the default
| application/logs/ folder. Use a full server path with trailing slash.
|
*/
$config['log_path'] = '';

/*
|--------------------------------------------------------------------------
| Date Format for Logs
|--------------------------------------------------------------------------
|
| Each item that is logged has an associated date. You can use PHP date
| codes to set your own date formatting
|
*/
$config['log_date_format'] = 'Y-m-d H:i:s';

/*
|--------------------------------------------------------------------------
| Cache Directory Path
|--------------------------------------------------------------------------
|
| Leave this BLANK unless you would like to set something other than the default
| system/cache/ folder.  Use a full server path with trailing slash.
|
*/
$config['cache_path'] = '';

/*
|--------------------------------------------------------------------------
| Encryption Key
|--------------------------------------------------------------------------
|
| If you use the Encryption class or the Session class you
| MUST set an encryption key.  See the user guide for info.
|
*/
$config['encryption_key'] = '1Dm6w9kH0a441L1rx3T7NT0s48PoMlGn';

/*
|--------------------------------------------------------------------------
| Session Variables
|--------------------------------------------------------------------------
|
| 'sess_cookie_name'		= the name you want for the cookie
| 'sess_expiration'			= the number of SECONDS you want the session to last.
|   by default sessions last 7200 seconds (two hours).  Set to zero for no expiration.
| 'sess_expire_on_close'	= Whether to cause the session to expire automatically
|   when the browser window is closed
| 'sess_encrypt_cookie'		= Whether to encrypt the cookie
| 'sess_use_database'		= Whether to save the session data to a database
| 'sess_table_name'			= The name of the session database table
| 'sess_match_ip'			= Whether to match the user's IP address when reading the session data
| 'sess_match_useragent'	= Whether to match the User Agent when reading the session data
| 'sess_time_to_update'		= how many seconds between CI refreshing Session Information
|
*/
$config['sess_cookie_name']		= 'slicing_session';
$config['sess_expiration']		= 7200*10000;
$config['sess_expire_on_close']         = FALSE;
$config['sess_encrypt_cookie']          = TRUE;
$config['sess_use_database']            = FALSE;
$config['sess_table_name']		= 'slicing_sessions';
$config['sess_match_ip']		= FALSE;
$config['sess_match_useragent']         = TRUE;
$config['sess_time_to_update']          = 300;

/*
|--------------------------------------------------------------------------
| Cookie Related Variables
|--------------------------------------------------------------------------
|
| 'cookie_prefix' = Set a prefix if you need to avoid collisions
| 'cookie_domain' = Set to .your-domain.com for site-wide cookies
| 'cookie_path'   =  Typically will be a forward slash
| 'cookie_secure' =  Cookies will only be set if a secure HTTPS connection exists.
|
*/
$config['cookie_prefix']	= "";
$config['cookie_domain']	= "";
$config['cookie_path']		= "/";
$config['cookie_secure']	= FALSE;

/*
|--------------------------------------------------------------------------
| Global XSS Filtering
|--------------------------------------------------------------------------
|
| Determines whether the XSS filter is always active when GET, POST or
| COOKIE data is encountered
|
*/
$config['global_xss_filtering'] = FALSE;

/*
|--------------------------------------------------------------------------
| Cross Site Request Forgery
|--------------------------------------------------------------------------
| Enables a CSRF cookie token to be set. When set to TRUE, token will be
| checked on a submitted form. If you are accepting user data, it is strongly
| recommended CSRF protection be enabled.
|
| 'csrf_token_name' = The token name
| 'csrf_cookie_name' = The cookie name
| 'csrf_expire' = The number in seconds the token should expire.
*/
$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;

/*
|--------------------------------------------------------------------------
| Output Compression
|--------------------------------------------------------------------------
|
| Enables Gzip output compression for faster page loads.  When enabled,
| the output class will test whether your server supports Gzip.
| Even if it does, however, not all browsers support compression
| so enable only if you are reasonably sure your visitors can handle it.
|
| VERY IMPORTANT:  If you are getting a blank page when compression is enabled it
| means you are prematurely outputting something to your browser. It could
| even be a line of whitespace at the end of one of your scripts.  For
| compression to work, nothing can be sent before the output buffer is called
| by the output class.  Do not 'echo' any values with compression enabled.
|
*/
$config['compress_output'] = FALSE;

/*
|--------------------------------------------------------------------------
| Master Time Reference
|--------------------------------------------------------------------------
|
| Options are 'local' or 'gmt'.  This pref tells the system whether to use
| your server's local time as the master 'now' reference, or convert it to
| GMT.  See the 'date helper' page of the user guide for information
| regarding date handling.
|
*/
$config['time_reference'] = 'local';


/*
|--------------------------------------------------------------------------
| Rewrite PHP Short Tags
|--------------------------------------------------------------------------
|
| If your PHP installation does not have short tag support enabled CI
| can rewrite the tags on-the-fly, enabling you to utilize that syntax
| in your view files.  Options are TRUE or FALSE (boolean)
|
*/
$config['rewrite_short_tags'] = FALSE;


/*
|--------------------------------------------------------------------------
| Reverse Proxy IPs
|--------------------------------------------------------------------------
|
| If your server is behind a reverse proxy, you must whitelist the proxy IP
| addresses from which CodeIgniter should trust the HTTP_X_FORWARDED_FOR
| header in order to properly identify the visitor's IP address.
| Comma-delimited, e.g. '10.0.1.200,10.0.1.201'
|
*/
$config['proxy_ips'] = '';


/* End of file config.php */
/* Location: ./application/config/config.php */
