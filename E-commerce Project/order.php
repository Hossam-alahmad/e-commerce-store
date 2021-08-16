<?php 
    session_start();
    include 'Admin/Includes/Components/connection.php';
    include 'Includes/Functions/function.php';
?>
<?php 
    // check if user id exist
    if(isset($_GET['user_id'])){
        // add to variable
        $user_id = $_GET['user_id'];
        if(isset($_SESSION['user_ip'])){
            // init variables 
            $status = "Pending";
            $invoice_no = mt_rand();
            // connect to database cart table to get all cart to user which have it
            $select_cart = $con->prepare("SELECT * FROM cart where ip_address = ? AND user_id = ?");
            $select_cart->execute([$_SESSION['user_ip'],$_SESSION['user_id']]);
            $cart_product = $select_cart->rowCount();
            if($cart_product > 0){
                while($cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
                    $product_id = $cart['product_id'];
                    $product_quantity = $cart['product_quantity'];
                    // connect to database products to get product
                    $get_product = $con->prepare("SELECT * FROM products where product_id = $product_id");
                    $get_product->execute();
                    while($product = $get_product->fetch(PDO::FETCH_ASSOC)){
                        $product_price_cut    = $product['product_price_cut'];
                        $product_price    = $product['product_price'];
                        if($product_price_cut > 0)
                            $sub_total = $product_price_cut * $product_quantity;
                        else
                            $sub_total = $product_price * $product_quantity;
                        // Insert into database user_orders to store all product pending
                        $ins_to_user_order = $con->exec("INSERT INTO user_orders 
                                                    (user_id,due_amount,invoice_no,quantity,order_date,order_status) 
                                                    VALUES 
                                                    ('$user_id','$sub_total','$invoice_no','$product_quantity',NOW(),'$status')");
                        $ins_to_pending_order = $con->exec("INSERT INTO pending_orders 
                                                    (user_id,product_id,invoice_no,quantity,order_status) 
                                                    VALUES 
                                                    ('$user_id','$product_id','$invoice_no','$product_quantity','$status')");
                        // Delete From database cart all product
                        $delete_from_cart = $con->prepare("DELETE FROM cart where ip_address = ? AND user_id = ?");
                        $delete_from_cart->execute([$_SESSION['user_ip'],$_SESSION['user_id']]);
    
                        echo "<script>alert('Your orders has been submitted,thanks');</script>";
                        echo "<script>window.open('Users/my-account.php?my_orders','_self');</script>";
                    }
                }
            }
            else{
                echo "<script>alert('You dont any product in your cart');</script>";
                echo "<script>window.open('cart.php','_self');</script>";
            }
        }
    }
    
?>