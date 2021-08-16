<div class="row header">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Insert Admins
            </li>
        </ul>
    </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-users"></i> Insert Admins</h4>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="user-register.php" method="post" enctype="multipart/form-data" onsubmit="return checkInsert();">
                            <div class="form-group">
                                <label for="">Enter Your Admin Name <span>*</span></label>
                                <input type="text" class="form-control" name="admin_name" id="admin_name">
                                <i class="fa fa-check-square check" aria-hidden="true" id="user-check"></i>
                                <div class="notification" id="username-notify">
                                    Enter your username please
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Enter Your First Name <span>*</span></label>
                                <input type="text" class="form-control" name="first_name" id="first_name">
                                <i class="fa fa-check-square check" aria-hidden="true" id="first-check"></i>
                                <div class="notification" id="firstname-notify">
                                    Enter your first name please
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Enter Your Last Name <span>*</span></label>
                                <input type="text" class="form-control" name="last_name" id="last_name">
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
                                    <input type="radio" name="gender" value="Male" id="genderM" checked>
                                    <label for="">Male</label>
                                    <input type="radio" name="gender" value="Female" id="genderF">
                                    <label for="">Female</label>
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
                                <button type="submit" name="register" class="btn btn-primary" id="register">
                                    <i class="fa fa-user-md"></i> Insert Admin
                                </button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
        <?php 
            $content = "Admin Insert Successfully";
            include "Includes/Components/notification.php";
        ?>
    </div>
    
