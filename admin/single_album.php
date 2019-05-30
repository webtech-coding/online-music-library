<?php include('./admin_header.php');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }else{
        return redirect('./dashboard.php');
    }
    
    $album=Album::id($id);
    $songs=Song::song_by_album_id($id);   
?>

<div class="main-content-inner">
   <div class="row">
        <div class="col-12 mt-5">
            <div class="music" data-id="<?=$id?>" data-class="album">
                <div class="music__banner">
                    <img src="./../app/storage/uploads/albums/<?=$album->image?>" alt="" class="music__banner-img">
                    <h2 class="music__banner-title"><?=$album->name?></h2>
                    <div class="music__banner-artist">Album artist<span class="genre__seperator"></span><?=$album->year?></div>
                    <div class="music__banner-button">
                        <button class="music__banner--btn">Play Album</button>
                    </div>
                    <div class="music__banner-artist"><?=count($songs)?> <span class="music__banner-total">song(s)</span></div>
                    <div class="music__description">
                    <?=$album->description?>
                    </div>
                </div>
                <div class="music__lists">
                    <!--lists of songs from album-->
                </div>
            </div>
        </div>
    </div>
</div>



<script src="./../resources/js/getMusic.js"></script>
<script>
    var music =new GetMusic()
    music.getMusicLists('album')
</script>
<?php include('./../app/includes/audioplayer.php')?>
<script src="./../resources/js/player.js"></script>

<?include('./admin_footer.php');?>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        new Player()
    })
</script>