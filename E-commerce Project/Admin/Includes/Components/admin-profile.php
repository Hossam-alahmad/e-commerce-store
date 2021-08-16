<div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-user"></i> Admin Profile</h4>
            <div class="table-product table-responsive">
                <div class="header row">
                    <div class="admin-image" data-text="Change Picture">
                        <form method="POST" enctype="multipart/form-data" id="form">
                            <input type="file" name="admin_image" class="img-file" id="admin_image">
                        </form>
                        <?php 
                            $getAdminInfo = $con->prepare("SELECT * FROM admins where  admin_name = ? AND admin_email = ?");
                            $getAdminInfo->execute([$_SESSION['admin_name'],$_SESSION['admin_email']]);
                            $result = $getAdminInfo->fetch(PDO::FETCH_ASSOC);
                            $admin_img = $result['admin_image'];
                            $admin_name = strtoupper($_SESSION['admin_name'][0]);
                            $admin_first = $result['first_name'];
                            $admin_last = $result['last_name'];
                            $admin_email = $result['admin_email'];
                            $admin_birth = $result['admin_birth'];
                            $admin_country = $result['admin_country'];
                            $admin_city = $result['admin_city'];
                            $admin_desc = $result['admin_desc'];
                            $admin_gender = $result['admin_gender'];
                            $admin_level = $result['admin_level'];
                            if(!$admin_img == ""){

                                echo "<img src='Layout/images/admins-images/$admin_img' alt='User Picture'>";
                            }
                            else{
                                echo "<div class='avatar'><span>$admin_name</span></div>";
                            }
                        ?>
                    </div>
                    <div class="admin-name col-md-6" id="admin-header">
                        <h3><?php echo $_SESSION['admin_name'];?></h3>
                        <p data-text="Edit" id="description"><?php echo $admin_desc; ?></p>
                        <textarea class="form-control admin-desc" id="admin-desc" rows="4" style="display:none;" maxlength="150" name="admin_desc"></textarea>
                    </div>
                </div>
                <?php
                    if(!isset($_GET['change_pass'])){
                        include "Includes/Components/admin-info.php";
                    }
                    else if(isset($_GET['change_pass'])){
                        include "Includes/Components/change-pass.php";
                    }
                ?>
            </div>
        </div>
    </div>
    
