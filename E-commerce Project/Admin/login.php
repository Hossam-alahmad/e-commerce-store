<?php include "Includes/Components/header.php";?>
    <body>    
        <div class="login-box">
            <div class="header">
                <h3>Admin Login</h3>
            </div>
            <form action="" method="POST" class="form-login" onsubmit="return check();" autocomplete="off">
                <div class="form-group">
                    <input type="email" class="form-control" name="admin_email" id="email" placeholder="Enter Your Email">
                    <div class="notification" id="email-notify">
                            Enter your email please
                    </div>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="admin_pass" id="pass" placeholder="Enter Your Password">
                    <i class="fa fa-eye eye" aria-hidden="true" id="eye"></i>
                    <div class="notification" id="pass-notify">
                            Enter your password please
                    </div>
                </div>
                <input type="submit" class="btn btn-primary form-control" value="LOG IN">
            </form>
        </div>
        <?php
            $content = "Login Successfully"; 
            include "Includes/Components/notification.php"
        ?>
        <script src="Layout/js/jquery-3.4.1.min.js"></script>
        <script src="Layout/js/popper.min.js"></script>
        <script src="Layout/js/bootstrap.min.js"></script>
        <script src="Layout/js/log-check.js"></script>
        <script src="Layout/js//show-hide-pass.js"></script>
    </body>
</html>
