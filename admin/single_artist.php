<?php include('./admin_header.php');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }else{
        return redirect('./dashboard.php');
    }
    $sql="SELECT songs.song AS song, songs.title AS song_title, albums.name AS album_name, albums.id AS album_id
    FROM songs
    INNER JOIN albums ON songs.album_id=albums.id
    WHERE songs.artist_id=$id";
    $songs=Model::sql($sql);
    
?>

<div class="main-content-inner">
   <div class="row">
        <div class="col-12 mt-5">
            <div class="music music__artist" data-id="<?=$id?>" data-class="album">
                <?php $artist=Artist::id($id);?>
                <div class="music__banner music__banner--artist">
                    <div>
                        <img src="./../app/storage/uploads/artists/<?=$artist->avatar?>" alt="" class="music__banner-img">
                    </div>

                    <div class="music__banner--detail">
                        <h2 class="music__banner-title"><?=$artist->name?></h2>
                        <div class="music__banner-artist"><?=$artist->country?><span class="genre__seperator"></span><?=$artist->band?></div>
                        <div class="music__banner-button">
                            <button class="music__banner--btn">Play All</button>
                        </div>
                        <div class="music__banner-artist"><?=count($songs)?> <span class="music__banner-total">song(s)</span></div>
                        <div class="music__description music__description--artist">
                            <?=$artist->profile?>
                        </div>
                    </div>
                </div>
                <div class="music__lists music__lists--artist">
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
                        
                    <?endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('./../app/includes/audioplayer.php')?>

<?include('./admin_footer.php');?>
<script src="./../resources/js/player.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        new Player()
    })
</script>
