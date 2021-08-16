<?php 
    session_start();
    include "connection.php";
    if(isset($_POST['email']) && isset($_POST['password'])){

        $admin_email   = $_POST['email'];
        $admin_pass    = sha1($_POST['password']); // ecriptyon admin password using sha1 algorithm

        $query        = "SELECT * FROM admins where admin_email = '$admin_email'";
        $log_admin     = $con->prepare($query);
        $log_admin->execute();
        $check_admin   = $log_admin->rowCount();
        if($check_admin == 0){
            echo "<script>alert('Admin Not Found');</script>";
        }
        else{
            $result = $log_admin->fetch(PDO::FETCH_ASSOC);
            if($admin_pass == $result['admin_pass']){
                $_SESSION['admin_id']       = $result['admin_id'];
                $_SESSION['admin_name']     = $result['admin_name'];
                $_SESSION['admin_email']    = $result['admin_email'];
                $_SESSION['admin_level']    = $result['admin_level'];
                
                echo "<script>alert('Welcome '" . $result['admin_name'] . ");</script>";
                echo "<script>window.open('index.php','_self');</script>"; 
                
            }
            else{
                echo "<script>alert('Password Not Correct');</script>";
            }
        }
    }

?>