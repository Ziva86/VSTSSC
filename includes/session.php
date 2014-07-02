<?php

class Session
{
    
    private $logget_in=false;
    public $user_id;
    
    
    function __construct()
    {
        session_start();
        $this->check_login();
        
    }
    
    private function check_login()
    {
        if(isset($_SESSION['user_id']))
        {
            $this->user_id=$_SESSION['user_id'];
            $this->logget_in=true;
        }
        else
        {
            unset($this->user_id);
            $this->check_login=false;
        }
        
        
    }
    
    public function is_logget_in()
    {
       return $this->logget_in;
    }
    
    public function login($user)
    {
        if($user)
        {
            $this->user_id=$_SESSION['user_id']=$user->id;
            $this->logget_in=true;
        }
    }
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->logget_in=false;
    }
    
    
}

$session=new Session();
?>