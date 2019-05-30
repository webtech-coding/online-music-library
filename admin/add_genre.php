<?php include('./admin_header.php'); ?>
<?php
    if($session->auth==2){
    return redirect('./dashboard.php');
    }
?>
<?php
    $message="";
    if(isset($_POST['submit'])){
        $genre=Genre::create([
                'name'=>$_POST['name']
        ]);
               
        if(isset($_FILES['image']) && !empty($_FILES['image'])){
            $image_path=Genre::uploadImage($genre->id,$_FILES['image']);
            if($image_path!=""){
                $update=Genre::update($genre->id,[
                    'image'=>$image_path
                ]);
                if($update){
                    $message="New genre created";
                }
            }
        }        
    }
?>
<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-5">
                <div class="card">
                    <form action="./add_genre.php" method="POST" enctype="multipart/form-data"> 
                        <div class="card-body">
                            <h4 class="header-title">Add new Genres</h4>
                            <p class="text-muted font-14 mb-4">Provid name and an image to new genre.</p>
                            <?if($message!=''):?>
                                <div class="dashboard__success-msg">
                                    <?=$message?>
                                </div>
                            <?endif?>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Name</label>
                                <input class="form-control" name="name" type="text" placeholder="Genre Name"id="example-text-input" required>
                            </div>

                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Image</label><br>
                                <input type="file" name="image">
                            </div>
                            
                            <div class="input-group">                                
                                <button type="submit" name="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>                                 
                            </div>                                                                     
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('./admin_footer.php');?>