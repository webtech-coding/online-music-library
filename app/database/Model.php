<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Model{

    protected static $fillable=['username','auth'];
    protected static $table='users';
    protected static $PDO;
    protected static $storage='../storage/uploads/';

    function __construct(){
        global $database;
        self::$PDO=$database->PDO;
    }

    public static function id($id){
      
        $table=static::$table;
       
        $fields=(new self)->fields(static::$fillable);
        $query="SELECT id,$fields FROM $table WHERE id=$id LIMIT 1";
        $prepare=self::$PDO->prepare($query);

        if($prepare->execute()){
           return $prepare->fetchObject();
        }
    }

    public static function all(){
        
        $table=static::$table;
        $fields=(new self)->fields(static::$fillable);
        $query="SELECT id,$fields from $table";
        $prepare=self::$PDO->prepare($query);

        $data=[];

        if($prepare->execute()){
            while($result=$prepare->fetchObject()){
                array_push($data,$result);
            }
        }

        return $data;
    }

    public static function create($data){

        if(!(new self)->validateData($data)){
            return false;
        }

        if(!(new self)->validateProperty($data, static::$fillable)){
            return false;
        }

        $property=implode(',',array_keys($data));
        $values="'".implode("','",array_values($data))."'";

        $table=static::$table;
        $query="INSERT INTO $table ($property) VALUES ($values)";
        $prepare=self::$PDO->prepare($query);
        $prepare->execute();

        if($prepare->rowCount()){
           return self::id(self::$PDO->lastInsertId());
        }else{
            echo 'Error in saving the data';
            return false;
        }
    }

    public static function update($id,$data){
        if(!(new self)->validateData($data)){
            return false;
        }

        if(!(new self)->validateProperty($data, static::$fillable)){
            return false;
        }

        $set=[];
        foreach($data as $key=>$value){
            $set[]="{$key}='$value'";
        }
        $set=implode(',',$set);
      
        $table=static::$table;
        $sql="UPDATE $table SET $set WHERE id=$id";
        $prepared =self::$PDO->prepare($sql);
        if($prepared->execute()){
            return true;
        }

    }

    private function validateData($data){
        if(empty($data) || !is_array($data)){
            echo 'Improper data in the array';
            return false;
        }else{
            return true;
        }
    }

    private function validateProperty($data,$fillable){

        foreach ($data as $property => $value) {
            if(!in_array($property,$fillable)){
                echo 'Undefined property '.$property.' in the data';
                return false;
                break;
            }
        }
        return true;
    }

    private function fields($fillable){
        return implode(",",$fillable);
    }

    public static function uploadImage($id,$file){

        $path=static::$storage.$id;
        if(!file_exists($path)){
            mkdir($path, 0777,true);
        }       
        
        if(move_uploaded_file($file['tmp_name'],$path.'/'.$file['name'])){
            $folder='';
            switch(static::$table){
                case 'artists':
                $folder='artist_';
                break;
                case 'albums';
                $folder='album_';
                break;
                case 'genres':
                $folder='genre_';
                break;
            }
            return $folder.$id.'/'.$file['name'];
        }        
    }    

    public static function sql($sql){
        global $database;
        $pdo=$database->PDO;
        $prepare=$pdo->prepare($sql);
       
        $data=[];
        if($prepare->execute()){
            while($row=$prepare->fetchObject()){
                $data[]=$row;
            }

            return $data;
        }else{
            return 'invalid';
        }
    }
}
