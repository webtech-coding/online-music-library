<?php
  include('./../../init.php');
  $id=isset($_GET['id'])?$_GET['id']:1;

  $sql="SELECT
  songs.song AS song, songs.id AS song_id, songs.title AS song_name,
  artists.name AS artist_name, artists.id AS artist_id
  FROM artists INNER JOIN songs ON songs.artist_id=artists.id WHERE songs.album_id=$id";

  
  $data=Model::sql($sql);

  echo json_encode($data);
?>