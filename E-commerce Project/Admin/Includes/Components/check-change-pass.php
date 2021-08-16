<?php 
    session_start();
    include "connection.php";
    if(isset($_POST['old_pass']) && isset($_POST['new_pass'])){
        $admin_email = $_SESSION['admin_email'];
        $old_pass = sha1($_POST['old_pass']);
        $stmt = $con->prepare("SELECT * FROM admins where admin_email = '$admin_email'");
        $stmt->execute();
        $row_record = $stmt->rowCount();
        if($row_record > 0){
            $new_pass = sha1($_POST['new_pass']);
            $stmt = $con->exec("UPDATE admins SET admin_pass = '$new_pass' where admin_email = '$admin_email'");
            echo "<script>alert('Your Password Changed')</script>";
        }
        else{
            echo "<script>alert('Your Password Not Correct')</script>";
        }

    }

?>