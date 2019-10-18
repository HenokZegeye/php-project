<?php
    session_start();
    $base_url = "http://localhost/PhpGroupProject_marketplace_final/";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>EthioGebeya : <?php echo $page_title ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url?>style/css/bootstrap.css">
        <style>
            body {
                font-family: "helveticaneuemedium";
                font-size: 20px; 
                }
        </style>
    </head>
    <body>
            <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand page-scroll" href="<?php echo $base_url?>index.php">Ethio Gebeya</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <?php if (!(isset($_SESSION['loggeduser']))) {
                                    $url = 'Pages/Seller/seller_login.php';
                                }else{
                                    $url = 'Pages/Product/newProduct.php'; 
                                }
                                ?>
                                <a class="page-scroll" href="<?php echo $base_url.$url?>">Sell</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#about">About</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#help">Help</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#contact">Contact</a>
                            </li>
                            
                            <?php
                            
                            if (isset($_SESSION['loggeduser'])) {?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['loggeduser']; ?><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Account</a></li>
                                    <li><a href="<?php echo $base_url?>Class/logout.php">Logout</a></li>
                                </ul>
                            </li>
                             <?php }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>


