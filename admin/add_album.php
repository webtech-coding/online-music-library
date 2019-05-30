<?php
   include('./admin_header.php');
   global $session;  
   if($session->auth==2){
      return redirect('./dashboard.php');
   }

   $message="";

   if(isset($_POST['submit'])){

      $album=Album::create([
         'name'=>$_POST['name'],
         'year'=>$_POST['year'],
         'genre_id'=>$_POST['genre'],
         'artist_id'=>$_POST['artist_id'],
         'description'=>$_POST['description'],
      ]);

      
      if(isset($_FILES['image']) && !empty($_FILES['image'])){
         $image_path=Album::uploadImage($album->id,$_FILES['image']);

         if($image_path!=''){
            $update=Album::update($album->id,[
               'image'=>$image_path
            ]);

            if($update){
               $message='The new album has been created successfully';
            }
         }
      }

      if(Song::uploadMedia($_POST['title'],$_POST['artist'],$_FILES['song'],$album->id)){
         $message='The new album has created successfully';
      }else{
         $message='Please upload a correct music format';
      }


   }
   $artists=Artist::all();
   $genres=Genre::all();
?>
<div class="main-content-inner">
   <div class="row">
      <div class="col-12 mt-5">
         <div class="card">
            <div class="card-body">
               <form action="./add_album.php" class="dashboard__form" method="POST" enctype="multipart/form-data">                  
                     <h4 class="header-title">Add new Album</h4>
                     <p class="text-muted font-14 mb-4">Create a new album and add related music.</p>
                     <?if($message!=''):?>
                        <div class="dashboard__success-msg">
                           <?=$message?>
                        </div>
                     <?endif?>
                     <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Name</label>
                        <input class="form-control" name="name" type="text" placeholder="Album Name"id="example-text-input" required>
                     </div>
                     <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Year</label>
                        <input class="form-control" name="year" type="text" placeholder="Published year"id="example-text-input" required>
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Select Album Artist</label>
                        <select class="form-control" name="artist_id">
                           <?php foreach($artists as $artist):?>
                              <option value="<?=$artist->id?>"><?=$artist->name?></option>
                           <?php endforeach?>
                        </select>
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Select a genre</label>
                        <select class="form-control" name="genre">
                           <?php foreach($genres as $genre):?>
                              <option value="<?=$genre->id?>"><?=$genre->name?></option>
                           <?php endforeach?>
                        </select>
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Short description</label><br>
                        <textarea class="form-control" aria-label="With textarea" name="description"></textarea>
                     </div>
                     <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Album Poster Image</label><br>
                           <input type="file" name="image" class="form-control" required>
                     </div>
                     <div class="dashboard__form-control add_new_button">
                        <span class="dashboard__form-button" id="add_song"><i class="ti-music"></i>Add New song</span>
                     </div>                  
                     <div class="input-group">                                
                        <button type="submit" name="submit" class="btn btn-primary mt-4 pr-4 pl-4">Create album</button>                                 
                     </div>                      
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include('./admin_footer.php')?>
<script src="./../resources/js/newMusic.js"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>