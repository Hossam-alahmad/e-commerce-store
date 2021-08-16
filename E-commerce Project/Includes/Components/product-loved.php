<?php 
    session_start();
    include "../../Admin/Includes/Components/connection.php";
    if(isset($_POST['value'])){
        if(isset($_SESSION['user_email'])){
            $user_email = $_SESSION['user_email'];
            $product_id = $_POST['product_id'];
            $total_click = $_POST['total_click'];
            if($_POST['value'] == 1){
                $total_click = 1;
                $query = "INSERT INTO product_loved (product_id,user_email,total_click,active) VALUES ('$product_id','$user_email','$total_click','active')";
                $con->exec($query); 
                echo "Insert";
            }
            else{
                $query = "DELETE FROM product_loved where product_id = '$product_id' AND user_email = '$user_email'";
                $con->exec($query); 
                echo "Delete";
            }
        }

    }

?>