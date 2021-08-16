<?php 
    session_start();
    include '../Admin/Includes/Components/connection.php';
    include 'Includes/Functions/function.php';
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>MyShopping</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="icon" href="../Admin/Layout/images/souqcom.png">
        <link rel="stylesheet" href="Layout/css/bootstrap.min.css">
        <link rel="stylesheet" href="Layout/css/font-awesome.min.css">
        <link rel="stylesheet" href="Layout/scss/main.css">
    </head>
    <body>
<div id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="#" class="btn btn-success btn-sm">
                        <?php 
                            if(!isset($_SESSION['user_name'])){
                                echo "Welcome Guest";
                                
                            }
                            else{
                                echo "Welcome " . $_SESSION['user_name'] . "";
                            }
                        ?>
                    </a>
                    <a href="../cart.php"><?php getALLItem(); ?> Item In Your Cart | Total Price: $<?php getTotalPrice(); ?></a>
                </div>
                <div class="col-md-6">
                    <ul class="menu">
                        <?php 
                            if(!isset($_SESSION['user_name'])){
                                echo "
                                    <li>
                                        <a href='../user-register.php'><i class='fa fa-user-plus' aria-hidden='true'></i> Register</a>
                                    </li>
                                ";
                            }
                        ?>
                        <li> 
                            <?php 
                                if(isset($_SESSION['user_name'])){
                                    echo "<a href='my-account.php?my_orders'><i class='fa fa-user' aria-hidden='true'></i> My Account</a>";
                                }
                                else{
                                    echo "<a href='../login.php'><i class='fa fa-user' aria-hidden='true'></i> My Account</a>";
                                }
                            ?>
                        </li>
                        <li>
                            <a href="../cart.php">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Go To Cart
                            </a>
                        </li>
                        <li>
                            <?php 
                                if(!isset($_SESSION['user_name'])){
                                    echo "<a href='../login.php'><i class='fa fa-sign-in' aria-hidden='true'></i> Login</a>";
                                }
                                else{
                                    echo "<a href='Includes/Components/logout.php'><i class='fa fa-sign-out' aria-hidden='true'></i> Log Out</a>";
                                }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</div>
<div id="navbar" class="navbar navbar-default navbar-box">
    <div class="container">
        <div class="navbar-header row">
            <a href="../index.php" class="navbar-brand col-md-2">
                <img src="../Admin/Layout/images/souqcom.png">
            </a>
            <button class="navbar-toggler d-md-none" type="button" data-toggle="collapse" data-target="#navigation">
                <span class="sr-only">Toggle Navigation</span>
                <i class="fa fa-align-justify"></i>
            </button>
            <button class="navbar-toggler d-md-none" type="button" data-toggle="collapse" data-target="#search">
                <span class="sr-only">Toggle Search</span>
                <i class="fa fa-search"></i>
            </button>
            <div class="navbar-collapse collapse d-md-block col-md-10 navigation" id="navigation">
                <div class="padding-nav float-left">
                    <ul class="nav left float-left">
                        <li>
                            <a href="../index.php">HOME</a>
                        </li>
                        <li>
                            <a href="../shop.php">SHOP</a>
                        </li>
                        <li class="<?php if($active == 'MY ACCOUNT') echo 'active';?>">
                            <?php
                                if(isset($_SESSION['user_name'])){
                                    echo "<a href='my-account.php?my_orders'>MY ACCOUNT</a>";
                                }
                                else{
                                    echo "<a href='../login.php'>MY ACCOUNT</a>";
                                }
                            ?>
                        </li>
                        <li>
                            <a href="../cart.php">SHOPPING CART</a>
                        </li>
                        <li>
                            <a href="../contact.php">CONTACT US</a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <a href="../cart.php" class="float-right cart">
                    <i class="fa fa-shopping-cart"></i> <?php getAllItem();?>
                </a>
            </div>
            <div class="collapse search-box" id="search">
                    <form method="GET" action="" enctype="multipart/form-data" class="navbar-form" onsubmit="return check();">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search" id="header-search">
                            <button type="submit" class="btn btn-primary search" id="search-btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
            </div>
        </div>
        
    </div>
</div>