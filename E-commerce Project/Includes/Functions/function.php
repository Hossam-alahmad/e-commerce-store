<?php 
    // this function to get images for slider in index page from database 
    function getSliderHomePage(){
        // this function to get images for slider in index page from database 
        global $con;
        $get_slider = $con->prepare("SELECT * FROM slider");
        $get_slider->execute();
        $first_slider = 0;
        while($result = $get_slider->fetch(PDO::FETCH_ASSOC)){
            $slide_id = $result['slide_id'];
            $slide_name = $result['slide_name']; 
            $slide_image = $result['slide_image'];
            if($first_slider == 0){
                echo "<img class='sliderImg active' src='Admin/Layout/images/main_slider/" . $slide_image . "' alt='" . $slide_name . "' id='" . $slide_id . "'>";
                $first_slider++;
            }
                
            else
                echo "<img class='sliderImg' src='Admin/Layout/images/main_slider/" . $slide_image . "' alt='" . $slide_name . "' id='" . $slide_id . "'>";
        }        
    }
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
    // this function to buy product
    function buyNow(){
        // this function to add product to cart table in database
        if(isset($_POST['buy-now']))
        {
            global $con;
            // init variables 
            $status = "Pending";
            $invoice_no = mt_rand();
            $ip_address = getRealIpUser();
            $product_id = $_GET['product_id'];
            $p_cat_id   = $_GET['p_cat'];
            $product_quantity = $_POST['product-quantity'];

            
            if(isset($_SESSION['user_name'])){
                $user_id = $_SESSION['user_id'];
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
                    $ins_to_user_order = $con->exec("INSERT INTO user_orders (user_id,due_amount,invoice_no,quantity,order_date,order_status) 
                                                VALUES ('$user_id','$sub_total','$invoice_no','$product_quantity',NOW(),'$status')");
                    $ins_to_pending_order = $con->exec("INSERT INTO pending_orders (user_id,product_id,invoice_no,quantity,order_status) 
                                                VALUES ('$user_id','$product_id','$invoice_no','$product_quantity','$status')");
                    echo "<script>window.open('Users/my-account.php?my_orders','_self');</script>";
                }
            }
            else{
                echo "<script>window.open('login.php','_self');</script>";
            }
            
        }
    }
    // this function to add product to cart table in database
    function addCart(){
        // this function to add product to cart table in database
        if(isset($_POST['add_cart']))
        {
            global $con;
            $ip_address = getRealIpUser();
            $product_id = $_GET['product_id'];
            $p_cat_id   = $_GET['p_cat'];
            $product_quantity = $_POST['product-quantity'];
            if(isset($_SESSION['user_name'])){
                $user_id = $_SESSION['user_id'];
                $check_product = $con->prepare("SELECT * FROM cart where product_id = $product_id AND user_id = ? AND ip_address = ?");
                $check_product->execute([$user_id,$ip_address]);
                $row_number = $check_product->rowCount();
                if($row_number > 0)
                {
                    echo "<script>alert(This Product has already added to cart);</script>";
                    echo "<script>window.open('details.php?p_cat=$p_cat_id&product_id=$product_id','_self');</script>";
                }
                else
                {
                    
                    $add_to_cart = "INSERT INTO cart (product_id,user_id,ip_address,product_quantity) VALUES ('$product_id','$user_id','$ip_address','$product_quantity')";
                    $con->exec($add_to_cart);
                    echo "<script>window.open('details.php?p_cat=$p_cat_id&product_id=$product_id','_self');</script>";
                    
                }
            }
            else{
                echo "<script>window.open('login.php','_self');</script>";
            }
            
        }
    }
    // for update cart and delete from cart
    function updateCart(){
        // for update cart and delete from cart
        global $con;
        $ip_address = getRealIpUser(); // get ip address
        if(isset($_SESSION['user_name']))// check if user_name session is exist
        {
            $user_id = $_SESSION['user_id'];
            /* if click update check remove
            / if user select to delete product they are connect to database and delete
            / product using his id 
            */
            if(isset($_POST['update']))
            {
                if(isset($_POST['remove'])){
                    foreach($_POST['remove'] as $product_remove_id)
                    {
                        $delete_product = $con->prepare("DELETE FROM cart where product_id = $product_remove_id AND user_id = ? AND ip_address = ?");
                        $delete_product->execute([$user_id,$ip_address]);
                        if($delete_product){
                            echo "<script>window.open('cart.php','_self');</script>";
                        }
                    }
                }
            }
        }
        
    }
    // this function for get product from database to index page (only 8 product)
    function getProductIndex(){
        // this function for Get product from database to index page (only 8 product)
        global $con;
        $get_product = $con->prepare("SELECT * FROM products order by 1 DESC LIMIT 0,8");
        $get_product->execute();
        while($result = $get_product->fetch(PDO::FETCH_ASSOC))
        {
            $product_id     = $result['product_id'];
            $p_cat_id       = $result['p_cat_id'];
            $product_name   = $result['product_name'];
            $product_img1   = $result['product_image1'];
            $product_price  = $result['product_price'];
            $product_price_cut  = $result['product_price_cut'];
            if($product_price_cut > 0){
                echo "
                    <div class='col-xs-12 col-sm-6 col-md-4 col-lg-3 single'>
                        <div class='product-box'>
                            <div class='product'>
                                <img class='img-responsive' src='Admin/Layout/images/product_images/$product_img1' alt='$product_img1'>
                            </div>
                            <div class='content'>
                                <h3>
                                    $product_name
                                </h3>
                                <span class='price'><del>$$product_price</del> / <ins>$$product_price_cut</ins></span>
                                <div class='button'>
                                    <a href='details.php?p_cat=$p_cat_id&product_id=$product_id' class='btn btn-default'>
                                        VIEW DETAILS
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                
                ";
            }
            else{
                echo "
                    <div class='col-xs-12 col-sm-6 col-md-4 col-lg-3 single'>
                        <div class='product-box'>
                            <div class='product'>
                                <img class='img-responsive' src='Admin/Layout/images/product_images/$product_img1' alt='$product_img1'>
                            </div>
                            <div class='content'>
                                <h3>
                                    $product_name
                                </h3>
                                <span class='price'>$$product_price</span>
                                <div class='button'>
                                    <a href='details.php?p_cat=$p_cat_id&product_id=$product_id' class='btn btn-default'>
                                        VIEW DETAILS
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                
                ";
            }
        }
    }
    // this function for get product from database to shop page (only 6 product)
    function getProductShop($per_page){
        
            global $con;
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }
            else{
                $page = 1;
            }
            $start = ($page - 1) * $per_page;
                $get_product = $con->prepare("SELECT * FROM products order by 1 DESC LIMIT $start,$per_page");
                $get_product->execute();
                while($result = $get_product->fetch(PDO::FETCH_ASSOC)){
                    $product_id     = $result['product_id'];
                    $p_cat_id       = $result['p_cat_id'];
                    $product_name   = $result['product_name'];
                    $product_img1   = $result['product_image1'];
                    $product_price  = $result['product_price'];
                    $product_price_cut  = $result['product_price_cut'];
                    
                        echo "
                            <div class='col-xs-12 col-sm-6 col-lg-4 single'>
                                <div class='product-box'>
                                    <div class='product'>
                                        <img class='img-responsive' src='Admin/Layout/images/product_images/$product_img1' alt='$product_img1'>
                                    </div>
                                    <div class='content'>
                                        <h3>
                                            $product_name
                                        </h3>
                                        <span class='price'>
                            ";
                        
                                        if($product_price_cut > 0)
                                            echo "<del>$$product_price</del> / <ins>$$product_price_cut</ins>";
                                        else
                                            echo "$" . $product_price;
                            echo "
                                        </span>
                                        <div class='button'>
                                            <a href='details.php?p_cat=$p_cat_id&product_id=$product_id' class='btn btn-default'>
                                                VIEW DETAILS
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        ";
                    
            }
    }
    function getProductsByFilters($per_page){
        global $con;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else{
            $page = 1;
        }
        $products_id = $_GET['filter_loved']; 
        $start = ($page - 1) * $per_page;
            $get_product = $con->prepare("SELECT * FROM products where product_id IN($products_id) order by 1 DESC LIMIT $start,$per_page");
            $get_product->execute();
            while($result = $get_product->fetch(PDO::FETCH_ASSOC)){
                $product_id     = $result['product_id'];
                $p_cat_id       = $result['p_cat_id'];
                $product_name   = $result['product_name'];
                $product_img1   = $result['product_image1'];
                $product_price  = $result['product_price'];
                $product_price_cut  = $result['product_price_cut'];
                if($product_price_cut > 0){
                    echo "
                        <div class='col-xs-12 col-sm-6 col-md-4 single'>
                            <div class='product-box'>
                                <div class='product'>
                                    <img class='img-responsive' src='Admin/Layout/images/product_images/$product_img1' alt='$product_img1'>
                                </div>
                                <div class='content'>
                                    <h3>
                                        $product_name
                                    </h3>
                                    <span class='price'><del>$$product_price</del> / <ins>$$product_price_cut</ins></span>
                                    <div class='button'>
                                        <a href='details.php?p_cat=$p_cat_id&product_id=$product_id' class='btn btn-default'>
                                            VIEW DETAILS
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    ";
                }
                else{
                    echo "
                        <div class='col-xs-12 col-sm-6 col-md-4 single'>
                            <div class='product-box'>
                                <div class='product'>
                                    <img class='img-responsive' src='Admin/Layout/images/product_images/$product_img1' alt='$product_img1'>
                                </div>
                                <div class='content'>
                                    <h3>
                                        $product_name
                                    </h3>
                                    <span class='price'>$$product_price</span>
                                    <div class='button'>
                                        <a href='details.php?p_cat=$p_cat_id&product_id=$product_id' class='btn btn-default'>
                                            VIEW DETAILS
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    ";
            }
        }
    }
    function getResult($per_page){
        global $con;
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }
            else{
                $page = 1;
            }
            $result_product = $_GET['res'];
            $start = ($page - 1) * $per_page;
            $get_product = $con->prepare("SELECT * FROM products WHERE product_id IN($result_product) order by 1 DESC LIMIT $start,$per_page");
            $get_product->execute();
            while($result = $get_product->fetch(PDO::FETCH_ASSOC)){
                $product_id     = $result['product_id'];
                $p_cat_id       = $result['p_cat_id'];
                $product_name   = $result['product_name'];
                $product_img1   = $result['product_image1'];
                $product_price  = $result['product_price'];
                $product_price_cut  = $result['product_price_cut'];
                    echo "
                        <div class='col-xs-12 col-sm-6 col-md-4 single'>
                            <div class='product-box'>
                                <div class='product'>
                                    <img class='img-responsive' src='Admin/Layout/images/product_images/$product_img1' alt='$product_img1'>
                                </div>
                                <div class='content'>
                                    <h3>
                                        $product_name
                                    </h3>
                                    <span class='price'>
                            ";
                        
                                        if($product_price_cut > 0)
                                            echo "<del>$$product_price</del> / <ins>$$product_price_cut</ins>";
                                        else
                                            echo "$" . $product_price;
                            echo "
                                    </span>
                                    <div class='button'>
                                        <a href='details.php?p_cat=$p_cat_id&product_id=$product_id' class='btn btn-default'>
                                            VIEW DETAILS
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    ";
                
        }
    }
    // this function to get Product Category From Database
    function getProductCat(){
       // this function to get Product Category From Database
        global $con;
        $get_categories = $con->prepare("SELECT * FROM product_categories");
        $get_categories->execute();
        while($result = $get_categories->fetch(PDO::FETCH_ASSOC))
        {
            $product_cat_id = $result['p_cat_id'];
            $product_cat_name = $result['p_cat_name'];
            echo "<li>
                    <a href='shop.php?p_cat=$product_cat_id'>
                        $product_cat_name
                    </a>
                </li>";
        }
    }
    // this function for get product from Database to shop.php by his categories
    function getProductShopCat($per_page){
        // this function for get product from Database to shop.php by his categories
        global $con;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else{
            $page = 1;
        }
        $start = ($page - 1) * $per_page;
        
        $p_cat_id  = $_GET['p_cat'];
        $get_category = $con->prepare("SELECT * FROM product_categories where p_cat_id = '$p_cat_id'");
        $get_category->execute();

        $get_product = $con->prepare("SELECT * FROM products where p_cat_id = '$p_cat_id'");
        $get_product->execute();
        $total_product  = $get_product->rowCount();

        $result = $get_category->fetch(PDO::FETCH_ASSOC);
        $p_cat_name = $result['p_cat_name'];
        $p_cat_desc = $result['p_cat_desc']; 
        $row_number = $get_category->rowCount();
        if($row_number > 0)
        {
            echo "
                <div class='col-md-12 header'>
                    <h1>$p_cat_name <span>($total_product)</span></h1>
                    <p>$p_cat_desc</p>
                </div>
            ";
            $get_product = $con->prepare("SELECT * FROM products where 
                                        p_cat_id = $p_cat_id order by 1 Desc Limit $start,$per_page");
            $get_product->execute();
            while($result = $get_product->fetch(PDO::FETCH_ASSOC))
            {
                $product_id     = $result['product_id'];
                $product_name   = $result['product_name'];
                $product_img1   = $result['product_image1'];
                $product_price  = $result['product_price'];
                $product_price_cut  = $result['product_price_cut'];
                        echo "
                            <div class='col-xs-12 col-sm-6 col-lg-4 single'>
                                <div class='product-box'>
                                    <div class='product'>
                                        <img class='img-responsive' src='Admin/Layout/images/product_images/$product_img1' alt='$product_img1'>
                                    </div>
                                    <div class='content'>
                                        <h3>
                                            $product_name
                                        </h3>
                                        <span class='price'>
                            ";
                        
                                        if($product_price_cut > 0)
                                            echo "<del>$$product_price</del> / <ins>$$product_price_cut</ins>";
                                        else
                                            echo "$" . $product_price;
                            echo "
                                        </span>
                                        <div class='button'>
                                            <a href='details.php?p_cat=$p_cat_id&product_id=$product_id' class='btn btn-default'>
                                                VIEW DETAILS
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        ";
                    
            }
        }
    }
    // this fuction to get pagination 
    function getPagination($per_page){
        // this fuction to get pagination 
        global $con;
        if(!isset($_GET["p_cat"]) && !isset($_GET["res"])){
            $query = "SELECT * FROM products";
            $get_pagintation = $con->prepare($query);
            $get_pagintation->execute();
            $total_records = $get_pagintation->rowCount();
            if($per_page > 0 && $total_records > 6){
                $total_page = ceil($total_records / $per_page);
                echo "
                    <li>
                        <a class='page-link' href='shop.php?page=1'>
                            First Page
                        </a>
                    </li>
                ";
                for($i = 1;$i <= $total_page;$i++){
                    echo "
                            <li>
                                <a class='page-link' href='shop.php?page=$i'>
                                    $i
                                </a>
                            </li>
                        ";
                    }
                echo "
                        <li>
                            <a class='page-link' href='shop.php?page=$total_page'>
                                Last Page
                            </a>
                        </li>
                    ";
                }        
        }
        else if(isset($_GET['res'])){
            $res = $_GET["res"];
            $query = "SELECT * FROM products where product_id IN($res)";
            $get_pagintation = $con->prepare($query);
            $get_pagintation->execute();
            $total_records = $get_pagintation->rowCount();
            if($per_page > 0 && $total_records > 6){
                $total_page = ceil($total_records / $per_page);
                echo "
                    <li>
                        <a class='page-link' href='result.php?res=$res&page=1'>
                            First Page
                        </a>
                    </li>
                ";
                for($i = 1;$i <= $total_page;$i++){
                    echo "
                            <li>
                                <a class='page-link' href='result.php?res=$res&page=$i'>
                                    $i
                                </a>
                            </li>
                        ";
                    }
                echo "
                        <li>
                            <a class='page-link' href='result.php?res=$res&page=$total_page'>
                                Last Page
                            </a>
                        </li>
                    ";
                }        
            }
        else if(isset($_GET['p_cat'])){
            $p_cat_id = $_GET["p_cat"];
            $query = "SELECT * FROM products where p_cat_id = $p_cat_id";
            $get_pagintation = $con->prepare($query);
            $get_pagintation->execute();
            $total_records = $get_pagintation->rowCount();
            if($per_page > 0 && $total_records > 6){
                $total_page = ceil($total_records / $per_page);
                echo "
                    <li>
                        <a class='page-link' href='shop.php?page=1'>
                            First Page
                        </a>
                    </li>
                ";
                for($i = 1;$i <= $total_page;$i++){
                    echo "
                            <li>
                                <a class='page-link' href='shop.php?p_cat=$p_cat_id&page=$i'>
                                    $i
                                </a>
                            </li>
                        ";
                    }
                echo "
                        <li>
                            <a class='page-link' href='shop.php?p_cat=$p_cat_id&page=$total_page'>
                                Last Page
                            </a>
                        </li>
                    ";
                }        
            }
        
            
    }
    function productYouLikeIt(){
        global $con;
        $product_id   = $_GET['product_id'];
        $p_cat_id   = $_GET['p_cat'];
        $query = "SELECT * FROM products where product_id != '$product_id' AND p_cat_id = '$p_cat_id' order by rand() LIMIT 0,3";
        $product_like = $con->prepare($query); 
        $product_like->execute();
        $total_product = $product_like->rowCount();
        if($total_product > 0){
            echo "<div class='col-sm-12 col-md-12 col-lg-3'>
                    <div class='box handline'>
                        <h3 class='text-center'>Products You Maybe Like</h3>
                    </div>
                </div>";
            while($result = $product_like->fetch(PDO::FETCH_ASSOC)){
                $product_id    = $result['product_id'];
                $product_name  = $result['product_name'];
                $product_price = $result['product_price'];
                $product_price_cut = $result['product_price_cut'];
                $product_img1  = $result['product_image1'];
                if($product_price_cut > 0){
                    if($_GET['p_cat'] != 2){
                        echo "
                        <div class='col-sm-12  col-lg-3 center-responsive'>
                            <div class='product-box'>
                                <div class='product'>
                                    <a href='details.php?p_cat=$p_cat_id&product_id=$product_id'>
                                        <img src='Admin/Layout/images/product_images/$product_img1' alt='$product_img1' class='img-responsive'>
                                    </a>
                                </div>
                                <div class='product-name'>
                                    <h6><a href='details.php?p_cat=$p_cat_id&product_id=$product_id'>$product_name</a></h6>
                                    <span><del>$$product_price</del> / <ins>$$product_price_cut</ins></span>
                                </div>
                            </div>
                        </div>
                    "; 
                    }
                    else{
                        echo "
                        <div class='col-sm-12  col-lg-3 center-responsive'>
                            <div class='product-box'>
                                <div class='product'>
                                    <a href='details.php?p_cat=$p_cat_id&product_id=$product_id'>
                                        <img src='Admin/Layout/images/product_images/$product_img1' alt='$product_img1' class='img-responsive' style='width:40%;margin:15px 30% !important;'>
                                    </a>
                                </div>
                                <div class='product-name'>
                                    <h6><a href='details.php?p_cat=$p_cat_id&product_id=$product_id'>$product_name</a></h6>
                                    <span><del>$$product_price</del> / <ins>$$product_price_cut</ins></span>
                                </div>
                            </div>
                        </div>
                    "; 
                    }
                }
                else{
                    if($_GET['p_cat'] != 2){
                        echo "
                            <div class='col-sm-12 col-lg-3 center-responsive'>
                                <div class='product-box'>
                                    <div class='product'>
                                        <a href='details.php?p_cat=$p_cat_id&product_id=$product_id'>
                                            <img src='Admin/Layout/images/product_images/$product_img1' alt='$product_img1' class='img-responsive'>
                                        </a>
                                    </div>
                                    <div class='product-name'>
                                        <h6><a href='details.php?p_cat=$p_cat_id&product_id=$product_id'>$product_name</a></h6>
                                        <span>$$product_price</span>
                                    </div>
                                </div>
                            </div>
                        "; 
                    }
                    else{
                        echo "
                                <div class='col-sm-12 col-lg-3 center-responsive'>
                                    <div class='product-box'>
                                        <div class='product'>
                                            <a href='details.php?p_cat=$p_cat_id&product_id=$product_id'>
                                                <img src='Admin/Layout/images/product_images/$product_img1' alt='$product_img1' class='img-responsive' style='width:40%;margin:15px 30% !important;'>
                                            </a>
                                        </div>
                                        <div class='product-name'>
                                            <h6><a href='details.php?p_cat=$p_cat_id&product_id=$product_id'>$product_name</a></h6>
                                            <span>$$product_price</span>
                                        </div>
                                    </div>
                                </div>
                        "; 
                    }
                }
                
                
            }
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
    function getTotalProductLoved(){
        global $con;
        
        if(isset($_GET["product_id"])){
            $product_id = $_GET['product_id'];
            $query = $con->prepare("SELECT * FROM product_loved where product_id = '$product_id'");
            $query->execute();

            $total_loved = $query->rowCount();

            return $total_loved;
        }
    }
?>