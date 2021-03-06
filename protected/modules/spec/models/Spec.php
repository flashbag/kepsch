<?php

/**
 * This is the model class for table "sch_spec".
 *
 * The followings are the available columns in table 'sch_spec':
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property integer $created_by
 * @property integer $created_time
 * @property integer $updated_by
 * @property integer $updated_time
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $createdBy
 * @property User $updatedBy
 */
class Spec extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Spec the static model class
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
		return 'sch_spec';
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
		return 'спеціальності';
	}

	public function singleName()
	{
		return 'спеціальність';
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_by, created_time, updated_by, updated_time, status', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>10),
			array('name, description', 'length', 'max'=>45),
			array('code, name, description', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, code, name, description, created_by, created_time, updated_by, updated_time, status', 'safe', 'on'=>'search'),
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
			'code' => 'Код',
			'name' => 'Назва',
			'description' => 'Опис',
			'created_by' => 'Created By',
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
		$criteria->compare('code',$this->code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('created_time',$this->created_time);
		$criteria->compare('updated_by',$this->updated_by);
		$criteria->compare('updated_time',$this->updated_time);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['pagesize'],
				),
			));
	}


}