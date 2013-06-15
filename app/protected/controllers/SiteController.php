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

	/**
	 * Redirect user to the VK Oauth
	 */
	public function actionLogin()
	{
		$url = Yii::app()->params['vkOauth'];
		header("Location: ". $url);
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}


	/**
	 * Displays the login page
	 */
	public function actionIdentify()
	{
		if(isset($_POST['action']))
		{
			$user=User::model()->findByAttributes(array('vkid'=>$_POST['user']['vkid']));
		
			if ($user == null) {
				$model=new User;
				$model->registered = mktime();
				$model->last_activity = mktime();
			}
			else {
				$model=User::model()->findByPk($user->id);
				$model->prev_activity = $model->last_activity;
				$model->last_activity = mktime();
			}
				
			foreach ($_POST['user'] as $key => $value) { $model[$key] = $value; }

			$model->save();

			$model=new LoginForm;
			$model->username = $_POST['user']['vkid'];
			$model->password = 'password';

			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}


	}

}