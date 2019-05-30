<?php

final class Connection{
    //public static $PDO;
    
    function __construct(){

        if(SERVER==''|| USERNAME=='' || DB_NAME==''){
            respond_fatal_error('Database configuration missing.');
        }
        $this->PDO=null;
        $this->server=SERVER;
        $this->username=USERNAME;
        $this->password=PASSWORD;
        $this->db_name=DB_NAME;

        $this->connect();
    }

    private function connect(){
        
       try{  

            $this->PDO=new PDO("mysql:host=$this->server;dbname=$this->db_name", $this->username, $this->password);
            
            if(!$this->PDO){
                die('Connection failed! Aborted');
            }  
            
        }catch(PDOException $e){
            die('Connection failed!'.$e );
        }
    }
}

$database=new Connection();
