<?php 
    session_start();
    include "../../../Admin/Includes/Components/connection.php";
    include "../Functions/function.php";
    if(isset($_POST['old_pass']) && isset($_POST['new_pass'])){
        $user_email = $_SESSION['user_email'];
        $user_ip = $_SESSION['user_ip'];
        $old_pass = sha1($_POST['old_pass']);
        $stmt = $con->prepare("SELECT * FROM users where user_email = '$user_email' AND user_ip = '$user_ip' AND user_password = '$old_pass'");
        $stmt->execute();
        $row_record = $stmt->rowCount();
        if($row_record > 0){
            $new_pass = sha1($_POST['new_pass']);
            $stmt = $con->exec("UPDATE users SET user_password = '$new_pass' where user_email = '$user_email' AND user_ip = '$user_ip'");
            echo "<script>alert('Your Password Changed')</script>";
        }
        else{
            echo "<script>alert('Your Password Not Correct')</script>";
        }

    }

?>