<?php

/**
 * This is the model class for table "sch_group".
 *
 * The followings are the available columns in table 'sch_group':
 * @property integer $id
 * @property integer $code
 * @property integer $year
 * @property integer $number
 * @property integer $created_by
 * @property integer $created_time
 * @property integer $updated_by
 * @property integer $updated_time
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $createdBy
 * @property User $updatedBy
 * @property Spec $code0
 */
class Group extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Group the static model class
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
		return 'sch_group';
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
		return 'групи';
	}

	public function singleName()
	{
		return 'група';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, code, year, number, created_by, created_time, updated_by, updated_time, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, code, year, number, created_by, created_time, updated_by, updated_time, status', 'safe', 'on'=>'search'),
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
			'group_spec' => array(self::BELONGS_TO, 'Spec', 'code'),
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
			'year' => 'Рік',
			'number' => 'Номер',
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
		$criteria->compare('code',$this->code);
		$criteria->compare('year',$this->year);
		$criteria->compare('number',$this->number);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('created_time',$this->created_time);
		$criteria->compare('updated_by',$this->updated_by);
		$criteria->compare('updated_time',$this->updated_time);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function groupName()
	{
		Yii::app()->getModule('spec');  	
		return $this->group_spec->code.'-'.$this->year.'-0'.$this->number;
	}

	public function getGroups()
	{
        Yii::app()->getModule('spec');  
        foreach ($this->model()->findAll() as $group) {

            $code = $group->group_spec->code;
            $specs[]  = $code;

            $gg[] = array(
                'code' => $code,
                'id' => $group->id,
                'year' => $group->year,
                'number' => $group->number, 
                'course' => Yii::app()->sch->course($group->year),
                );  
            
        }


        $specs = array_unique($specs);
        sort($specs); 

        for($c=1; $c<=4; $c++) {
            foreach ($specs as $s) {
                $groups[$c][$s] = array();
                foreach ($gg as $g) {
                    if (($g['course'] == $c) && $g['code'] == $s) {
                        $groups[$c][$s][$g['id']] = $g['year'].'-0'.$g['number']; 
                    }
                }
            }
        }   

        return $groups;		
	}


}