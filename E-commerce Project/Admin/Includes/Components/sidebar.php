<nav class="navbar bg-dark navbar-dark " id="nav">
    <div class="navbar-header">
        <a href="index.php?dashboard" class="navbar-brand">Admin Dashboard</a>
    </div>
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="admin-image">
                <?php 
                        $getUserInfo = $con->prepare("SELECT * FROM admins where  admin_name = ? AND admin_email = ?");
                        $getUserInfo->execute([$_SESSION['admin_name'],$_SESSION['admin_email']]);
                        $result = $getUserInfo->fetch(PDO::FETCH_ASSOC);
                        $admin_img = $result['admin_image'];
                        $admin_name = strtoupper($_SESSION['admin_name'][0]);
                        if(!$admin_img == ""){

                            echo "<img src='Layout/images/admins-images/$admin_img' alt='User Picture'>";
                        }
                        else{
                            echo "<div class='avatar'><span>$admin_name</span></div>";
                        }
                ?>
                </div>
                <b>
                    <?php if(isset($_SESSION['admin_name'])){ echo $_SESSION['admin_name'];} ?>
                </b>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                    <a href="index.php?admin_profile">
                        <i class="fa fa-user"></i> Profile
                    </a>
                </li>
                <li>
                    <a href="index.php?view_products">
                        <i class="fa fa-envelope"></i> New Products
                        <span class="badge badge-light">
                            <?php 
                                $date = date("Y-m-d");
                                $query = $con->prepare("SELECT * FROM products where product_date = '$date'");
                                $query->execute();
                                $new_products = $query->rowCount();
                                echo $new_products;
                            ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_users">
                        <i class="fa fa-users"></i> New Users
                        <span class="badge badge-light">
                            <?php 
                                $date = date("Y-m-d");
                                $query = $con->prepare("SELECT * FROM users where user_date = '$date'");
                                $query->execute();
                                $new_users = $query->rowCount();
                                echo $new_users;
                            ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="index.php?admin_profile&change_pass">
                        <i class="fa fa-lock"></i> Change Password
                    </a>
                </li>
                <li>
                    <a href="Includes/Components/logout.php">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <span class="menu-bar" id="menu-bar"><i class="fa fa-bars"></i></span>
    <div class="collapse navbar-collapse show" id="navbar-exl-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?dashboard">
                    <i class="fa fa-fw fa-dashboard"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#products">
                    <i class="fa fa-fw fa-tag"></i> Product
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="products" class="collapse">
                    <li>
                        <a href="index.php?insert_product">
                            Insert Product
                        </a>
                        <a href="index.php?view_products">
                            View Products
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#p_cat">
                    <i class="fa fa-fw fa-edit"></i> Product Categories
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="p_cat" class="collapse">
                    <li>
                        <a href="index.php?insert_p_cat">
                            Insert Product Categories
                        </a>
                        <a href="index.php?view_p_cats">
                            View Products Categories
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#slides">
                    <i class="fa fa-fw fa-picture-o"></i> Slides
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="slides" class="collapse">
                    <li>
                        <a href="index.php?insert_slide">
                            Insert Slide
                        </a>
                        <a href="index.php?view_slides">
                            View Slides
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#boxes">
                    <i class="fa fa-suitcase" aria-hidden="true"></i> Boxes
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="boxes" class="collapse">
                    <li>
                        <a href="index.php?insert_boxes">
                            Insert Boxes
                        </a>
                        <a href="index.php?view_boxes">
                            View Boxes
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index.php?view_users">
                    <i class="fa fa-fw fa-users"></i> View Users
                </a>
            </li>
            <li>
                <a href="index.php?view_orders">
                    <i class="fa fa-fw fa-handshake-o"></i> View Orders
                </a>
            </li>
            <li>
                <a href="index.php?view_payments">
                    <i class="fa fa-fw fa-money"></i> View Payments
                </a>
            </li>
            <li>
                
                <a href="#" data-toggle="collapse" data-target="#admin">
                    <i class="fa fa-fw fa-users"></i> Admins
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="admin" class="collapse">
                    <li>
                        <?php 
                            if(isset($_SESSION['admin_email'])){
                                $admin_email = $_SESSION['admin_email'];
                                $query = $con->prepare("SELECT * FROM admins where admin_email = '$admin_email' AND admin_level = '1' ");
                                $query->execute();
                                $record = $query->rowCount();
                                if($record > 0){
                                    echo "
                                        <a href='index.php?insert_admin'>
                                            Insert Admins
                                        </a>
                                        <a href='index.php?view_admins'>
                                            View Admins
                                        </a>
                                        <a href='index.php?admins_level'>
                                            Admins Level
                                        </a>
                                    ";
                                }
                                else{
                                    echo "
                                        <a href='index.php?view_admins'>
                                            View Admins
                                        </a>
                                    ";
                                }
                            }
                        ?>
                    </li>
                </ul>
            </li>
            <li>
                <a href="Includes/Components/logout.php">
                    <i class="fa fa-fw fa-sign-out"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</nav>