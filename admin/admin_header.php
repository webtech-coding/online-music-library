<?php  include('./../init.php'); ?>
<?php 
    global $session;
    if($session->user_id==null){
        return redirect('../login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Music</title>
    <link rel="shortcut icon" type="image/png" href="../resources/img/icon_1.png"/>
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <!--srtdash plugin-->
    <link rel="shortcut icon" type="image/png" href="../resources/plugin/images/icon/favicon.ico">
    <link rel="stylesheet" href="../resources/plugin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/plugin/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/plugin/css/themify-icons.css">
    <link rel="stylesheet" href="../resources/plugin/css/metisMenu.css">
    <link rel="stylesheet" href="../resources/plugin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../resources/plugin/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../resources/plugin/css/typography.css">
    <link rel="stylesheet" href="../resources/plugin/css/default-css.css">
    <link rel="stylesheet" href="../resources/plugin/css/styles.css">
    <link rel="stylesheet" href="../resources/plugin/css/responsive.css">

    <link rel="stylesheet" href="../resources/css/main.css">
    
    <!-- modernizr css -->
    <script src="../resources/plugin/js/vendor/modernizr-2.8.3.min.js"></script>


</head>
<body>
<div class="page-container">            
    <?php include('./admin_menu.php');?>
        


    