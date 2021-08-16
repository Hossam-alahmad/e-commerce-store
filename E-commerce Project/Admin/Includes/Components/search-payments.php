<?php 
    session_start();
    include "connection.php";
    if(isset($_GET['search'])){
        $search_inp = $_GET['search'];
        $query = $con->prepare("SELECT * FROM payments where invoice_no = '$search_inp' OR
                                                            amount = '$search_inp' OR
                                                            payment_method = '$search_inp' OR
                                                            ref_no = '$search_inp' OR
                                                            payment_code = '$search_inp' OR
                                                            payment_date = '$search_inp'");
        $query->execute();
        $record = $query->rowCount();
        if($record > 0){
            echo "<script>alert('Payments Found')</script>";
        }
        else{
            echo "<script>alert('Not Found')</script>";
        }
    }

?>