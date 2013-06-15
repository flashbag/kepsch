<?php

// this file must be stored in:
// protected/components/WebUser.php

class WebUser extends CWebUser {

    /**
     *
     * @return the type of user based on forien key of UserType
     */
    public function firstName()
    {

        $user = User::model()->findByAttributes(array('vkid'=>Yii::app()->user->id));
        if ($user === null)
           	return 'error';
        else
            return $user->first_name;
    }
}
?>