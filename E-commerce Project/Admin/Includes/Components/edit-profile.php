<?php 
    session_start();
    include "connection.php";
    if(isset($_POST['admin_desc'])){
        try{
            $admin_name = $_SESSION['admin_name'];
            $admin_desc = $_POST['admin_desc'];
            $query = "UPDATE admins SET admin_desc = '$admin_desc' where admin_name = '$admin_name'";
            $con->exec($query);
            echo "<script>alert('Edit Success');</script>";
        }
        catch(Exception $e){
            echo "<script>alert('Edit Failed');</script>";
        }
    }
    else{
        echo "<script>alert('Edit Failed');</script>";
    }

?>