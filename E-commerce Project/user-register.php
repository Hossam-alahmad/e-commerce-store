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
                    <div class="col-md-8 reg-box">
                        <div class="alert alert-danger text-center">
                                <h3>Note:</h3>
                            <p>Password Must Be at less 6 number and must contains at less one big character,small character,and numbers.</p>
                        </div>
                        <div class="box">

                            <div class="box-header">
                                <center>
                                    <h2>Register A New Account Now</h2>
                                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sit. Error harum numquam magnam laudantium voluptatum sint, placeat eveniet hic dicta blanditiis deserunt quod maxime iusto vero? Voluptatem, impedit adipisci.</p>
                                </center>
                                <form action="user-register.php" method="post" enctype="multipart/form-data" onsubmit="return checkRegister();">
                                    <div class="form-group">
                                        <label for="">Enter Your Username <span>*</span></label>
                                        <input type="text" class="form-control" name="username" id="username">
                                        <i class="fa fa-check-square check" aria-hidden="true" id="user-check"></i>
                                        <div class="notification" id="username-notify">
                                            Enter your username please
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Enter Your First Name <span>*</span></label>
                                        <input type="text" class="form-control" name="firstname" id="firstname">
                                        <i class="fa fa-check-square check" aria-hidden="true" id="first-check"></i>
                                        <div class="notification" id="firstname-notify">
                                            Enter your first name please
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Enter Your Last Name <span>*</span></label>
                                        <input type="text" class="form-control" name="lastname" id="lastname">
                                        <i class="fa fa-check-square check" aria-hidden="true" id="last-check"></i>
                                        <div class="notification" id="lastname-notify">
                                            Enter your last name please
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Enter Your Email <span>*</span></label>
                                        <input type="email" class="form-control" name="email" id="email">
                                        <i class="fa fa-check-square check" aria-hidden="true" id="email-check"></i>
                                        <div class="notification" id="email-notify">
                                            Enter your email please
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Select Your Birthday Date<span>*</span></label>
                                        <input type="date" lang="en" class="form-control" name="birthday" id="birth">
                                        <div class="notification" id="birth-notify">
                                            Enter your birthday please
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Select Your Gender<span>*</span></label>
                                        <div class="form-group">
                                            <input type="radio" name="gender" value="male" id="genderM" checked>
                                            <label for="">Male</label>
                                            <input type="radio" name="gender" value="female" id="genderF">
                                            <label for="">Female</label>
                                        </input>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Enter Your Country <span>*</span></label>
                                        <input type="text" class="form-control" name="country" id="country">
                                        <i class="fa fa-check-square check" aria-hidden="true" id="country-check"></i>
                                        <div class="notification" id="country-notify">
                                            Enter your country please
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Enter Your City <span>*</span></label>
                                        <input type="text" class="form-control" name="city" id="city">
                                        <i class="fa fa-check-square check" aria-hidden="true" id="city-check"></i>
                                        <div class="notification" id="city-notify">
                                            Enter your city please
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Enter Your Password <span>*</span></label>
                                        <input type="password" class="form-control" name="password" id="password">
                                        <i class="fa fa-check-square check" aria-hidden="true" id="pass-check"></i>
                                        <div class="test-pass" id="test-pass">
                                            <span class="test"></span>
                                            <span class="test"></span>
                                            <span class="test"></span>
                                        </div>
                                        <div class="notification" id="pass-notify">
                                            Enter your password please
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Rewrite Your Password <span>*</span></label>
                                        <input type="password" class="form-control" name="repassword" id="repassword">
                                        <i class="fa fa-check-square check" aria-hidden="true" id="repass-check"></i>
                                        <div class="notification" id="repass-notify">
                                            Rewrite your password please
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="register" class="btn btn-success" id="register">
                                            <i class="fa fa-user-md"></i> Register Now
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                $content = "Register Successfully";
                include 'Includes/Components/notification.php';
            ?>
        </div>
        <?php
            include 'Includes/Components/footer.php';
        ?>
        <script src="Layout/js/user-reg-validation.js"></script>
        <script src="Layout/js/user-reg-validation2.js"></script>
    
    </body>
</html> 