<?php

class SchController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','redirect','group','teacher','history'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('manage','process'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$this->render('index');
	}


	public function actionRedirect()
	{
		Yii::app()->user->setFlash('danger', 'Для керування розкладом потрібно вибрати групу і натиснути <b>Редагувати</b>!');
		$this->redirect('/group');
	}


	public function actionGroup($id)
	{
		if (!$group = Group::model()->findByPk($id)) {
			Yii::app()->user->setFlash('danger', Yii::app()->params['errors']['no_group']);
			$this->redirect('/group');
		}

		$data = Sch::model()->getSch($id);
		$week = (isset($_GET['week'])) ? Yii::app()->sch->getWeek($_GET['week']) : Yii::app()->sch->getWeek();

		$this->render('group',array(			
			'week'	=> $week,
			'group' => $group,	
			'data'	=> $data,			
			'sch'  	=> Sch::model()->groupSch($data['sch'],$week),
		));
	}


	public function actionTeacher($id)
	{
		Yii::app()->getModule('teacher'); 
		if (!$teacher = Teacher::model()->findByPk($id)) {
			Yii::app()->user->setFlash('danger', Yii::app()->params['errors']['no_teacher']);
			$this->redirect('/teacher');
		}

		$week = (isset($_GET['week'])) ? Yii::app()->sch->getWeek($_GET['week']) : Yii::app()->sch->getWeek();

		$this->render('teacher',array(			
			'week'		=> $week,
			'teacher' 	=> $teacher,	
			'sch'  		=> Tch::model()->teacherSch($id,$week),
		));
	}


	public function actionManage($id)
	{
		$model = new Sch;				
		$model->cleanUp($id);

		if (!$group = Group::model()->findByPk($id)) {
			Yii::app()->user->setFlash('danger', Yii::app()->params['errors']['no_group']);
			$this->redirect('/group');
		}

		if(isset($_POST['Sch']))
		{
			$model->group_id = $id;
			$model->json = json_encode($_POST['Sch']);;

			if($model->save()) {
				Tch::model()->saveThis($_POST['Sch'],$model->id,$id);
				Yii::app()->user->setFlash('success', "<big><b>Розклад успішно відредаговано!</b></big>");							
			}

		}

		$sch_id = (isset($_GET['sch_id'])) ? htmlentities($_GET['sch_id']) : null;

		$this->render('manage',array(
			'sch'  		=> $model->getSch($id,$sch_id),
			'data' 		=> $model->schData(),
			'group' 	=> $group,
		));

	}

	public function actionHistory($id)
	{
		$model = new Sch;

		if (!$models = $model->schHistory($id))
			$this->redirect('/group');				
		

		$this->render('history',array(			
			'models' => $models,
			'group'  => Group::model()->findByPk($id),
		));

	}


	public function loadModel($id)
	{
		$model=Sch::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}