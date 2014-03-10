<?php

/**
 * This is the model class for table "sch_teacher".
 *
 * The followings are the available columns in table 'sch_teacher':
 * @property integer $id
 * @property string $surname
 * @property string $initials
 * @property string $first_name
 * @property integer $created_by
 * @property string $second_name
 * @property integer $created_time
 * @property integer $updated_by
 * @property integer $updated_time
 *
 * The followings are the available model relations:
 * @property User $createdBy
 * @property User $updatedBy
 */
class Teacher extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Teacher the static model class
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
		return 'sch_teacher';
	}

	public function modelClass()
	{
		return __CLASS__;
	}

	/**
	 * @return string the associated with model name
	 */
	public function modelName()
	{
		return 'викладачі';
	}

	public function singleName()
	{
		return 'викладач';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('surname, initials', 'required'),
			array('created_by, created_time, updated_by, updated_time, status', 'numerical', 'integerOnly'=>true),
			array('surname, first_name, second_name', 'length', 'max'=>45),
			array('initials', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, surname, initials, first_name, created_by, second_name, created_time, updated_by, updated_time, status', 'safe', 'on'=>'search'),
			array('updated_time','default','value'=>time(),'setOnEmpty'=>false,'on'=>'update'),
			array('created_time,updated_time','default','value'=>time(),'setOnEmpty'=>false,'on'=>'insert'),
			array('updated_by','default','value'=>Yii::app()->user->id,'setOnEmpty'=>false,'on'=>'update'),
			array('created_by,updated_by','default','value'=>Yii::app()->user->id,'setOnEmpty'=>false,'on'=>'insert'),
			array('status','default','value'=>'0','setOnEmpty'=>false,'on'=>'update'),
			array('status','default','value'=>'0','setOnEmpty'=>false,'on'=>'insert'),			
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
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'surname' => 'Прізвище',
			'initials' => 'Ініціали',
			'first_name' => 'Ім\'я',
			'created_by' => 'Created By',
			'second_name' => 'По-батькові',
			'created_time' => 'Created Time',
			'updated_by' => 'Updated By',
			'updated_time' => 'Updated Time',
			'status' => 'Статус',
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
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('initials',$this->initials,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('second_name',$this->second_name,true);
		$criteria->compare('created_time',$this->created_time);
		$criteria->compare('updated_by',$this->updated_by);
		$criteria->compare('updated_time',$this->updated_time);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'first_name DESC',
        	),				
		));
	}

	public function getTeachers()
	{
		foreach ($this->model()->findAll(array('order'=>'surname')) as $t) 
		{
			$teachers[] = array(
					'id'=>$t->id, 
					'text' => $t->surname.' '.$t->initials, 
					'fullname' => $t->surname.' '.$t->first_name.' '.$t->second_name
				);
		}		

		return $teachers;
	}

	public function getAll()
	{
		$all = array('-');
		foreach ($this->model()->findAllByAttributes(array('status'=>'1'),array('order'=>'surname')) as $key => $value) {
			$all[$value->id] =  $value->surname.' '.$value->initials;
		}
		return $all;
	}

}