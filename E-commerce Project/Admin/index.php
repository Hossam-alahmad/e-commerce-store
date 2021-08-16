<?php 
    session_start(); 
    include "Includes/Components/connection.php";
    include "Includes/Functions/functions.php";
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self');</script>";
    }
    else{
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Dashboard</title>
        <link rel="icon" href="Layout/images/souqcom.png">
        <link rel="stylesheet" href="Layout/css/bootstrap.min.css">
        <link rel="stylesheet" href="Layout/css/font-awesome.min.css">  
        <link rel="stylesheet" href="Layout/css/main.css";
    </head>
    <body style="background-color:#fff;">
        <div id="wrapper">
            <?php include "Includes/Components/sidebar.php" ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <?php if(isset($_GET['dashboard'])){
                            include "Includes/Components/dashboard.php";
                        }
                        else if(isset($_GET['insert_product'])){
                            include "Includes/Components/insert-product.php";
                        }
                        else if(isset($_GET['view_products'])){
                            include "Includes/Components/view-products.php";
                        }
                        else if(isset($_GET['edit_product'])){
                            include "Includes/Components/edit-product.php";
                        }
                        else if(isset($_GET['insert_p_cat'])){
                            include "Includes/Components/ins-p-category.php";
                        }
                        else if(isset($_GET['view_p_cats'])){
                            include "Includes/Components/view-p-categories.php";
                        }
                        else if(isset($_GET['edit_p_cat'])){
                            include "Includes/Components/edit-p-category.php";
                        }
                        else if(isset($_GET['insert_slide'])){
                            include "Includes/Components/insert-slide.php";
                        }
                        else if(isset($_GET['view_slides'])){
                            include "Includes/Components/view-slides.php";
                        }
                        else if(isset($_GET['edit_slide'])){
                            include "Includes/Components/edit-slide.php";
                        }
                        else if(isset($_GET['view_users'])){
                            include "Includes/Components/view-users.php";
                        }
                        else if(isset($_GET['view_orders'])){
                            include "Includes/Components/view-orders.php";
                        }
                        else if(isset($_GET['view_payments'])){
                            include "Includes/Components/view-payments.php";
                        }
                        else if(isset($_GET['view_admins'])){
                            include "Includes/Components/view-admins.php";
                        }
                        else if(isset($_GET['insert_admin']) && $_SESSION['admin_level'] == 1){
                            include "Includes/Components/insert-admins.php";
                        }
                        else if(isset($_GET['admins_level']) && $_SESSION['admin_level'] == 1){
                            include "Includes/Components/admins-level.php";
                        }
                        else if(isset($_GET['admin_id']) && $_SESSION['admin_level'] == 1){
                            include "Includes/Components/edit-level.php";
                        }
                        else if(isset($_GET['insert_boxes'])){
                            include "Includes/Components/insert-boxes.php";
                        }
                        else if(isset($_GET['view_boxes'])){
                            include "Includes/Components/view-boxes.php";
                        }
                        else if(isset($_GET['edit_boxes'])){
                            include "Includes/Components/edit-boxes.php";
                        }
                        else if(isset($_GET['admin_profile'])){
                            include "Includes/Components/admin-profile.php";
                        }
                    ?>
                </div>
            </div>
        </div>
        <script src="Layout/js/jquery-3.4.1.min.js"></script>
        <script src="Layout/js/popper.min.js"></script>
        <script src="Layout/js/bootstrap.min.js"></script>
        <script src="Layout/js/fixed-nav.js"></script>
        <script src="Layout/js/sidebar-collapse.js"></script>
        <?php 
            if(isset($_GET['insert_product'])){
                echo "<script src='Layout/js/tinymce/tinymce.min.js'></script>
                        <script>tinymce.init({
                                    selector: 'textarea',
                                    plugins: [
                                        'advlist autolink lists link image charmap print preview anchor',
                                        'searchreplace visualblocks code fullscreen',
                                        'insertdatetime media table contextmenu paste'
                                    ],
                                    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft  aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
                                });
                        </script>";
            }
            else if(isset($_GET['view_products'])){
                echo "<script src='Layout/js/search-product.js'></script>";
            }
            else if(isset($_GET['view_p_cats'])){
                echo "<script src='Layout/js/search-p-category.js'></script>";
            }
            else if(isset($_GET['view_slides'])){
                echo "<script src='Layout/js/search-slide.js'></script>";
            }
            else if(isset($_GET['view_users'])){
                echo "<script src='Layout/js/search-user.js'></script>";
            }
            else if(isset($_GET['view_orders'])){
                echo "<script src='Layout/js/search-orders.js'></script>";
            }
            else if(isset($_GET['view_payments'])){
                echo "<script src='Layout/js/search-payments.js'></script>";
            }
            else if(isset($_GET['view_admins'])){
                echo "<script src='Layout/js/search-admin.js'></script>";
            }
            else if(isset($_GET['insert_admin'])){
                echo "<script src='Layout/js/ins-admin-validate2.js'></script>";
                echo "<script src='Layout/js/ins-admin-validate.js'></script>";
            }
            else if(isset($_GET['admin_id'])){
                echo "<script src='Layout/js/edit-admin-level.js'></script>";
            }
            else if(isset($_GET['admin_profile'])){
                echo "<script src='Layout/js/upload-image.js'></script>";
                echo "<script src='Layout/js/admin-profile.js'></script>";
                echo "<script src='Layout/js/change-password.js'></script>";
            }

        ?>
    </body>
</html>
        <?php } ?>