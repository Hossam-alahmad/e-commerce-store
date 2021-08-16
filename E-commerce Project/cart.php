<?php 
    $active = 'SHOPPING CART';
    include 'Includes/Components/header.php'; 
?>
        <div class="breadcrumb-box" id="breadcrumb-box"><!-- breadcrumb-box Start -->
            <div class="container"> <!-- container Start -->
                <div class="col-md-12"> <!-- col-md-12 Start -->
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Cart
                        </li> 
                    </ul>
                </div> <!-- col-md-12 Finish -->
            </div> <!-- container Finish -->
        </div><!-- breadcrumb-box Finish -->
        <div id="content">
            <div class="container">
                <div class="row">
                    <div id="cart" class="col-md-9">
                        <div class="box">
                            <form action="cart.php" method="post" enctype="multipart/form-data">
                                <h3>Shopping Cart</h3>
                                <p class="text-muted">You currently have <?php getAllItem(); ?> item(s) in your cart</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th colspan="1">Delete</th>
                                                <th colspan="2">Sub-Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                // display product which added to cart
                                                $ip_address = getRealIpUser(); // get ip address
                                                if(isset($_SESSION['user_name']))// check if user_name session is exist
                                                {
                                                    $user_id = $_SESSION['user_id'];
                                                }
                                                else{
                                                    $user_id = 0;
                                                }
                                                // database connection query to check if this user have product in his cart 
                                                $get_item   = $con->prepare("SELECT * FROM cart where user_id = ? AND ip_address = ? ");
                                                $get_item->execute([$user_id,$ip_address]);
                                                $number_of_item = 1;
                                                while($result = $get_item->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    $product_id       = $result['product_id'];
                                                    $product_quantity = $result['product_quantity'];
                                                    // database connection query to get product and display it in table cart 
                                                    $get_product = $con->prepare("SELECT * FROM products where product_id = $product_id");
                                                    $get_product->execute();
                                                    $result = $get_product->fetch(PDO::FETCH_ASSOC);
                                                    $product_name  = $result['product_name'];
                                                    $product_price = $result['product_price'];
                                                    $product_price_cut = $result['product_price_cut'];
                                                    $product_img1  = $result['product_image1'];
                                                    
                                                    if($product_price_cut > 0){
                                                        $sub_total = $product_quantity * $product_price_cut;
                                                        echo "
                                                        <tr align='center'>
                                                            <td>$number_of_item</td>
                                                            <td>
                                                                <img class='img-responsive' src='Admin/Layout/images/product_images/$product_img1' alt='$product_img1'>
                                                            </td>
                                                            <td>
                                                                <a href='details.php?product_id=$product_id'>$product_name</a>
                                                            </td>
                                                            <td>$product_quantity</td>
                                                            <td>$$product_price_cut</td>
                                                            <td>
                                                                <!-- <i class='fa fa-trash' aria-hidden='true'></i> -->
                                                                <input type='checkbox' name='remove[]' value='$product_id'>
                                                            </td>
                                                            <td>$$sub_total</td>
                                                        </tr>
                                                        ";
                                                    }
                                                    else{
                                                        $sub_total = $product_quantity * $product_price;
                                                        echo "
                                                        <tr align='center'>
                                                            <td>$number_of_item</td>
                                                            <td>
                                                                <img class='img-responsive' src='Admin/Layout/images/product_images/$product_img1' alt='$product_img1'>
                                                            </td>
                                                            <td>
                                                                <a href='details.php?product_id=$product_id'>$product_name</a>
                                                            </td>
                                                            <td>$product_quantity</td>
                                                            <td>$$product_price</td>
                                                            <td>
                                                                <!-- <i class='fa fa-trash' aria-hidden='true'></i> -->
                                                                <input type='checkbox' name='remove[]' value='$product_id'>
                                                            </td>
                                                            <td>$$sub_total</td>
                                                        </tr>
                                                        ";
                                                    }
                                                    $number_of_item++;
                                                }
                                            ?>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="6">Total</th>
                                                <th colspan="1">$<?php getTotalPrice(); ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="shop.php" class="btn btn-default">
                                            <i class="fa fa-chevron-left"></i> Continue Shopping
                                        </a>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" name="update" value="Update Cart" class="btn btn-default">
                                            <i class="fa fa-refresh"></i> Update Cart
                                        </button>
                                        <a href="checkout.php" class="btn btn-success">
                                            Processed Checkout <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php    
                        updateCart();
                    ?>
                    <div class="col-md-3">
                        <div id="order_summary" class="box">
                            <div class="box-header text-center">
                                <h3>
                                    Order Summary
                                </h3>
                            </div>
                            <p class="text-muted">Lorem ipsum dolor sit amet,consecte adipisicing elit.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Order Sub Total</td>
                                        <th>$<?php getTotalPrice(); ?></th>
                                    </tr>
                                    <tr>
                                        <td>Shopping and Handling</td>
                                        <th>$0</th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>$0</th>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <th>$<?php getTotalPrice(); ?></th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            include 'Includes/Components/footer.php';
        ?>
    </body>
</html> 