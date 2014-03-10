<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',

	'name'=>'Розклад',
	'sourceLanguage'=>'en_US',
  	'language'=>'uk',  	
  	'charset'=>'utf-8',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.modules.*',
		'application.modules.group.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'gii',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

        'user',	
        'group' =>
        	array(
        		'defaultController' => 'group',
    		),
        'spec' =>
        	array(
        		'defaultController' => 'spec',
    		),
        'lesson' =>
        	array(
        		'defaultController' => 'lesson',
    		),    		
        'teacher' =>
        	array(
        		'defaultController' => 'teacher',
    		),       
        'aud' =>
        	array(
        		'defaultController' => 'aud',
    		),    
        'sch' =>
        	array(
        		'defaultController' => 'sch',
    		),      		   		 		
        'activity' =>
        	array(
        		'defaultController' => 'activity',
    		),        		
	),

	// application components
	'components'=>array(
		'sch' => array('class'=>'SchComponent'),
		'activity' => array('class'=>'ActivityComponent'),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>false,
			'class' => 'WebUser',
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'showScriptName' => false,
			'urlFormat'=>'path',
			'rules'=>array(

				'login'=>'site/login',
				'identify'=>'site/identify',

				'activity'=>'activity/activity/index',


				'sch/manage' => 'sch/sch/redirect',
				'sch/history' => 'sch/sch/redirect',
				'sch/process' => 'sch/sch/redirect',
				'sch/manage/<id:\d+>/<sch_id:\d+>'=>'sch/sch/manage',
				'sch/manage/<id:\d+>' => 'sch/sch/manage',
				'sch/history/<id:\d+>' => 'sch/sch/history',
				
				'sch/process/<id:\d+>' => 'sch/sch/process',

				'sch/group/<id:\d+>' => 'sch/sch/group',
				'sch/teacher/<id:\d+>' => 'sch/sch/teacher',
				'sch/group/<id:\d+>/<week:\d+>'=>'sch/sch/group',
				'sch/teacher/<id:\d+>/<week:\d+>'=>'sch/sch/teacher',

				'spec'=>'spec/spec/index',
				'spec/<id:\d+>'=>'spec/spec/view',
				'spec/create'=>'spec/spec/create',
				'spec/update/<id:\d+>'=>'spec/spec/update',
				'spec/delete/<id:\d+>'=>'spec/spec/delete',
				'spec/page/<Spec_page:\d+>'=>'spec/spec/index',

				'lesson'=>'lesson/lesson/index',
				'lesson/<id:\d+>'=>'lesson/lesson/view',
				'lesson/create'=>'lesson/lesson/create',
				'lesson/update/<id:\d+>'=>'lesson/lesson/update',
				'lesson/delete/<id:\d+>'=>'lesson/lesson/delete',
				'lesson/page/<Lesson_page:\d+>'=>'lesson/lesson/index',

				'aud'=>'aud/aud/index',
				'aud/<id:\d+>'=>'aud/aud/view',
				'aud/create'=>'aud/aud/create',
				'aud/update/<id:\d+>'=>'aud/aud/update',
				'aud/delete/<id:\d+>'=>'aud/aud/delete',
				'aud/page/<Aud_page:\d+>'=>'aud/aud/index',

				'teacher'=>'teacher/teacher/index',
				'teacher/admin'=>'teacher/teacher/admin',
				'teacher/<id:\d+>'=>'teacher/teacher/view',
				'teacher/create'=>'teacher/teacher/create',
				'teacher/update/<id:\d+>'=>'teacher/teacher/update',				
				'teacher/delete/<id:\d+>'=>'teacher/teacher/delete',
				'teacher/admin/page/<Teacher_page:\d+>'=>'teacher/teacher/admin',

			
				'group'=>'group/group/index',
				'group/admin'=>'group/group/admin',
				'group/<id:\d+>'=>'group/group/view',
				'group/create'=>'group/group/create',
				'group/update/<id:\d+>'=>'group/group/update',
				'group/delete/<id:\d+>'=>'group/group/delete',
				'group/admin/page/<Group_page:\d+>'=>'group/group/admin',


				'module/<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
				'<spec:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		*/

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=kepsch',
			'emulatePrepare' => true,
			'username' => 'kepsch',
			'password' => 'kepsch',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>include(dirname(__FILE__).'/params.php'),//<– here is our file

);