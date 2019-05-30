<?php

class Artist extends Model{

    protected static $fillable=['name','country','band','profile','avatar'];
    protected static $table='artists';
    protected static $storage=__DIR__.'./../storage/uploads/artists/artist_';
}