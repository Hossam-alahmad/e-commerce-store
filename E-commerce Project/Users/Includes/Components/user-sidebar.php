<div class="sidebar sidebar-box col-md-4 col-lg-3">
    <div class="sidebar-menu">
        <div class="user-box">
            <center>
                <form method="POST" enctype="multipart/form-data" id="form">
                    <input type="file" name="user_image" class="img-file" id="user_image">
                </form>
                <?php 
                    $getUserInfo = $con->prepare("SELECT * FROM users where  user_name = ? AND user_email = ? AND user_ip = ?");
                    $getUserInfo->execute([$_SESSION['user_name'],$_SESSION['user_email'],$_SESSION['user_ip']]);
                    $result = $getUserInfo->fetch(PDO::FETCH_ASSOC);
                    $user_img = $result['user_image'];
                    $user_name = strtoupper($_SESSION['user_name'][0]);
                    if(!$user_img == ""){

                        echo "<img src='Layout/images/users-image/$user_img' alt='User Picture'>";
                    }
                    else{
                        echo "<div class='avatar'><span>$user_name</span></div>";
                    }
                ?>
            </center>
            <h5 class="user-name text-center">
                <?php 
                    echo $_SESSION['user_name'];
                ?>
            </h5>
        </div>                
        <div class="sidebar-body">
            <ul class="nav-pills nav-stacked nav">
                <li class="<?php if(isset($_GET['my_orders'])){ echo 'active';}?>">
                    <a href="my-account.php?my_orders">
                        <i class="fa fa-list"></i> My Orders
                    </a>
                </li>
                <li class="<?php if(isset($_GET['pay_offline'])){ echo 'active';}?>">
                    <a href="my-account.php?pay_offline">
                        <i class="fa fa-bolt"></i> Pay Offline
                    </a>
                </li>
                <li class="<?php if(isset($_GET['edit_account'])){ echo 'active';}?>">
                    <a href="my-account.php?edit_account">
                        <i class="fa fa-pencil"></i> Edit Account
                    </a>
                </li>
                <li class="<?php if(isset($_GET['change_pass'])){ echo 'active';}?>">
                    <a href="my-account.php?change_pass">
                        <i class="fa fa-lock"></i> Change Password
                    </a>
                </li>
                <li class="<?php if(isset($_GET['delete_account'])){ echo 'active';}?>">
                    <a href="my-account.php?delete_account">
                        <i class="fa fa-trash-o"></i> Delete My Account
                    </a>
                </li>
                <li>
                    <a href="Includes/Components/logout.php">
                        <i class="fa fa-sign-out"></i> Log Out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
