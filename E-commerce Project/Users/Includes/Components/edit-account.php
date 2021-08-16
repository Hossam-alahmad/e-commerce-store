<?php 
    if(isset($_SESSION['user_email'])){
        $user_email = $_SESSION['user_email'];
        $select_query = $con->prepare("SELECT * FROM users where user_email = '$user_email'");
        $select_query->execute();
        $record = $select_query->rowCount();
        if($record > 0){
            $get_user  = $select_query->fetch(PDO::FETCH_ASSOC);
            $user_name = $get_user['user_name'];
            $user_country = $get_user['user_country'];
            $user_city = $get_user['user_city'];
        }
    }
?>
<center>
    <h1>Edit Your Account</h1>
    <p class="text-muted">
        If you have any questions, feel to <a href="../contact.php">Contact Us</a>. Our Customer Service work.
    </p>
</center>
<form action="my-account.php?edit_account" method="POST" enctype="multipart/form-data" onsubmit="return check();">
    <div class="form-group">
        <label for="">User Name:</label>
        <input type="text" class="form-control" name="user_name" id="name" value="<?php echo $user_name; ?>">
        <div class="notification" id="name-notify">
            Enter your username
        </div> 
    </div>
    <div class="form-group">
        <label for="">Email:</label>
        <input type="text" class="form-control" name="user_email" id="email" value="<?php echo $user_email; ?>">
        <div class="notification" id="email-notify">
            Enter your email
        </div> 
    </div>
    <div class="form-group">
        <label for="">Country:</label>
        <input type="text" class="form-control" name="user_country" id="country" value="<?php echo $user_country; ?>">
        <div class="notification" id="country-notify">
            Enter your country
        </div> 
    </div>
    <div class="form-group">
        <label for="">City:</label>
        <input type="text" class="form-control" name="user_city" id="city" value="<?php echo $user_city; ?>">
        <div class="notification" id="city-notify">
            Enter your city
        </div> 
    </div>
    <div class="text-center">
        <button name="update" class="btn btn-success" >
            <i class="fa fa-user-md"></i> Update Now
        </button>
    </div>
</form>