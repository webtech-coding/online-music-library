<?php
ob_start();
function respond_fatal_error($messsage){
    http_response_code(500);
    die($messsage.' The site is under maintenance');
}

function redirect($path){
    header('Location:'.$path);
}
?>