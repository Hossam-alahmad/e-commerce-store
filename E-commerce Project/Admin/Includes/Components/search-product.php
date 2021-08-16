<?php 
    session_start();
    include "connection.php";
    if(isset($_GET['search'])){
        $search_inp = $_GET['search'];
        $query = $con->prepare("SELECT * FROM products where product_name = '$search_inp' OR product_keywords = '$search_inp'");
        $query->execute();
        $record = $query->rowCount();
        if($record > 0){
            echo "<script>alert('Product Found')</script>";
        }
        else{
            echo "<script>alert('Not Found')</script>";
        }
    }

?>