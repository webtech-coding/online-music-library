<?php
    class Genre extends Model{
        public static $fillable=['name','image'];
        public static $table='genres';
        protected static $storage=__DIR__.'./../storage/uploads/genres/genre_';
    }

?>