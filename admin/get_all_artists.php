<?php include('./../init.php')?>
<?php

    class GetAllArtists{
        function __construct(){
            $message=['message'=>'i am okay','season'=>'Game of Thrones'];

            echo json_encode(Artist::all());
        }
    }
    new GetAllArtists();
   
?>

