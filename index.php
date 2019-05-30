<?php include('./app/includes/header.php')?>

<div class="home">
    <div class="home__picture"></div>
    <div class="home__cover">
        <h1 class="home__heading"><span class="home__heading-title">Online Music Library</span></h1>
        <p class="home__sub-heading">
            Offering the best music library worldwide.
        </p>
       
        <?php              
            if($_SERVER['REQUEST_URI']=='/music/login.php' || $_SERVER['REQUEST_URI']=='/music/register.php'){
                echo '<a class="home__button" href="/music">Home </a>';
            }else{
                    echo '<a class="home__button" href="login.php">Login </a>';
            }
        ?>   
         <a class="home__button" href="./register.php"> Register now</a>
    </div>
</div>

</body>
</html>
    
