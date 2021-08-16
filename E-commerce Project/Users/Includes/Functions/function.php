<?php 
    // this function to get real ip for user
    function getRealIpUser(){
        // this function to get real ip for user
        switch(true){
            case(isset($_SERVER['HTTP_X_REAL_IP'])):        return  $_SERVER['HTTP_X_REAL_IP'];
            case(isset($_SERVER['HTTP_CLIENT_IP'])):        return  $_SERVER['HTTP_CLIENT_IP'];
            case(isset($_SERVER['HTTP_X_FORWARDED_FOR'])):  return  $_SERVER['HTTP_X_FORWARDED_FOR'];
            default:                                        return  $_SERVER['REMOTE_ADDR'];
        }
        
    }
    // this function to get Product Category From Database
    function getProductCat(){
        global $con;
        $getCategories = $con->prepare("SELECT * FROM product_categories");
        $getCategories->execute();
        while($result = $getCategories->fetch(PDO::FETCH_ASSOC)){
            $productCatId = $result['p_cat_id'];
            $productCatName = $result['p_cat_name'];
            echo "<li>
                    <a href='../shop.php?p_cat=$productCatId'>
                        $productCatName
                    </a>
                </li>";
        }
    }
    // function to get all user item which added to his cart
    function getAllItem(){
        // function to get all user item which added to his cart
        /*  connection to database cart table 
        /   check if user have product print it
        /   else print 0
        */
        global $con;
        $ip_address = getRealIpUser();
        if(isset($_SESSION['user_name'])){
            $user_id = $_SESSION['user_id'];
        }
        else{
            $user_id = 0;
        }
        $get_item   = $con->prepare("SELECT * FROM cart where user_id = ? AND ip_address = ?");
        $get_item->execute([$user_id,$ip_address]);
        $count      = $get_item->rowCount();
        echo $count;
    }
    // function to get total price for all item in cart
    function getTotalPrice(){
        // function to get total price for all item in cart
        global $con;
        $ip_address = getRealIpUser();
        if(isset($_SESSION['user_name'])){
            $user_id = $_SESSION['user_id'];
        }
        else{
            $user_id = 0;
        }
        /*  connection to database cart table 
        /   check if user have product print price of all product
        /   else print 0
        */
        $get_item   = $con->prepare("SELECT * FROM cart where user_id = ? AND ip_address = ?");
        $get_item->execute([$user_id,$ip_address]);
        $count     = $get_item->rowCount();
        if($count == 0)
            echo 0;
        else {
            $total_price = 0;
            while($result = $get_item->fetch(PDO::FETCH_ASSOC))
            {
                $product_id       = $result['product_id'];
                $product_quantity = $result['product_quantity'];
                $get_product      = $con->prepare("SELECT * FROM products where product_id = $product_id");
                $get_product->execute();
                $result           = $get_product->fetch(PDO::FETCH_ASSOC);
                $product_price    = $result['product_price'];
                $product_price_cut    = $result['product_price_cut'];
                if($product_price_cut > 0)
                    $total_price = $total_price + ($product_price_cut * $product_quantity);
                else
                    $total_price = $total_price + ($product_price * $product_quantity);
            }
            echo $total_price;
        }
    }  
    // change password function
    function changeUserPassword(){
        // change password script
        global $con;
        if(isset($_POST['update'])){
            $user_email = $_SESSION['user_email'];
            $user_ip = $_SESSION['user_ip'];
            $old_pass = sha1($_POST['old_pass']);
            $stmt = $con->prepare("SELECT * FROM users where user_email = '$user_email' AND user_ip = '$user_ip' AND user_password = '$old_pass'");
            $stmt->execute();
            $row_record = $stmt->rowCount();
            if($row_record > 0){
                $new_pass = sha1($_POST['new_pass']);
                $stmt = $con->exec("UPDATE users SET user_password = '$new_pass' where user_email = '$user_email' AND user_ip = '$user_ip'");
                echo "<script>alert('Your Password Changed')</script>";
            }
            else{
                echo "<script>alert('Your Password Not Found')</script>";
            }

        }
    }
    
?>