<?php 
    session_start();
    include "../../../Admin/Includes/Components/connection.php";
    if($_POST['user_name']){
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_country = $_POST['user_country'];
        $user_city = $_POST['user_city'];

        $select_query = $con->prepare("SELECT * FROM users where user_email = '$user_email'");
        $select_query->execute();
        $row_record = $select_query->rowCount();
        if($row_record >= 0 && $row_record < 2){
            $update_query = "UPDATE users set user_name = '$user_name',
                                user_email = '$user_email',
                                user_country = '$user_country',
                                user_city = '$user_city'";
            $con->exec($update_query);
            $_SESSION['user_email'] = $user_email;
            $_SESSION['user_name'] = $user_name;  
            echo "<script>alert('Update Account Successfully');</script>";  
        }
        else{
            echo "<script>alert('This email has already exist try another one');</script>";
        }
        
    }

?>