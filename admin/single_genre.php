<?php include('./admin_header.php');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }else{
        return redirect('./dashboard.php');
    }
    
    $genre=Genre::id($id);
    $albums_by_genre=Album::sql("SELECT * FROM albums WHERE genre_id='$id'");

    $sql="SELECT
    albums.name AS album_name, albums.id AS album_id,
    songs.id AS song_id, songs.title AS song_title, songs.song AS song
    FROM albums
    INNER JOIN songs ON albums.id=songs.album_id WHERE albums.genre_id='$id'";
    $songs=Model::sql($sql);
  
    $album=Album::id($id);
   
?>

<div class="main-content-inner">
   <div class="row">
        <div class="col-12 mt-5">
            <div class="music" data-id="<?=$id?>" data-class="album">
                <div class="music__banner">
                    <img src="./../app/storage/uploads/genres/<?=$genre->image?>" alt="" class="music__banner-img">
                    <h2 class="music__banner-title"><?=$genre->name?></h2>
                    
                    <div class="music__banner-artist"><?=count($albums_by_genre)?> Album(s)<span class="genre__seperator"></span><?=count($songs)?> <span>Song(s)</span></div>
                   
                    <div class="music__banner-button">
                        <button class="music__banner--btn">Play All</button>
                    </div>
                </div>
                <div class="music__lists">
                   <?foreach($songs as $song):?>
                    <div class="song__list" data-music="<?=$song->song?>">
                        <div>
                            <i class="ti-music song__list-icon"></i>
                            <span class="song__list-name"><?=$song->song_title?></span>
                            <div class="song__detail">
                                <a href="./single_album.php?id=<?=$song->album_id?>"><span class="song__artist"><?=$song->album_name?></a></span>
                            </div>
                        </div>
                
                        <div class="song__list-menu">
                            <div class="song__list-dots">....</div>
                            
                        </div>
                    </div>
                   <?endforeach?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('./../app/includes/audioplayer.php')?>

<script src="./../resources/js/getMusic.js"></script>

<script src="./../resources/js/player.js"></script>

<?include('./admin_footer.php');?>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        new Player()
    })
</script>