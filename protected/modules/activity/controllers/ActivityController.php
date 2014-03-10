<?php

class ActivityController extends Controller
{
	public function actionIndex()
	{
		
        Yii::app()->getModule('aud');
        Yii::app()->getModule('group'); 
        Yii::app()->getModule('lesson'); 
        Yii::app()->getModule('sch'); 
        Yii::app()->getModule('spec'); 
        Yii::app()->getModule('teacher');  
        

        $schs = Sch::model()->findAll(array('order'=>'modified_time DESC','limit'=>100));
        $auds = Aud::model()->findAll(array('order'=>'updated_time DESC','limit'=>100));
		$specs = Spec::model()->findAll(array('order'=>'updated_time DESC','limit'=>100));
		$groups = Group::model()->findAll(array('order'=>'updated_time DESC','limit'=>100));
		$lessons = Lesson::model()->findAll(array('order'=>'updated_time DESC','limit'=>100));				
		$teachers = Teacher::model()->findAll(array('order'=>'updated_time DESC','limit'=>100));

		
		$entries = $this->addEntries(array($auds,$specs,$groups,$lessons,$teachers));

		foreach ($schs as $value) {		

			$entries[] = array(			
				'id' => $value->group_id,
				'module' => strtolower(get_class($value)),
				'time' => $value->modified_time.rand(100000,999999),
				'time' => $value->modified_time,			
				'user' => $value->modified_by,
				'action' => 'update',
			);
		}

		$entriesNew = array();

		foreach ($entries as $value) {
			$entriesNew[$value['time'].rand(10000,99999)] = $value;
		}

		krsort($entriesNew);


		$this->render('index',array(			
			'entries' => $entriesNew,
		));
	}
	

	public function addEntries($entryArrays = null)
	{
		if ($entryArrays != null) {

			$entries = array();

			foreach ($entryArrays as $array) {			

				foreach ($array as $value) {

					$action = ($value->updated_time == $value->created_time) ? 'create' : 'update';

					if ($value->updated_time != null) {
					
					
					$entries[] = array(			
						'id' => $value->id,
						'module' => strtolower(get_class($value)),
						//'time' => $value->updated_time.rand(100000,999999),
						'time' => $value->updated_time,
						'user' => $value->updated_by,
						'action' => $action,
					);
					}
				}

			}

			return $entries;

		} else return false;
	}	
}