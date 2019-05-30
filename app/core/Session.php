<?php
class Session{
    function __construct(){

        session_start();
        $this->user_id=null;
        $this->auth=null;
        $this->user_name=null;
        $this->is_user=false;
        $this->auth();
    }

    private function auth(){
        if(isset($_SESSION['user_id'])){
            $this->user_id=$_SESSION['user_id'];
            $this->auth=$_SESSION['auth'];
            $this->user_name=$_SESSION['user_name'];
            $this->is_user=true;
        }else{
            unset($this->user_id);
            unset($this->auth);
            unset($this->user_name);
        }
    }

    public function login($user){
        if($user){
            $_SESSION['user_id']=$this->user_id=$user->id;
            $_SESSION['auth']=$this->auth=$user->auth;
            $_SESSION['user_name']=$this->user_name=$user->username;
            $this->is_user=true;

            return true;
        }else{
            return false;
        }
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['auth']);
        unset($_SESSION['user_name']);
        $this->is_user=true;

        return redirect('../login.php');
    }
}

$session=new Session();
