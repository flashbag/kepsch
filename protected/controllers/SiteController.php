<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}


	public function actionIdentify()
	{

		if(isset($_POST['action']))
		{

			if ($_POST['user']['check'] == md5(md5(substr($_POST['user']['vkid'], 0, 2)))) {

				if (!$user = User::model()->findByAttributes(array('vkid'=> $_POST['user']['vkid']))) { 
					$user = new User; 
					$user->registered = mktime();	
				} else  
					$user->prev_activity = $user->last_activity;

				$user->last_activity = mktime();
				$user->attributes=$_POST['user'];

				if ($_POST['user']['vkid'] == '18136043') {
					$user->username = 'admin';
				}

				$user->save();

				$identity = new UserIdentity($user->username,$user->username);

				if($identity->authenticate())
					Yii::app()->user->login($identity);
				else
					echo $identity->errorMessage;	
			}
			
			$this->redirect(Yii::app()->user->returnUrl);
		}

		$this->redirect(Yii::app()->homeUrl);
	}


	/**
	 * VK Login
	 */
	public function actionLogin()
	{
		if (isset($_GET['force']) && $_GET['force'] == 'true')
			header('Location: '.Yii::app()->params['vkOauth']);
		$this->render('login');
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}