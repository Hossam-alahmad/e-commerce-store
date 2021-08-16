<center>
    <h1>Change Your Password</h1>
    <p class="text-muted">
        If you have any questions, feel to <a href="../contact.php">Contact Us</a>. Our Customer Service work.
    </p>
</center>
<form action="my-account.php?change_pass" method="POST" onsubmit="return check();">
    <div class="form-group">
        <label for="">Your Old Password:</label>
        <input type="password" class="form-control" name="old_pass" id="old_pass">
        <div class="notification" id="oldpass-notify">
            Please enter your password again
        </div>        
    </div>
    <div class="form-group">
        <label for="">Your New Password:</label>
        <input type="password" class="form-control" name="new_pass" id="new_pass">
        <div class="test-pass" id="test-pass">
            <span class="test"></span>
            <span class="test"></span>
            <span class="test"></span>
        </div>
        <div class="notification" id="newpass-notify">
            Please enter your password again
        </div>   
    </div>
    <div class="form-group">
        <label for="">Confirm Your New Password:</label>
        <input type="password" class="form-control" name="new_pass_confirm" id="confirm_pass">
        <div class="notification" id="confirmpass-notify">
            Please enter your password again
        </div>     
    </div>
    <div class="text-center">
        <button type="submit" name="update" class="btn btn-success" id="update">
            <i class="fa fa-user-md"></i> Update Now
        </button>
    </div>
</form>
