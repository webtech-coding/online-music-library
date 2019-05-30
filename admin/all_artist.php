
<?php include('./admin_header.php');?>

<div class="main-content-inner">
   <div class="row">
      <div class="col-12 mt-5">
            <?php $artists=Artist::all();?>
            <div class="genre">
                <?php foreach($artists as $artist):?>
                    <a href="./single_artist.php?id=<?=$artist->id?>">                       
                        <img  src="<?=(!empty($artist->avatar)?'./../app/storage/uploads/artists/'.$artist->avatar : './../app/storage/uploads/artists/singer.jpg')?>">
                       
                        <div class="genre__name"><?=$artist->name?><span class="genre__seperator"></span><?=$artist->country?></div>
                        
                    </a>            
                <?endforeach?>
            </div>
        </div>
    </div>
</div>
   
   
<?include('./admin_footer.php');?>
