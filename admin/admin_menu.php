<?php              
    global $session;        
    if(isset($_POST['logout'])){
        $session->logout();
    }
?>
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html"><img src="../resources/plugin/images/icon/logo_music.png" alt="logo"></a>
        </div>
    </div>    
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <?php if($session->auth==1):?>
                    <ul class="metismenu" id="menu">
                        <li>
                            <a href="./dashboard.php" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                            
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layers-alt"></i><span>Albums</span></a>
                            <ul class="collapse">
                                <li><a href="./add_album.php">Create New</a></li>
                                <li><a href="./all_album.php">List All</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-microphone"></i><span>Artists</span></a>
                            <ul class="collapse">
                                <li><a href="./add_artist.php">Add new</a></li>
                                <li><a href="./all_artist.php">List all</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-list-thumb"></i><span>Genres</span></a>
                            <ul class="collapse">
                            <li><a href="./add_genre.php">Add new</a></li>
                                <li><a href="./all_genre.php">List all</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-music"></i><span>Music</span></a>
                            <ul class="collapse">
                            <li><a href="./add_music.php">Add new</a></li>
                                <li><a href="./all_music.php">List all</a></li>
                            </ul>
                        </li>
                    </ul>
                <?elseif($session->auth==2):?>
                    <ul class="metismenu" id="menu">
                        <li>
                            <a href="./dashboard.php" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                            
                        </li>
                        <li>
                            <a href="./all_album.php" aria-expanded="true"><i class="ti-layers-alt"></i><span>Albums</span></a>
                            
                        </li>
                        <li>
                            <a href="./all_artist.php" aria-expanded="true"><i class="ti-microphone"></i><span>Artists</span></a>
                            
                        </li>
                        <li>
                            <a href="./all_genre.php" aria-expanded="true"><i class="ti-layout-list-thumb"></i><span>Genres</span></a>
                            
                        </li>
                        
                    </ul>
                <?endif;?>
            </nav>
        </div>
    </div>
