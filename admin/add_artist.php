<?php
   include('./admin_header.php');
   global $session;  
   if($session->auth==2){
      return redirect('./dashboard.php');
   }

   $message="";

   if(isset($_POST['submit'])){

      $artist=Artist::create([
         'name'=>$_POST['name'],
         'country'=>$_POST['country'],
         'profile'=>$_POST['description'],         
         'band'=>$_POST['band'],         
      ]);      

      if(isset($_FILES['avatar']) && !empty($_FILES['avatar'])){
         $image_path=Artist::uploadImage($artist->id,$_FILES['avatar']);

         if($image_path!=''){
            $update=Artist::update($artist->id,[
               'avatar'=>$image_path
            ]);

            if($update){
               $message='The new artist created successfully';
            }
         }
      }
   
   }
?>
<div class="main-content-inner">
   <div class="row">
      <div class="col-12 mt-5">
         <div class="card">
            <div class="card-body">
               <form action="./add_artist.php" class="dashboard__form" method="POST" enctype="multipart/form-data">                  
                  <h4 class="header-title">Add New Artist</h4>
                  <p class="text-muted font-14 mb-4">Create a new artist providing the details.</p>
                  <?if($message!=''):?>
                     <div class="dashboard__success-msg">
                        <?=$message?>
                     </div>
                  <?endif?>
                  <div class="form-group">
                     <label for="example-text-input" class="col-form-label">Name</label>
                     <input class="form-control" name="name" type="text" placeholder="Artist Name"id="example-text-input" required>
                  </div>
                  <div class="form-group">
                     <label for="example-text-input" class="col-form-label">Country</label>
                     <input class="form-control" name="country" type="text" placeholder="Artist's country"id="example-text-input" required>
                  </div>
                  <div class="form-group">
                     <label for="example-text-input" class="col-form-label">Band</label>
                     <input class="form-control" name="band" type="text" placeholder="Band"id="example-text-input" required>
                  </div>
                  <div class="form-group">
                     <label class="col-form-label">Short description/portfolio</label><br>
                     <textarea class="form-control" aria-label="With textarea" name="description"></textarea>
                  </div>
                  <div class="form-group">
                     <label for="example-text-input" class="col-form-label">Album Poster Image</label><br>
                     <input type="file" name="avatar" class="form-control" required>
                  </div>
                                 
                  <div class="input-group">                                
                     <button type="submit" name="submit" class="btn btn-primary mt-4 pr-4 pl-4">Create artist</button>                                 
                  </div>                      
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<?php include('./admin_footer.php')?>
<script>
    CKEDITOR.replace( 'description' );
</script>