
<?php include('./admin_header.php');?>
<?php
    //$sql="SELECT songs.title album.name artist.name FROM songs INNER JOIN albums ON songs.album_id=albums.id INNER JOIN artists ON songs.artist_id=artist.id";
    $sql="SELECT songs.title AS song_title, songs.song AS song, albums.name AS album_name, albums.id AS album_id, artists.name AS artist_name, artists.id AS artist_id FROM songs INNER JOIN albums ON songs.album_id=albums.id INNER JOIN artists ON artists.id=songs.artist_id";
    $details=Model::sql($sql);
  
?>
<div class="main-content-inner">
   <div class="row">
      <div class="col-12 mt-5">
            <div class="song">
                <?php $songs=Song::all();?>
                <ul class="song__lists">
                    <?php foreach($details as $detail):?>
                        <li class="song__list" data-music="<?=$detail->song?>">
                            <div>
                                <i class="ti-music song__list-icon"></i>
                                <span class="song__list-name"><?=$detail->song_title?></span>
                                <div class="song__detail">
                                    <a href="./single_album.php?id=<?=$detail->album_id?>"><span class="song__album"><?=$detail->album_name?></a></span>
                                    <span class="genre__seperator"></span>
                                    <a href="./single_artist.php?id=<?=$detail->album_id?>"><span class="song__artist"><?=$detail->artist_name?></a></span>
                                </div>
                            </div>
                            
                            <div class="song__list-menu">
                                <div class="song__list-dots">....</div>
                                
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php include('./../app/includes/audioplayer.php')?>

<script src="./../resources/js/player.js"></script>
   
<?include('./admin_footer.php');?>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        new Player()
    })
</script>