<?php include('./admin_header.php')?>

 <?php 
 global $session;
   $albums=Album::all();
   $songs=Song::all();
   $genres=Genre::all();
   $users=Auth::all();
 ?>

<div class="main-content-inner">
   <h3 class="dashboard__title">Admin Dashboard</h3>
   <div class="row">
         <?if($session->auth==1):?>
        <div class="col-lg-3 mt-3">
           <div class="card dashboard__card">
              <span class="ti-user dashboard__icon"></span>
              <p class="dashboard__header">Total Users</p>
              <p class="dashboard__number">  <?=count($users)?></p>
           </div>
        </div>
        <?endif?>
        <div class="col-lg-3 mt-3">
            <div class="card dashboard__card">
              <span class="ti-music-alt dashboard__icon"></span>
              <p class="dashboard__header">Total Musics</p>
              <p class="dashboard__number dashboard__number--blue"> <?=count($songs)?></p>
           </div>
        </div>
        <div class="col-lg-3 mt-3">
            <div class="card dashboard__card">
              <span class="ti-layers-alt dashboard__icon"></span>
              <p class="dashboard__header">Total Albums</p>
              <p class="dashboard__number dashboard__number--red">  <?=count($albums)?></p>
           </div>
        </div>
        <div class="col-lg-3 mt-3">
            <div class="card dashboard__card">
              <span class="ti-files dashboard__icon"></span>
              <p class="dashboard__header">Genres</p>
              <p class="dashboard__number dashboard__number--green">  <?=count($genres)?></p>
            </div>
        </div>
    </div>
</div>

<?php include('./admin_footer.php')?>