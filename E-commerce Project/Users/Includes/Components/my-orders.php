<center>
    <h1>My Orders</h1>
    <p class="load">Your orders on one place</p>
    <p class="text-muted">
        If you have any questions, feel to <a href="../contact.php">Contact Us</a>. Our Customer Service work.
    </p>
</center>
<hr>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>NO:</th>
                <th>Due Ammount:</th>
                <th>Invoice No:</th>
                <th>Quantity:</th>
                <th>Order Date:</th>
                <th>Paid/Unpaid:</th>
                <th>Status:</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                // connect to database users table to get user id 
                $get_user = $con->prepare("SELECT * FROM users where user_email = ? AND user_ip = ?");
                $get_user->execute([$_SESSION['user_email'],$_SESSION['user_ip']]);
                $result = $get_user->fetch(PDO::FETCH_ASSOC);
                $user_id = $result['user_id'];
                // connect to database user_orders table to get products
                $get_orders = $con->prepare("SELECT * FROM user_orders where user_id = '$user_id' ");
                $get_orders->execute();
                $i = 1;
                while($result = $get_orders->fetch(PDO::FETCH_ASSOC)){
                    $order_id = $result['order_id'];
                    $due_amount = $result['due_amount'];
                    $invoice_no = $result['invoice_no'];
                    $quantity = $result['quantity'];
                    $order_date = $result['order_date'];
                    if($result['order_status'] == "Pending")
                        $order_status = "Unpaid";
                    else
                        $order_status = "Paid";

                    echo "
                            <tr align='center'>
                                <td>$i</td>
                                <td>$$due_amount</td>
                                <td>$invoice_no</td>
                                <td>$quantity</td>
                                <td>$order_date</td>
                                <td>$order_status</td>
                        ";
                        if($order_status == "Unpaid"){
                            echo "
                                    <td>
                                        <a href='confirm-paid.php?order_id=$order_id&invoice_no=$invoice_no&amount=$due_amount' target='_blank' class='btn btn-danger'>Confirm Paid</a>
                                    </td>
                            </tr>";
                        }
                        else{
                            echo "
                                    <td>
                                        <div href='#' class='btn btn-primary'>Paid Success</div>
                                    </td>
                            </tr>";
                        }
                    $i++;
                }
            ?>
        </tbody>
    </table>
</div>