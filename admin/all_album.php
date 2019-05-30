
<?php include('./admin_header.php');?>


<div class="main-content-inner">
   <div class="row">
      <div class="col-12 mt-5">
        <?php $albums=Album::all();?>
            <div class="genre">
                <?php foreach($albums as $album):?>
                    <a href="./single_album.php?id=<?=$album->id?>">
                        <img  src="<?=(!empty($album->image)?'./../app/storage/uploads/albums/'.$album->image : './../app/storage/uploads/albums/album.jpg')?>" class="dashboard__artist-img">
                        <div class="genre__name"><?=$album->name?><span class="genre__seperator"></span><?=$album->year?></div>
                    </a>            
                <?endforeach?>
            </div>
        </div>         
    </div>
</div>

<?include('./admin_footer.php');?>