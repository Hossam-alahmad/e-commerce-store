<?php 
    session_start();
    include "connection.php";
    if(isset($_GET['search'])){
        $search_inp = $_GET['search'];
        $query = $con->prepare("SELECT * FROM users where user_name = '$search_inp'");
        $query->execute();
        $record = $query->rowCount();
        if($record > 0){
            echo "<script>alert('User Found')</script>";
        }
        else{
            echo "<script>alert('Not Found')</script>";
        }
    }

?>