<?php 
    session_start();
    include "connection.php";
    if(isset($_GET['search'])){
        $search_inp = $_GET['search'];
        $query = $con->prepare("SELECT * FROM pending_orders where invoice_no = '$search_inp' OR order_status = '$search_inp'");
        $query->execute();
        $record = $query->rowCount();
        if($record > 0){
            echo "<script>alert('Orders Found')</script>";
        }
        else{
            echo "<script>alert('Not Found')</script>";
        }
    }

?>