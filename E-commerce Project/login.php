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
                    
                    <div class="col-md-8 log-box">
                        <div class="box">
                            <div class="box-header">
                                <center>
                                    <h2>Login To Your Account</h2>
                                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sit. Error harum numquam magnam laudantium voluptatum sint, placeat eveniet hic dicta blanditiis deserunt quod maxime iusto vero? Voluptatem, impedit adipisci.</p>
                                </center>
                                <form action="login.php" method="POST" enctype="multipart/form-data" id="log-form" onsubmit="return check();">
                                    <div class="form-group">
                                        <label for="">Enter Your Email <span>*</span></label>
                                        <input type="email" class="form-control" name="email" id="email">
                                        <div class="notification" id="email-notify">
                                            Please enter your email
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Enter Your Password <span>*</span></label>
                                        <input type="password" class="form-control" name="password" id="pass">
                                        <i class="fa fa-eye eye" aria-hidden="true" id="eye"></i>
                                        <div class="notification" id="pass-notify">
                                            Please enter your password
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="login" class="btn btn-success" id="login" >
                                            <i class="fa fa-user-md"></i> Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                $content = "Login Successfully";
                include 'Includes/Components/notification.php';
            ?>
        </div>
        
        <?php
            include 'Includes/Components/footer.php';
        ?>
        <script src="Layout/js/login-check.js"></script>
        <script src="Layout/js/show-hide-pass.js"></script>
    </body>
</html> 