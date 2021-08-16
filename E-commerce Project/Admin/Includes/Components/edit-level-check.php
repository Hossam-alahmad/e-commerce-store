<?php 
    session_start();
    include "connection.php";
    if(isset($_POST['admin_level'])){
        $admin_name  = $_POST['admin_name'];
        $admin_level = $_POST['admin_level'];
        try{
            $query = "UPDATE admins SET admin_level = '$admin_level' where admin_name = '$admin_name'";
            $con->exec($query);
            echo "<script>alert('Edit Level Success');</script>";
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        
    }

?>