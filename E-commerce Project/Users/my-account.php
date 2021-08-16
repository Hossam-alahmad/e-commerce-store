<?php 
    include 'Includes/Components/header.php';
?>
    <div class="breadcrumb-box" id="breadcrumb-box"> <!-- breadcrumb-box Start -->
        <div class="container"> <!-- container Start -->
            <div class="col-md-12"> <!-- col-md-12 Start -->
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        My Account
                    </li>
                </ul>
            </div> <!-- col-md-12 Finish -->
        </div> <!-- container Finish -->
    </div> <!-- breadcrumb-box Finish -->
    <div class="account-content">
        <div class="container">
            <div class="row">
                <?php  
                    include 'Includes/Components/user-sidebar.php';
                ?>
                <div class="col-md-8 col-lg-9">
                    <div class="box">
                        <?php if(isset($_GET['my_orders'])) {
                                include 'Includes/Components/my-orders.php';
                            }
                        ?>
                        <?php if(isset($_GET['pay_offline'])) {
                                include 'Includes/Components/pay-offline.php';
                            }
                        ?>
                        <?php if(isset($_GET['edit_account'])) {
                                include 'Includes/Components/edit-account.php';
                            }
                        ?>
                        <?php if(isset($_GET['change_pass'])) {
                                include 'Includes/Components/change-pass.php';
                            }
                        ?>
                        <?php if(isset($_GET['delete_account'])) {
                                include 'Includes/Components/delete-account.php';
                            }
                        ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <?php
        if(isset($_GET['change_pass'])) {
            $content = "Password Changed Successfully";
            include 'Includes/Components/notification.php';
        }
        else if(isset($_GET['edit_account'])){
            $content = "Edit Successfully";
            include 'Includes/Components/notification.php';
        }
        include 'Includes/Components/footer.php';
    ?>
    
    <script src="Layout/js/jquery-3.4.1.min.js"></script>
    <script src="Layout/js/popper.min.js"></script>
    <script src="Layout/js/bootstrap.min.js"></script>
    <script src="Layout/js/header-search.js"></script>
    <script src="Layout/js/upload-image.js"></script>
    <?php 
        if(isset($_GET['change_pass'])) {
            echo "<script src='Layout/js/change-pass2.js'></script>";
        }
        else if(isset($_GET['edit_account'])){
            echo "<script src='Layout/js/check-edit.js'></script>";
        }
    ?>
    </body>
</html> 