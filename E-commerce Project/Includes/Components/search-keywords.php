<?php
    session_start();
    include "../../Admin/Includes/Components/connection.php"; 
    if($_GET['search']){
        $search_value = $_GET['search'];
        $query = $con->prepare("SELECT * FROM products");
        $query->execute();
        $product_id = array();
        $i = 0;
        while($result = $query->fetch(PDO::FETCH_ASSOC)){
            $product_keywords = $result['product_keywords'];
            
            $keys = explode(",",$product_keywords);
            foreach ($keys as  $value) {
                if($value == $search_value){
                    $product_id[$i] = $result['product_id'];
                    echo $product_id[$i] . ",";
                    $i++;
                    break;
                }
            }
        }
        if(count($product_id) == 0){
            echo "Not found any result";
        }
        //print_r($product_id);
    }
?>