<?php 
    session_start();
    include "Admin/Includes/Components/connection.php";
    include "Includes/Functions/function.php";
    if(isset($_POST['email']) && isset($_POST['password'])){

        $user_ip      = getRealIpUser();
        $user_email   = $_POST['email'];
        $user_pass    = sha1($_POST['password']); // ecriptyon user password using sha1 algorithm

        $query        = "SELECT * FROM users where user_ip = ? AND user_email = ?";
        $log_user     = $con->prepare($query);
        $log_user->execute([$user_ip,$user_email]);
        $check_user   = $log_user->rowCount();
        if($check_user == 0){
            echo "<script>alert('User Not Found');</script>";
        }
        else{
            $result = $log_user->fetch(PDO::FETCH_ASSOC);
            if($user_pass == $result['user_password']){
                $_SESSION['user_id']       = $result['user_id'];
                $_SESSION['user_name']     = $result['user_name'];
                $_SESSION['user_email']    = $result['user_email'];
                $_SESSION['user_ip']       = $result['user_ip']; 
                
                echo "<script>alert('Welcome '" . $result['user_name'] . ");</script>";
                echo "<script>window.open('index.php','_self');</script>"; 
                
            }
            else{
                echo "<script>alert('Password Not Correct');</script>";
            }
        }
    }

?>