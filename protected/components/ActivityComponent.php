<?php 
 
class ActivityComponent extends CApplicationComponent
{
    private $_model=null;


    public function name($module = null,$id = null)
    {
        Yii::app()->getModule('aud');
        Yii::app()->getModule('group'); 
        Yii::app()->getModule('lesson'); 
        Yii::app()->getModule('sch'); 
        Yii::app()->getModule('spec'); 
        Yii::app()->getModule('teacher');  

        $item = '';

        switch ($module) {

            case 'aud':

                if ($aud = Aud::model()->findByPk($id))
                    $item = $aud->name .' ('.Yii::app()->params['aud_types'][$aud->type]. ')';
                
                break;

            case 'group':

                if ($group = Group::model()->findByPk($id))
                    $item = $group->group_spec->code.'-'.$group->year.'-0'.$group->number.' ('.$group->group_spec->name.', '.Yii::app()->sch->course($group->year).' курс)';

                 break;

            case 'lesson':

                if ($lesson = Lesson::model()->findByPk($id))
                    $item = (isset($lesson->fullname)) ? $lesson->fullname : $lesson->name ;

                break;
                
                
            case 'sch':                

                if ($sch = Sch::model()->findByPk($id))
                    $item = $sch->group->groupName().' ('.$sch->group->group_spec->name.', '.Yii::app()->sch->course($sch->group->year).' курс)';

                break;
                
                
            case 'spec':

                if ($spec = Spec::model()->findByPk($id))
                    $item = $spec->name;
                
                break;
                
                
            case 'teacher':             
                
                if ($teacher = Teacher::model()->findByPk($id))
                    $item = $teacher->surname .' '. $teacher->initials;
                
                break;
            
            default:
                $item = '';
                break;
        }

        
        return $item;
    }
}