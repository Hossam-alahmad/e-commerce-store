<?php 
    session_start();
    include "connection.php";
    if(isset($_GET['search'])){
        $search_inp = $_GET['search'];
        $query = $con->prepare("SELECT * FROM product_categories where p_cat_name = '$search_inp'");
        $query->execute();
        $record = $query->rowCount();
        if($record > 0){
            echo "<script>alert('Product Category Found')</script>";
        }
        else{
            echo "<script>alert('Not Found')</script>";
        }
    }

?>