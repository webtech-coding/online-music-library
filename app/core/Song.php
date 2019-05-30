<?php
class Song extends Model{
    protected static $table="songs";
    protected static $fillable=['album_id','artist_id','song','title'];
    protected static $storage=__DIR__.'./../storage/uploads/albums/album_';

    public static function uploadMedia($title,$artist,$songs,$id){
        
        $type=['audio/mpeg', 'audio/x-mpeg', 'audio/mpeg3', 'audio/x-mpeg-3', 'audio/aiff', 
        'audio/mid', 'audio/x-aiff', 'audio/x-mpequrl','audio/midi', 'audio/x-mid', 
        'audio/x-midi','audio/wav','audio/x-wav','audio/xm','audio/x-aac','audio/basic',
        'audio/flac','audio/mp3','audio/x-matroska','audio/ogg','audio/s3m','audio/x-ms-wax',
        'audio/xm'];

        $total=count($title);
       
        $table_data=[];
        $row=[];

        //CHECK FOR MIME TYPE
        for($i=1; $i<=$total; $i++){
            
            if(!in_array($songs['type'][$i],$type)){
                return false;
                break;
            }
        }
        //MAKE ROW OBJECT
        for($i=1; $i<=$total; $i++){
            $row['name']=$title[$i];
            $row['artist_id']=$artist[$i];
            $audio_path=self::$storage.$id.'/'.$songs['name'][$i];
            $row['song']='album_'.$id.'/'.$songs['name'][$i];
            $row['album_id']=$id;
            move_uploaded_file($songs['tmp_name'][$i],$audio_path);
            $table_data[]=$row;
        }

        foreach($table_data as $data){
            self::create([
                'album_id'=>$id,
                'song'=>$data['song'],
                'title'=>$data['name'],
                'artist_id'=>$data['artist_id']
            ]);
        }           
        return true;        
    }

    public static function song_by_album_id($id){
        $table=self::$table;
        $query="SELECT *FROM $table WHERE album_id=$id";
        $prepare=self::$PDO->prepare($query);
        
        $data=[];

        if($prepare->execute()){
            while($result=$prepare->fetchObject()){
                array_push($data,$result);
            }
        }

        return $data;
    }
}