<?php include('./admin_header.php'); ?>
<?php
    $genres=Genre::all();
?>
<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="genre">
                <?php foreach($genres as $genre):?>
                    <a href="./../admin/single_genre.php?id=<?=$genre->id?>">
                        <div class="genre__item">
                            <img src="./../app/storage/uploads/genres/<?=$genre->image?>">
                            <p class="genre__name"><?=$genre->name?></p>
                        </div>
                    </a>
                    <?php endforeach?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('./admin_footer.php');?>