<?php 
    // this function for get total of users,categories,products,orders
    function getTotal($table_name){
        // this function for get total of users,categories,products,orders
        global $con;
        $query              = $con->prepare("SELECT * FROM $table_name");
        $query->execute();
        $total              = $query->rowCount();
        return $total;
    }
    function viewNewOrders(){
        global $con;
        $query              = $con->prepare("SELECT * FROM pending_orders ORDER BY order_id DESC LIMIT 10");
        $query->execute();
        $order_no = 1;
        while($get_order = $query->fetch(PDO::FETCH_ASSOC)){
            $user_id = $get_order['user_id'];

            $user_query     = $con->prepare("SELECT * FROM users where user_id = '$user_id'");
            $user_query->execute();
            $get_user       = $user_query->fetch(PDO::FETCH_ASSOC);
            $user_email     = $get_user['user_email'];

            $product_id     = $get_order['product_id'];
            $invoice_no     = $get_order['invoice_no'];
            $quantity       = $get_order['quantity'];
            $order_status   = $get_order['order_status'];
            
            echo "
                <tbody align='center'>
                    <tr>
                        <td>$order_no</td>
                        <td>$user_email</td>
                        <td>$invoice_no</td>
                        <td>$product_id</td>
                        <td>$quantity</td>
                        <td>$order_status</td>
                    </tr>
                </tbody>
            
            ";
            $order_no++;


        }
    }
    function viewProducts(){
        global $con;
        $query = $con->prepare("SELECT * FROM Products");
        $query->execute();
        while($get_product = $query->fetch(PDO::FETCH_ASSOC)){
            $product_id       = $get_product['product_id'];
            $product_name     = $get_product['product_name'];
            $product_image    = $get_product['product_image1'];
            $product_price    = $get_product['product_price'];
            $product_price_cut    = $get_product['product_price_cut'];
            $product_keywords = $get_product['product_keywords'];
            //$product_date     = $get_product['product_date'];

            $query2 = $con->prepare("SELECT * FROM pending_orders where product_id = '$product_id'");
            $query2->execute();
            $get_sold = 0;
            while($result = $query2->fetch(PDO::FETCH_ASSOC)){
                $get_sold += $result['quantity'];
            }
            echo "
                    <tr>
                        <td>$product_id</td>
                        <td>$product_name</td>
                        <td><img class='img-responsive' src='Layout/images/product_images/$product_image' alt='$product_image' width='60px' height='40px'></td>
                        <td>$$product_price</td>
                        <td>$$product_price_cut</td>
                        <td>$get_sold</td>
                        <td>$product_keywords</td>
                        <td><a href='index.php?view_products&product_id=$product_id'><button type='submit' name='delete' class='btn btn-danger btn-block'><i class='fa fa-trash-o'></i> Delete</button></a></td>
                        <td><a href='index.php?edit_product=$product_id'><button class='btn btn-primary btn-block'><i class='fa fa-edit'></i> Edit</button></a></td>
                    </tr>
            ";
        }
    }
    function viewSearchProduct($search){
        global $con;
        $query = $con->prepare("SELECT * FROM Products where product_name = '$search' OR product_keywords = '$search' ");
        $query->execute();
        $record = $query->rowCount();
        if($record > 0){
            while($get_product = $query->fetch(PDO::FETCH_ASSOC)){
                $product_id       = $get_product['product_id'];
                $product_name     = $get_product['product_name'];
                $product_image    = $get_product['product_image1'];
                $product_price    = $get_product['product_price'];
                $product_price_cut    = $get_product['product_price_cut'];
                $product_keywords = $get_product['product_keywords'];
                //$product_date     = $get_product['product_date'];
    
                $query2 = $con->prepare("SELECT * FROM pending_orders where product_id = '$product_id'");
                $query2->execute();
                $get_sold = $query->rowCount();
                echo "
                        <tr>
                            <td>$product_id</td>
                            <td>$product_name</td>
                            <td><img class='img-responsive' src='Layout/images/product_images/$product_image' alt='$product_image' width='60px' height='40px'></td>
                            <td>$$product_price</td>
                            <td>$$product_price_cut</td>
                            <td>$get_sold</td>
                            <td>$product_keywords</td>
                            <td><a href='index.php?view_products&product_id=$product_id'><button type='submit' name='delete' class='btn btn-danger btn-block'><i class='fa fa-trash-o'></i> Delete</button></a></>
                            <td><a href='index.php?edit_product=$product_id'><button class='btn btn-primary btn-block'><i class='fa fa-edit'></i>Edit</button></a></td>
                        </tr>
                ";
            }
        }
    }
    function viewProductCategories(){
        global $con;
        $query = $con->prepare("SELECT * FROM product_categories");
        $query->execute();
        $record = $query->rowCount();
        if($record > 0){
            while($get_p_cat = $query->fetch(PDO::FETCH_ASSOC)){
                $p_cat_id       = $get_p_cat['p_cat_id'];
                $p_cat_name     = $get_p_cat['p_cat_name'];
                $p_cat_desc     = $get_p_cat['p_cat_desc'];
                echo "
                        <tr>
                            <td>$p_cat_id</td>
                            <td>$p_cat_name</td>
                            <td>$p_cat_desc</td>
                            <td><a href='index.php?view_p_cats&p_cat_id=$p_cat_id'><button type='submit' name='delete' class='btn btn-danger btn-block'><i class='fa fa-trash-o'></i> Delete</button></a></td>
                            <td><a href='index.php?edit_p_cat=$p_cat_id'><button class='btn btn-primary btn-block'><i class='fa fa-edit'></i> Edit</button></a></td>
                        </tr>
                ";
            }
        }
    }
    function viewSearchProductCategories($search){
        global $con;
        $query = $con->prepare("SELECT * FROM product_categories where p_cat_name = '$search'");
        $query->execute();
        while($get_p_cat = $query->fetch(PDO::FETCH_ASSOC)){
            $p_cat_id       = $get_p_cat['p_cat_id'];
            $p_cat_name     = $get_p_cat['p_cat_name'];
            $p_cat_desc     = $get_p_cat['p_cat_desc'];
            echo "
                    <tr>
                        <td>$p_cat_id</td>
                        <td>$p_cat_name</td>
                        <td>$p_cat_desc</td>
                        <td><a href='index.php?view_p_cats&p_cat_id=$p_cat_id'><button type='submit' name='delete' class='btn btn-danger btn-block'><i class='fa fa-trash-o'></i> Delete</button></a></td>
                        <td><a href='index.php?edit_p_cat=$p_cat_id'><button class='btn btn-primary btn-block'><i class='fa fa-edit'></i> Edit</button></a></td>
                    </tr>
            ";
        }
    }
    function veiwSlides(){
        global $con;
        $query = $con->prepare("SELECT * FROM slider");
        $query->execute();
            while($get_slide = $query->fetch(PDO::FETCH_ASSOC)){
                $slide_id       = $get_slide['slide_id'];
                $slide_name     = $get_slide['slide_name'];
                $slide_image     = $get_slide['slide_image'];
                echo "
                        <tr>
                            <td>$slide_id</td>
                            <td>$slide_name</td>
                            <td><img class='img-responsive' src='Layout/images/main_slider/$slide_image' alt='$slide_image' width='80px' height='60px'></td>
                            <td><a href='index.php?view_slides&slide_id=$slide_id'><button type='submit' name='delete' class='btn btn-danger btn-block'><i class='fa fa-trash-o'></i> Delete</button></a></td>
                            <td><a href='index.php?edit_slide=$slide_id'><button class='btn btn-primary btn-block'><i class='fa fa-edit'></i> Edit</button></a></td>
                        </tr>
                ";
            }
    }
    function viewSearchSlides($search){
        global $con;
        $query = $con->prepare("SELECT * FROM slider where slide_name = '$search'");
        $query->execute();
        $record = $query->rowCount();
        if($record > 0){
            while($get_slide = $query->fetch(PDO::FETCH_ASSOC)){
                $slide_id       = $get_slide['slide_id'];
                $slide_name     = $get_slide['slide_name'];
                $slide_image     = $get_slide['slide_image'];
                echo "
                        <tr>
                            <td>$slide_id</td>
                            <td>$slide_name</td>
                            <td><img class='img-responsive' src='Layout/images/main_slider/$slide_image' alt='$slide_image' width='80px' height='60px'></td>
                            <td><a href='index.php?view_slides&slide_id=$slide_id'><button type='submit' name='delete' class='btn btn-danger btn-block'><i class='fa fa-trash-o'></i> Delete</button></a></td>
                            <td><a href='index.php?edit_slide=$slide_id'><button class='btn btn-primary btn-block'><i class='fa fa-edit'></i> Edit</button></a></td>
                        </tr>
                ";
            }
        }
    }
    function viewBoxes(){
        global $con;
        $query = $con->prepare("SELECT * FROM boxes");
                $query->execute();
                while($get_box = $query->fetch(PDO::FETCH_ASSOC)){
                    $box_id    = $get_box['box_id'];
                    $box_title = $get_box['box_title'];
                    $box_desc  = $get_box['box_desc'];

                    echo "
                        <div class='section-box col-lg-4 col-md-6'>
                            <h5 class='header'>$box_title</h5>
                            <p>$box_desc</p>
                            <div>
                                <a href='index.php?edit_boxes=$box_id' class='pull-left'><button type='submit' name='delete' class='btn btn-primary btn-block'><i class='fa fa-edit'></i> Edit</button></a>
                                <a href='index.php?view_boxes&box_id=$box_id' class='pull-right'><button type='submit' name='delete' class='btn btn-danger btn-block'><i class='fa fa-trash-o'></i> Remove</button></a>
                            </div>
                        </div>
                    ";
                }
    }
    function viewUsers(){
        global $con;
        $query = $con->prepare("SELECT * FROM users");
        $query->execute();
            while($get_user = $query->fetch(PDO::FETCH_ASSOC)){
                $user_id        = $get_user['user_id'];
                $user_name      = $get_user['user_name'];
                $user_image     = $get_user['user_image'];
                $user_email     = $get_user['user_email'];
                $user_birth     = $get_user['user_birth'];
                $user_gender    = $get_user['user_gender'];
                $user_country   = $get_user['user_country'];
                $user_city      = $get_user['user_city'];
                echo "
                        <tr>
                            <td>$user_id</td>
                            <td>$user_name</td>
                            <td><img class='img-responsive' src='../Users/Layout/images/users-image/$user_image' alt='$user_image' width='80px' height='60px'></td>
                            <td>$user_email</td>
                            <td>$user_birth</td>
                            <td>$user_gender</td>
                            <td>$user_country</td>
                            <td>$user_city</td>
                            <td><a href='index.php?view_users&user_id=$user_id'><button type='submit' name='delete' class='btn btn-danger btn-block'><i class='fa fa-trash-o'></i> Delete</button></a></td>
                        </tr>
                ";
            }
    }
    function viewSearchUsers($search){
        global $con;
        $query = $con->prepare("SELECT * FROM users where user_name = '$search'");
        $query->execute();
            while($get_user = $query->fetch(PDO::FETCH_ASSOC)){
                $user_id        = $get_user['user_id'];
                $user_name      = $get_user['user_name'];
                $user_image     = $get_user['user_image'];
                $user_email     = $get_user['user_email'];
                $user_birth     = $get_user['user_birth'];
                $user_gender    = $get_user['user_gender'];
                $user_country   = $get_user['user_country'];
                $user_city      = $get_user['user_city'];
                echo "
                        <tr>
                            <td>$user_id</td>
                            <td>$user_name</td>
                            <td><img class='img-responsive' src='../Users/Layout/images/users-image/$user_image' alt='$user_image' width='80px' height='60px'></td>
                            <td>$user_email</td>
                            <td>$user_birth</td>
                            <td>$user_gender</td>
                            <td>$user_country</td>
                            <td>$user_city</td>
                            <td><a href='index.php?view_users&user_id=$user_id'><button type='submit' name='delete' class='btn btn-danger btn-block'><i class='fa fa-trash-o'></i> Delete</button></a></td>
                        </tr>
                ";
            }
    }
    function viewOrders(){
        global $con;
        $query              = $con->prepare("SELECT * FROM pending_orders");
        $query->execute();
        while($get_order = $query->fetch(PDO::FETCH_ASSOC)){
            $user_id = $get_order['user_id'];

            $user_query     = $con->prepare("SELECT * FROM users where user_id = '$user_id'");
            $user_query->execute();
            $get_user       = $user_query->fetch(PDO::FETCH_ASSOC);
            $user_email     = $get_user['user_email'];

            $order_id       = $get_order['order_id'];
            $product_id     = $get_order['product_id'];
            $invoice_no     = $get_order['invoice_no'];
            $quantity       = $get_order['quantity'];
            $order_status   = $get_order['order_status'];
            
            echo "
                <tbody align='center'>
                    <tr>
                        <td>$order_id</td>
                        <td>$user_email</td>
                        <td>$invoice_no</td>
                        <td>$product_id</td>
                        <td>$quantity</td>
                        <td>$order_status</td>
                        <td><a href='index.php?view_orders&order_id=$order_id'><button type='submit' name='delete' class='btn btn-danger btn-block'><i class='fa fa-trash-o'></i> Delete</button></a></td>
                    </tr>
                </tbody>
            
            ";


        }
    }
    function viewSearchOrders($search){
        global $con;
        $query              = $con->prepare("SELECT * FROM pending_orders where invoice_no = '$search' OR order_status = '$search'");
        $query->execute();
        while($get_order = $query->fetch(PDO::FETCH_ASSOC)){
            $user_id = $get_order['user_id'];

            $user_query     = $con->prepare("SELECT * FROM users where user_id = '$user_id'");
            $user_query->execute();
            $get_user       = $user_query->fetch(PDO::FETCH_ASSOC);
            $user_email     = $get_user['user_email'];

            $order_id       = $get_order['order_id'];
            $product_id     = $get_order['product_id'];
            $invoice_no     = $get_order['invoice_no'];
            $quantity       = $get_order['quantity'];
            $order_status   = $get_order['order_status'];
            
            echo "
                <tbody align='center'>
                    <tr>
                        <td>$order_id</td>
                        <td>$user_email</td>
                        <td>$invoice_no</td>
                        <td>$product_id</td>
                        <td>$quantity</td>
                        <td>$order_status</td>
                        <td><a href='index.php?view_orders&order_id=$order_id'><button type='submit' name='delete' class='btn btn-danger btn-block'><i class='fa fa-trash-o'></i> Delete</button></a></td>
                    </tr>
                </tbody>
            
            ";


        }
    }
    function viewPayments(){
        global $con;
        $query              = $con->prepare("SELECT * FROM payments");
        $query->execute();
        while($get_payment = $query->fetch(PDO::FETCH_ASSOC)){
            $payment_id         = $get_payment['payment_id'];
            $invoice_no         = $get_payment['invoice_no'];
            $amount             = $get_payment['amount'];
            $payment_method     = $get_payment['payment_method'];
            $ref_no             = $get_payment['ref_no'];
            $payment_code       = $get_payment['payment_code'];
            $payment_date       = $get_payment['payment_date'];
            
            echo "
                <tbody align='center'>
                    <tr>
                        <td>$payment_id</td>
                        <td>$invoice_no</td>
                        <td>$$amount</td>
                        <td>$payment_method</td>
                        <td>$ref_no</td>
                        <td>$payment_code</td>
                        <td>$payment_date</td>
                        <td><a href='index.php?view_payments&payment_id=$payment_id'><button type='submit' name='delete' class='btn btn-danger btn-block'><i class='fa fa-trash-o'></i> Delete</button></a></td>
                    </tr>
                </tbody>
            
            ";
        }
    }
    function viewSearchPayments($search){
        global $con;
        $query              = $con->prepare("SELECT * FROM payments where invoice_no = '$search' OR
                                                                        amount = '$search' OR
                                                                        payment_method = '$search' OR
                                                                        ref_no = '$search' OR
                                                                        payment_code = '$search' OR
                                                                        payment_date = '$search'");
        $query->execute();
        while($get_payment = $query->fetch(PDO::FETCH_ASSOC)){
            $payment_id         = $get_payment['payment_id'];
            $invoice_no         = $get_payment['invoice_no'];
            $amount             = $get_payment['amount'];
            $payment_method     = $get_payment['payment_method'];
            $ref_no             = $get_payment['ref_no'];
            $payment_code       = $get_payment['payment_code'];
            $payment_date       = $get_payment['payment_date'];
            
            echo "
                <tbody align='center'>
                    <tr>
                        <td>$payment_id</td>
                        <td>$invoice_no</td>
                        <td>$$amount</td>
                        <td>$payment_method</td>
                        <td>$ref_no</td>
                        <td>$payment_code</td>
                        <td>$payment_date</td>
                        <td><a href='index.php?view_payments&payment_id=$payment_id'><button type='submit' name='delete' class='btn btn-danger btn-block'><i class='fa fa-trash-o'></i> Delete</button></a></td>
                    </tr>
                </tbody>
            
            ";
        }
    }
    function viewAdmins(){
        global $con;
        $admins_level = $_SESSION['admin_level'];
        $query = $con->prepare("SELECT * FROM admins");
        $query->execute();
            while($get_admin = $query->fetch(PDO::FETCH_ASSOC)){
                $admin_id        = $get_admin['admin_id'];
                $admin_name      = $get_admin['admin_name'];
                $admin_image     = $get_admin['admin_image'];
                $admin_email     = $get_admin['admin_email'];
                $admin_birth     = $get_admin['admin_birth'];
                $admin_gender    = $get_admin['admin_gender'];
                $admin_country   = $get_admin['admin_country'];
                $admin_city      = $get_admin['admin_city'];
                $admin_level      = $get_admin['admin_level'];
                if($admins_level != 1 || $admin_id == 1){
                    echo "
                        <tr>
                            <td>$admin_id</td>
                            <td>$admin_name</td>
                            <td><img class='img-responsive' src='Layout/images/admins-images/$admin_image' alt='$admin_image' width='80px' height='60px'></td>
                            <td>$admin_email</td>
                            <td>$admin_birth</td>
                            <td>$admin_gender</td>
                            <td>$admin_country</td>
                            <td>$admin_city</td>
                            <td>$admin_level</td>
                            <td><a href='index.php?view_admins'><button type='submit' name='delete' class='btn btn-danger btn-block'>Not Allow</button></a></td>
                        </tr>
                    ";
                }
                else{
                    echo "
                        <tr>
                            <td>$admin_id</td>
                            <td>$admin_name</td>
                            <td><img class='img-responsive' src='Layout/images/admins-images/$admin_image' alt='$admin_image' width='80px' height='60px'></td>
                            <td>$admin_email</td>
                            <td>$admin_birth</td>
                            <td>$admin_gender</td>
                            <td>$admin_country</td>
                            <td>$admin_city</td>
                            <td>$admin_level</td>
                            <td><a href='index.php?view_admins&admin_id=$admin_id'><button type='submit' name='delete' class='btn btn-danger btn-block'><i class='fa fa-trash-o'></i> Delete</button></a></td>
                        </tr>
                    ";
                }
            }
    }
    function viewSearchAdmins($search){
        global $con;
        $admins_level = $_SESSION['admin_level'];
        $query = $con->prepare("SELECT * FROM admins where admin_name = '$search'");
        $query->execute();
            while($get_admin = $query->fetch(PDO::FETCH_ASSOC)){
                $admin_id        = $get_admin['admin_id'];
                $admin_name      = $get_admin['admin_name'];
                $admin_image     = $get_admin['admin_image'];
                $admin_email     = $get_admin['admin_email'];
                $admin_birth     = $get_admin['admin_birth'];
                $admin_gender    = $get_admin['admin_gender'];
                $admin_country   = $get_admin['admin_country'];
                $admin_city      = $get_admin['admin_city'];
                $admin_level      = $get_admin['admin_level'];
                if($admins_level != 1 || $admin_id == 1){
                    echo "
                        <tr>
                            <td>$admin_id</td>
                            <td>$admin_name</td>
                            <td><img class='img-responsive' src='Layout/images/admins-images/$admin_image' alt='$admin_image' width='80px' height='60px'></td>
                            <td>$admin_email</td>
                            <td>$admin_birth</td>
                            <td>$admin_gender</td>
                            <td>$admin_country</td>
                            <td>$admin_city</td>
                            <td>$admin_level</td>
                            <td><a href='index.php?view_admins'><button type='submit' name='delete' class='btn btn-danger btn-block'>Not Allow</button></a></td>
                        </tr>
                    ";
                }
                else{
                    echo "
                        <tr>
                            <td>$admin_id</td>
                            <td>$admin_name</td>
                            <td><img class='img-responsive' src='Layout/images/admins-images/$admin_image' alt='$admin_image' width='80px' height='60px'></td>
                            <td>$admin_email</td>
                            <td>$admin_birth</td>
                            <td>$admin_gender</td>
                            <td>$admin_country</td>
                            <td>$admin_city</td>
                            <td>$admin_level</td>
                            <td><a href='index.php?view_admins&admin_id=$admin_id'><button type='submit' name='delete' class='btn btn-danger btn-block'><i class='fa fa-trash-o'></i> Delete</button></a></td>
                        </tr>
                    ";
                }
            }
    }
    function viewAdminsLevel(){
        global $con;
        $query = $con->prepare("SELECT * FROM admins");
        $query->execute();
            while($get_admin = $query->fetch(PDO::FETCH_ASSOC)){
                $admin_id        = $get_admin['admin_id'];
                $admin_name      = $get_admin['admin_name'];
                $admin_image     = $get_admin['admin_image'];
                $admin_email     = $get_admin['admin_email'];
                $admin_birth     = $get_admin['admin_birth'];
                $admin_gender    = $get_admin['admin_gender'];
                $admin_country   = $get_admin['admin_country'];
                $admin_city      = $get_admin['admin_city'];
                $admin_level      = $get_admin['admin_level'];
                if($admin_id == 1){
                    echo "
                        <tr>
                            <td>$admin_id</td>
                            <td>$admin_name</td>
                            <td><img class='img-responsive' src='Layout/images/admins-images/$admin_image' alt='$admin_image' width='80px' height='60px'></td>
                            <td>$admin_email</td>
                            <td>$admin_birth</td>
                            <td>$admin_gender</td>
                            <td>$admin_level</td>
                            <td><a href='index.php?admin_id=$admin_id'><button type='submit' name='edit' class='btn btn-primary btn-block'><i class='fa fa-edit'></i> Edit</button></a></td>
                        </tr>
                    ";
                }
                else{
                    echo "
                        <tr>
                            <td>$admin_id</td>
                            <td>$admin_name</td>
                            <td><img class='img-responsive' src='Layout/images/admins-images/$admin_image' alt='$admin_image' width='80px' height='60px'></td>
                            <td>$admin_email</td>
                            <td>$admin_birth</td>
                            <td>$admin_gender</td>
                            <td>$admin_level</td>
                            <td><a href='index.php?admin_id=$admin_id'><button type='submit' name='edit' class='btn btn-primary btn-block'><i class='fa fa-edit'></i> Edit</button></a></td>
                        </tr>
                    ";
                }
            }
    }
    
?>