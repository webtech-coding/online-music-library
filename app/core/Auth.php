<?php
    class Auth extends Model{

        public static function login($post){
            global $database;
            $query="SELECT *FROM users WHERE email=? LIMIT 1";
            $prepare=$database->PDO->prepare($query);
            $prepare->execute([$post['email']]);

            $result=$prepare->fetchObject();

            if(!empty($result)){
                if(password_verify($post['password'],$result->password)){
                    (new Auth())->store_in_session($result);
                }
            }else{                
                return 'Authentication failed';                
            }
        }

        public static function register($post){
            global $database;
            if(!(new Auth())->is_unique($post['email'])){
                return 'email already exist';
            }

            $query="INSERT INTO users(username,email,`password`) VALUES(?,?,?)";
            $prepare=$database->PDO->prepare($query);
            $hash=password_hash($post['password'],SECRET);
            $prepare->execute([$post['name'],$post['email'],$hash]);

            if($prepare->rowCount()){
                return redirect('/music/login.php');
            }else{
                return 'Error in registration !';
            }
        }

        private static function is_unique($email){
            global $database;
            $query="SELECT *FROM users WHERE email=? LIMIT 1";
            $prepare=$database->PDO->prepare($query);
            $prepare->execute([$email]);

            $result=$prepare->fetchObject();
            if(empty($result)){
                return true; 
            }else{
                false;
            }
        }

        private static function store_in_session($user){
            global $session;
            if($session->login($user)){
                return redirect('./admin/dashboard.php');
            }else{
                return false;
            }
        }
    }
?>