<?php include('./app/includes/header.php')?>

<?php
    //CHECK FOR ADMIN
    global $session;
    if($session->is_user){
        return redirect('./admin/dashboard.php');
    }
?>

<?php
    //ERROR MESSAGE
    $error="";
    if(isset($_POST['submit']) && !empty($_POST)){
        $error=Auth::login($_POST);
    }
?>

<section class="login">
    <form action="login.php" class="login__form" method="POST">
    <p class="login__form-title">Login</p>
    <?php if($error!==""):?>
        <p class="login__error"><?=$error?></p>
    <?php endif ?>
        <div class="login__form-control">
            <label class="login__form-label">Email</label>
            <input name="email" type="text" class="login__form-input" required>
        </div>
        <div class="login__form-control">
            <label class="login__form-label">Password</label>
            <input name="password" type="password" class="login__form-input" required>
        </div>
        <div class="login__form-control">
            <button type="submit" name="submit" class="login__form-submit">Submit</button>
        </div>
    </form>
</section>

</body>
</html>
