<?php

/**
 * This is the model class for table "sch_sch".
 *
 * The followings are the available columns in table 'sch_sch':
 * @property integer $id
 * @property integer $group_id
 * @property integer $modified_by
 * @property integer $modified_time
 * @property integer $status
 * @property string $json
 *
 * The followings are the available model relations:
 * @property User $modifiedBy
 */
class Sch extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Sch the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sch_sch';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_id, json', 'required'),
			array('group_id, modified_by, modified_time, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, group_id, modified_by, modified_time, status, json', 'safe', 'on'=>'search'),
			array('modified_time','default','value'=>time(),'setOnEmpty'=>false,'on'=>'update'),
			array('modified_time','default','value'=>time(),'setOnEmpty'=>false,'on'=>'insert'),
			array('modified_by','default','value'=>Yii::app()->user->id,'setOnEmpty'=>false,'on'=>'update'),
			array('modified_by','default','value'=>Yii::app()->user->id,'setOnEmpty'=>false,'on'=>'insert')			
			);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
			'modifiedBy' => array(self::BELONGS_TO, 'User', 'modified_by'),
			'tches' => array(self::HAS_MANY, 'Tch', 'sch_id'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'group_id' => 'Group',
			'modified_by' => 'Modified By',
			'modified_time' => 'Modified Time',
			'status' => 'Status',
			'json' => 'Json',
			);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('modified_time',$this->modified_time);
		$criteria->compare('status',$this->status);
		$criteria->compare('json',$this->json,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'id DESC',
				),					
			));
	}



	public function schData()
	{
		Yii::app()->getModule('aud');	
		Yii::app()->getModule('spec');
		Yii::app()->getModule('lesson');
		Yii::app()->getModule('teacher');

		$data = array();		
		$data['auds'] = Aud::model()->getAll();
		$data['lessons'] = Lesson::model()->getAll();
		$data['teachers'] = Teacher::model()->getAll();

		return $data;
	}


	public function getSch($group_id, $sch_id = null)
	{
		$data = array('type'=>'latest');
		if ($model = $this->model()->findByAttributes(array('group_id'=>$group_id,'id'=>$sch_id),array('limit'=>1,'order'=>'id DESC'))) {
			$data['sch'] 	= json_decode($model->json,true);
			$data['info'] 	= $model;		
			$data['type'] 	= 'history';
		} elseif ($model = $this->model()->findByAttributes(array('group_id'=>$group_id),array('limit'=>1,'order'=>'id DESC'))) {			
			$data['sch'] 	= json_decode($model->json,true);						
			$data['info'] 	= $model;		
		} else {
			$data['sch'] = json_decode(Yii::app()->params['default']['sch'],true);			
			$data['type'] = 'new';
			$data['info'] = false;
		}
		
		return $data;
	}



	public function groupSch($sch,$week)
	{
		$array = array();

		foreach ($sch as $d => $day) {
			foreach ($day as $i => $nums) {				
				foreach ($nums['rows'] as $row) {
					if (Yii::app()->sch->isRecordValid($nums,$row) && in_array($week, Yii::app()->sch->parseWeek($row['week']))) {								
						$array[$d][$nums['number']][$nums['lesson']]['auds'][$nums['lesson']][] = $row['aud'];
						$array[$d][$nums['number']][$nums['lesson']]['tchs'][$nums['lesson']][] = $row['teacher'];			
					}
				}	
			}
		}

		return $array;
	}

	public function schHistory($id)
	{
		if ($models = $this->model()->findAllByAttributes(array('group_id'=>$id),array('order'=>'id DESC')))
			return $models;
		else 
			return false;		
	}


	public function cleanUp($id)
	{
		$limit= Sch::model()->countByAttributes(array('group_id'=>$id)) - Yii::app()->params['maxSchs'];
		if ($limit>0) {
			foreach (Sch::model()->findAllByAttributes(array('group_id'=>$id),array('order' => 'id ASC','limit' => $limit,)) as $key => $model) {
				$model->delete();
			}
		}
	}

	
}