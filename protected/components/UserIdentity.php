<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $user = Users::model()->find(array('condition'=>"username = :id  or email = :id and status = 1",'params'=>array(':id'=>strtolower($this->username))));
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
                     
			$this->setState('id',$user->id);                         			                        
                        $this->setState('name',$user->name);
                        $this->setState('lastname',$user->lastname);
                        $this->setState('username',$user->username);
                        $this->setState('distributor_id',$user->distributor_id);
                        $this->setState('cas_id',$user->cas_id);
                        $this->setState('last_login',$user->last_login);                      
                        $this->setState('rolId',$user->rol_id);                        
                        $this->setState('photo',$user->file);                        
                        $sql = "update users set last_login = now() where id='$user->id'";
                        $connection = Yii::app() -> db;
                        $command = $connection -> createCommand($sql);
                        $command -> execute();
                        
                  
                                    
			$this->username=$user->username;
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode==self::ERROR_NONE;
    }
    
   
    
}