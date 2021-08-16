<?php 
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
    }
    include 'Includes/Components/header.php';
?>
    <div class="breadcrumb-box" id="breadcrumb-box"> <!-- breadcrumb-box Start -->
        <div class="container"> <!-- container Start -->
            <div class="col-md-12"> <!-- col-md-12 Start -->
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Confirm Paid
                    </li>
                </ul>
            </div> <!-- col-md-12 Finish -->
        </div> <!-- container Finish -->
    </div> <!-- breadcrumb-box Finish -->
    <div class="confirm-content">
        <div class="container">
            <div class="row">
                <?php  
                    include 'Includes/Components/user-sidebar.php';
                ?>
                <div class="col-md-8 col-lg-9">
                    <div class="box">
                        <h1 class="text-center">Please Confirm Your Payment</h1>
                        <form action="confirm-paid.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Invoice No:</label>
                                <input type="text" class="form-control" name="invoice_no" value="<?php if(isset($_GET['invoice_no'])) echo $_GET['invoice_no']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Amount Sent:</label>
                                <input type="text" class="form-control" name="amount" value="<?php if(isset($_GET['amount'])) echo $_GET['amount']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Select Payment Method:</label>
                                <select name="payment_method" class="form-control">
                                    <option disabled selected>Select Payment Method</option>
                                    <option value="Paypal">Paypal</option>
                                    <option value="Master Card">Master Card</option>
                                    <option value="Payoneer">Payoneer</option>
                                    <option value="Visa Card">Visa Card</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Transaction / References ID:</label>
                                <input type="text" class="form-control" name="ref_no">
                            </div>
                            <div class="form-group">
                                <label for="">Paypal / Master Card / Payoneer / Visa Card :</label>
                                <input type="text" class="form-control" name="code">
                            </div>
                            <!-- 
                            <div class="form-group">
                                <label for="">Payment Date:</label>
                                <input type="text" class="form-control" name="pay_date" value="<?php ; ?>">
                            </div>

                            -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-lg" name="confirm-payment">
                                    <i class="fa fa-user-md"></i> Confirm Payment
                                </button>
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['confirm-payment'])){
                                $update_id      = $_GET['update_id'];
                                $invoice_no     = $_POST['invoice_no'];
                                $amount         = $_POST['amount'];
                                $payment_method = $_POST['payment_method'];
                                $ref_no         = $_POST['ref_no'];
                                $payment_code   = $_POST['code'];
                                $complete       = "Complete";

                                $insert_query = "INSERT INTO payments (invoice_no,amount,payment_method,ref_no,payment_code,payment_date) 
                                            VALUES ('$invoice_no','$amount','$payment_method','$ref_no','$payment_code',NOW())";
                                $con->exec($insert_query);

                                $update_query = "UPDATE user_orders SET order_status = '$complete' where order_id = '$update_id' ";
                                $con->exec($update_query);

                                $update_query = "UPDATE pending_orders SET order_status = '$complete' where order_id = '$update_id' ";
                                $con->exec($update_query);

                                echo "<script>alert('Thank you for purchasing, your orders will be completed within 24 hours work');</script>";
                                echo "<script>window.open('my-account.php?my_orders','_self');</script>";
                            }
                        ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <?php
        include 'Includes/Components/footer.php';
    ?>

    <script src="Layout/js/jquery-3.4.1.min.js"></script>
    <script src="Layout/js/popper.min.js"></script>
    <script src="Layout/js/bootstrap.min.js"></script>
    </body>
</html> 