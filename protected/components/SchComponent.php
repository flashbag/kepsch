<?php 
 
class SchComponent extends CApplicationComponent
{
    private $_model=null;

    public function parseWeek($w) {
        for($i=0;$i<strlen($w);$i++){ $weeks[substr($w, $i, 1)] = substr($w, $i, 1); }
        return $weeks;
    }

    public function isRecordValid($nums, $row) {
        return ($row['week'] != '0' && $row['teacher'] != '0' && $nums['number'] != '0' && $nums['lesson'] != '0') ? true : false; 
    }

    public function audsName($auds)
    {
        $audsName = array();
        Yii::app()->getModule('aud'); 
        foreach ($auds as $id) {
            if ($aud = Aud::model()->findByPk($id)) {
                $audsName[] = $aud->name;    
            }
            
        }
        return implode(', ', $audsName);
    }

    public function audName($id = null)
    {
        Yii::app()->getModule('aud'); 
        return ($id != null) ? Aud::model()->findByPk($id)->name : false ; 
    }

    public function teacherName($id = null)
    {
        Yii::app()->getModule('teacher'); 
        return ($id != null) ? Teacher::model()->findByPk($id)->surname.' '.Teacher::model()->findByPk($id)->initials : false ; 
    }

    public function groupName($id = null)
    {
        Yii::app()->getModule('spec'); 
        Yii::app()->getModule('group'); 
        $group = Group::model()->findByPk($id);
        $group = $group->group_spec->code.'-'.$group->year.'-0'.$group->number;
        return ($id != null) ? $group : false ; 
    }

    public function lessonName($id = null)
    {
        Yii::app()->getModule('lesson'); 
        return ($id != null) ? Lesson::model()->findByPk($id)->name : false ; 
    }

    public function getWeek($week = null)
    {
        $start = 1378074637;

        if (!in_array($week,array('1','2','3','4')))
            $week = ((mktime()- $start)/604800)%4 + 1;

        return $week;
    }

    public function course($year)
    {
        $datetime = new Datetime();
        $y = $datetime->format('y');
        $m = $datetime->format('n');

        if ($m>8) {
            $course = $y-$year+1;
        } else {
            $course = $y-$year;
        }
        return $course;
    }

    public function getGroups()
    {
        Yii::app()->getModule('group');


    }

    public function existingGroups()
    {
        Yii::app()->getModule('group');  
        foreach (Group::model()->findAll() as $group){
            $groups[] = array($group->code, $group->year, $group->number);
        }            

        return $groups;
    }

    public function specCode($id = null)
    {
        Yii::app()->getModule('spec');  
        if ($id != null) {
            if ($spec = Spec::model()->findByPk($id)) {
                return $spec->code;    
            } else {
                return false;
            }
            
        } else {
            return false;
        }
    }

    public function activeSpecs()
    {
        $specs_array[] = '-';
        Yii::app()->getModule('spec');  
        $specs = Spec::model()->findAllByAttributes(array('status'=>'1'));
        foreach ($specs as $spec) {
            $specs_array[$spec['id']] = $spec->code;
        }
        return $specs_array;

    }
 

    public function activeYears()
    {
        $years[] = '-';
        $datetime = new Datetime();
        $year = $datetime->format('y');
        $month = $datetime->format('n');

        if ($month>8)  $years[$year] = $year;
        $years[$year-1] = $year-1;
        $years[$year-2] = $year-2;
        $years[$year-3] = $year-3;
        if ($month<8)  $years[$year-4] = $year-4;
        
        return $years;
    }


    public function activeNumbers()
    {
        $numbers[] = '-';
        for ($i=1; $i<=6; $i++){
            $numbers[$i] = '0'.$i; 
        }
        
        return $numbers;
    }

    public function setModel($id)
    {
        $this->_model=Region::model()->findByPk($id);
    }
 
    public function getModel()
    {
        if (!$this->_model)
        {
            if (isset($_GET['region']))
                $this->_model=Region::model()->findByAttributes(array('url_name'=> $_GET['region']));
            else
                $this->_model=Region::model()->find();
        }
        return $this->_model;
    }
 
    public function getId()
    {
        return $this->model->id;
    }
 
    public function getName()
    {
        return $this->model->name;
    }
}