<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
    public function authenticate()
    {
        $record=User::model()->findByAttributes(array('username'=>$this->username));

        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else
        {
            $this->_id=$record->id;
            $this->setState('vkid', $record->vkid);
            $this->setState('first_name', $record->first_name);
            $this->setState('last_name', $record->last_name);
            $this->setState('full_name', $record->first_name.' '.$record->last_name);

            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }
}