<?php

/**
 * This is the model class for table "sch_tch".
 *
 * The followings are the available columns in table 'sch_tch':
 * @property integer $id
 * @property integer $sch_id
 * @property integer $tch_id
 * @property integer $day
 * @property integer $number
 * @property integer $group_id
 * @property integer $lesson_id
 * @property integer $aud_id
 *
 * The followings are the available model relations:
 * @property Sch $sch
 * @property Teacher $tch
 * @property Group $group
 * @property Lesson $lesson
 * @property Aud $aud
 */
class Tch extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tch the static model class
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
		return 'sch_tch';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sch_id, tch_id, day, number, group_id, lesson_id, aud_id, week', 'required'),
			array('sch_id, tch_id, day, number, group_id, lesson_id, aud_id, week', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, sch_id, tch_id, day, number, group_id, lesson_id, aud_id, week', 'safe', 'on'=>'search'),
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
			'sch' => array(self::BELONGS_TO, 'Sch', 'sch_id'),
			'tch' => array(self::BELONGS_TO, 'Teacher', 'tch_id'),
			'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
			'lesson' => array(self::BELONGS_TO, 'Lesson', 'lesson_id'),
			'aud' => array(self::BELONGS_TO, 'Aud', 'aud_id'),
		);
	}

	public function saveThis($sch,$sch_id,$group_id)
	{
		foreach (Tch::model()->findAllByAttributes(array('group_id'=>$group_id)) as $model) { $model->delete(); }

		foreach ($sch as $d => $day) {
			foreach ($day as $i => $nums) {				
				foreach ($nums['rows'] as $row) {
					if (Yii::app()->sch->isRecordValid($nums,$row) ) {								
						foreach (Yii::app()->sch->parseWeek($row['week']) as $w) {
							$tch = new Tch();
							$tch->day = $d;
							$tch->week = $w;
							$tch->sch_id = $sch_id;
							$tch->tch_id = $row['teacher'];
							$tch->number = $nums['number'];
							$tch->lesson_id = $nums['lesson'];
							$tch->group_id = $group_id;							
							$tch->aud_id = $row['aud'];
							$tch->save();
						}	
					}
				}	
			}
		}
	}

	public function teacherSch($id,$week)
	{
		$sch = array();
		if ($check = Tch::model()->findByAttributes(array('tch_id'=>$id)) ) {
			foreach (Tch::model()->findAllByAttributes(array('tch_id'=>$id,'week'=>$week), array('order'=>'day ASC, number ASC',)) as $r) {		
				$sch[$r->day][$r->number][] = array(						
						'aud_id' 	=> $r->aud_id,
						'group_id' 	=> $r->group_id,
						'lesson_id'	=> $r->lesson_id,
					);
			}			
		}
		return $sch;
	}

}