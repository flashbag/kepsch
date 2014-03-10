<?php

// this file must be stored in:
// protected/components/WebUser.php

class WebUser extends CWebUser {

  // Store model to not repeat query.
  private $_model;

  // Return first name.
  // access it by Yii::app()->user->first_name
  public function userByID($id){
    if ($user = User::model()->findByAttributes(array('id'=>$id))) {
      $array = array('vkid' => $user->vkid, 'name' => $user->first_name.' '.$user->last_name );
      return $array;
    } else {
      return false;  
    }
    
  }

  // This is a function that checks the field 'role'
  // in the User model to be equal to 1, that means it's admin
  // access it by Yii::app()->user->isAdmin()
  function isAdmin(){

    $user = User::model()->findByAttributes(array('id'=>Yii::app()->user->id));

    if ($user && $user->vkid == Yii::app()->params['adminVkID']) {
      return true;
    } else {
      return false;
    }
  }

  // Load user model.
  protected function loadUser($id=null)
  {
    if($this->_model===null)
    {
      if($id!==null)
        $this->_model=User::model()->findByPk($id);
    }
    return $this->_model;
  }
}
?>