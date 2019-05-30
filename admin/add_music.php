<?php
   include('./admin_header.php');
   global $session;  
   if($session->auth==2){
      return redirect('./dashboard.php');
   }

   if(!isset($_GET['album'])){
      return redirect('./add_album.php');
   }

   $message="";

   $id=$_GET['album'];

   if(isset($_POST['music'])){
        $titles=$_POST['title'];
        $songs=$_FILES['song'];

        if(!Song::uploadMedia($titles,$songs,$id)){
            $message='Not an audio file format';
        }else{
            $message='Audio uploaded successfully';
        }
   }

   $album=Album::id($id);

?>
<div class="dashboard__content">
   <h2 class="dashboard__title">Add music</h2>
   <?if($message!=''):?>
      <div class="dashboard__success-msg">
         <?=$message?>
      </div>
   <?endif?>
   <div class="dashboard__music">
       <div class="dashboard__music-img">
            <img src="./../app/storage/uploads/artists/singer.jpg">
       </div>
       <div class="dashboard__music-description">
           <h2><?=$album->name?></h2>
           <p><span class="dashboard__music-description--brand">Band</span><?=$album->band?></p>
           <p><span class="dashboard__music-description--brand">Genre</span><?=$album->genre?></p>
           <p><span class="dashboard__music-description--brand">Language</span><?=$album->language?></p>
       </div>
   </div>
   <form action="./add_music.php?album=<?=$id?>" class="dashboard__form" method="POST" enctype="multipart/form-data">
      <div class="dashboard__form-control" id="add-new-button">
            <span class="dashboard__form-button">Add New song</span>
      </div>

      <div class="dashboard__form-control" id="submit-music">
         <button type="sumit" class="dashboard__form-submit" name="music">Submit</button>
      </div>

    </form>
    
</div>
<script src="./../resources/js/addmusic.js"></script>
<?php include('./admin_footer.php')?>