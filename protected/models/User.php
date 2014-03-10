<?php

/**
 * This is the model class for table "sch_user".
 *
 * The followings are the available columns in table 'sch_user':
 * @property integer $id
 * @property integer $vkid
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $birth_day
 * @property string $birth_month
 * @property string $birth_year
 * @property integer $registered
 * @property integer $last_activity
 * @property integer $prev_activity
 * @property string $photo_50
 * @property string $photo_100
 * @property string $photo_200
 * @property integer $sex
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'sch_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vkid, first_name, last_name, username, sex', 'required'),
			array('vkid, registered, last_activity, prev_activity, sex', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name', 'length', 'max'=>60),
			array('username, birth_day, birth_month, birth_year', 'length', 'max'=>45),
			array('photo_50, photo_100, photo_200', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, vkid, first_name, last_name, username, birth_day, birth_month, birth_year, registered, last_activity, prev_activity, photo_50, photo_100, photo_200, sex', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'vkid' => 'Vkid',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'username' => 'Username',
			'birth_day' => 'Birth Day',
			'birth_month' => 'Birth Month',
			'birth_year' => 'Birth Year',
			'registered' => 'Registered',
			'last_activity' => 'Last Activity',
			'prev_activity' => 'Prev Activity',
			'photo_50' => 'Photo 50',
			'photo_100' => 'Photo 100',
			'photo_200' => 'Photo 200',
			'sex' => 'Sex',
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
		$criteria->compare('vkid',$this->vkid);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('birth_day',$this->birth_day,true);
		$criteria->compare('birth_month',$this->birth_month,true);
		$criteria->compare('birth_year',$this->birth_year,true);
		$criteria->compare('registered',$this->registered);
		$criteria->compare('last_activity',$this->last_activity);
		$criteria->compare('prev_activity',$this->prev_activity);
		$criteria->compare('photo_50',$this->photo_50,true);
		$criteria->compare('photo_100',$this->photo_100,true);
		$criteria->compare('photo_200',$this->photo_200,true);
		$criteria->compare('sex',$this->sex);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}