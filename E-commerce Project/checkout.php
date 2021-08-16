<?php 
    $active = 'MY ACCOUNT';
    include 'Includes/Components/header.php'; 
?>

        <div class="breadcrumb-box" id="breadcrumb-box"><!-- breadcrumb-box Start -->
            <div class="container"> <!-- container Start -->
                <div class="col-md-12"> <!-- col-md-12 Start -->
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Register
                        </li>
                    </ul>
                </div> <!-- col-md-12 Finish -->
            </div> <!-- container Finish -->
        </div><!-- breadcrumb-box Finish -->
        <div class="register">
            <div class="container">
                <div class="row">
                    <?php
                        include 'Includes/Components/sidebar.php';
                    ?>
                    <div class="col-md-8" style="padding-right:0">
                        <?php 
                            if(isset($_SESSION['user_email'])){
                                include "Includes/Components/payment.php";
                            }
                            else{
                                echo "<script>window.open('login.php','_self');</script>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
            include 'Includes/Components/footer.php';
        ?>
    </body>
</html> 