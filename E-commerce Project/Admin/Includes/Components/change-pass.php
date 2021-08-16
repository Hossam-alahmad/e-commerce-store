<div class="content row">
    <div class="admin-pass col-md-8 offset-2">
        <h3>Change Password:</h3>
        <form method="POST" enctype="multipart/form-data" onsubmit="return check();">
            <div class="info">
                <label class="pull-left">Old Password:</label><input type="password" name="old_pass" id="old_pass" class="form-control pull-right">
                <div class="notification" id="oldpass-notify">
                    Please enter your password again
                </div> 
            </div> 
            <div class="info">
                <label>New Password:</label><input type="password" name="new_pass" id="new_pass" class="form-control pull-right">
                <div class="notification" id="newpass-notify">
                    Please enter your password again
                </div>
            </div> 
            <div class="info">
                <label>Confirm Password:</label><input type="password" name="confirm_pass" id="confirm_pass" class="form-control pull-right">
                <div class="notification" id="confirmpass-notify">
                    Please enter your password again
                </div>
            </div> 
            <input type="submit" class="form-control btn btn-primary" value ="Change Password">
        </form> 
    </div>
    <?php 
            $content = "Password Change Successfully";
            include "Includes/Components/notification.php";
    ?>
</div>