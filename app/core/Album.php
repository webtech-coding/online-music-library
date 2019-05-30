<?php
class Album extends Model{
    protected static $table="albums";
    protected static $fillable=['name','year','artist_id','genre_id','image','description'];
    protected static $storage=__DIR__.'./../storage/uploads/albums/album_';
    
}