</div>
<div class="main-content">
            <!-- header area start -->
    <div class="header-area">
        <div class="row align-items-center">
            <!-- nav and search button -->
            <div class="col-md-6 col-sm-8 clearfix">
                <div class="nav-btn pull-left">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="search-box pull-left">
                    <form action="#">
                        <input type="text" name="search" placeholder="Search..." required>
                        <i class="ti-search"></i>
                    </form>
                </div>
            </div>
            <!-- profile info & task notification -->
            <div class="col-md-6 col-sm-4 clearfix">
                <ul class="notification-area pull-right">
                    <li id="full-view"><i class="ti-fullscreen"></i></li>
                    <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                    <li class="dropdown">
                        <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                            <span>2</span>
                        </i>
                        <div class="dropdown-menu bell-notify-box notify-box">
                            <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                            <div class="nofity-list">
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                    <div class="notify-text">
                                        <p>You have Changed Your Password</p>
                                        <span>Just Now</span>
                                    </div>
                                </a>
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                    <div class="notify-text">
                                        <p>New Commetns On Post</p>
                                        <span>30 Seconds ago</span>
                                    </div>
                                </a>
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                    <div class="notify-text">
                                        <p>Some special like you</p>
                                        <span>Just Now</span>
                                    </div>
                                </a>
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                    <div class="notify-text">
                                        <p>New Commetns On Post</p>
                                        <span>30 Seconds ago</span>
                                    </div>
                                </a>
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                    <div class="notify-text">
                                        <p>Some special like you</p>
                                        <span>Just Now</span>
                                    </div>
                                </a>
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                    <div class="notify-text">
                                        <p>You have Changed Your Password</p>
                                        <span>Just Now</span>
                                    </div>
                                </a>
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                    <div class="notify-text">
                                        <p>You have Changed Your Password</p>
                                        <span>Just Now</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"><span>3</span></i>
                        <div class="dropdown-menu notify-box nt-enveloper-box">
                            <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                            <div class="nofity-list">
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb">
                                        <img src="../resources/plugin/images/author/author-img1.jpg" alt="image">
                                    </div>
                                    <div class="notify-text">
                                        <p>Aglae Mayer</p>
                                        <span class="msg">Hey I am waiting for you...</span>
                                        <span>3:15 PM</span>
                                    </div>
                                </a>
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb">
                                        <img src="../resources/plugin/images/author/author-img2.jpg" alt="image">
                                    </div>
                                    <div class="notify-text">
                                        <p>Aglae Mayer</p>
                                        <span class="msg">When you can connect with me...</span>
                                        <span>3:15 PM</span>
                                    </div>
                                </a>
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb">
                                        <img src="../resources/plugin/images/author/author-img3.jpg" alt="image">
                                    </div>
                                    <div class="notify-text">
                                        <p>Aglae Mayer</p>
                                        <span class="msg">I missed you so much...</span>
                                        <span>3:15 PM</span>
                                    </div>
                                </a>
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb">
                                        <img src="../resources/plugin/images/author/author-img4.jpg" alt="image">
                                    </div>
                                    <div class="notify-text">
                                        <p>Aglae Mayer</p>
                                        <span class="msg">Your product is completely Ready...</span>
                                        <span>3:15 PM</span>
                                    </div>
                                </a>
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb">
                                        <img src="../resources/plugin/images/author/author-img2.jpg" alt="image">
                                    </div>
                                    <div class="notify-text">
                                        <p>Aglae Mayer</p>
                                        <span class="msg">Hey I am waiting for you...</span>
                                        <span>3:15 PM</span>
                                    </div>
                                </a>
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb">
                                        <img src="../resources/plugin/images/author/author-img1.jpg" alt="image">
                                    </div>
                                    <div class="notify-text">
                                        <p>Aglae Mayer</p>
                                        <span class="msg">Hey I am waiting for you...</span>
                                        <span>3:15 PM</span>
                                    </div>
                                </a>
                                <a href="#" class="notify-item">
                                    <div class="notify-thumb">
                                        <img src="../resources/plugin/images/author/author-img3.jpg" alt="image">
                                    </div>
                                    <div class="notify-text">
                                        <p>Aglae Mayer</p>
                                        <span class="msg">Hey I am waiting for you...</span>
                                        <span>3:15 PM</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="settings-btn">
                        <i class="ti-settings"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- header area end -->
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Music</h4>
                    <!-- <ul class="breadcrumbs pull-left">
                        <li><a href="index.html">Home</a></li>
                        <li><span>Datatable</span></li>
                    </ul> -->
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">
                    <img class="avatar user-thumb" src="../resources/plugin/images/author/avatar.png" alt="avatar">
                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
                    <?php
                        global $session;
                        echo ucfirst($session->user_name)
                    ?>
                    <i class="fa fa-angle-down"></i></h4>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Message</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <form action="" class="dropdown-item" method="POST"> 
                            <button for="logout"  type="submit" name="logout" >
                                Logout
                            </button>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>



<!--<div class="sidebar">
    <ul class="sidebar__items">
        <li class="sidebar__item sidebar__item--dashboard"><a href="./dashboard.php" class="sidebar__item-link">Dashboard</a></li>
        <li class="sidebar__item"><a href="./all_album.php" class="sidebar__item-link">Albums</a></li>
        <li class="sidebar__item"><a href="./add_artist.php" class="sidebar__item-link">Add new Artist</a></li>
        <li class="sidebar__item"><a href="./all_artist.php" class="sidebar__item-link">Artists</a></li>       
        <li class="sidebar__item"><a href="./add_album.php" class="sidebar__item-link">Add new Album</a></li>       
        <li class="sidebar__item"><a href="" class="sidebar__item-link">Settings</a></li>
    </ul>
</div>-->