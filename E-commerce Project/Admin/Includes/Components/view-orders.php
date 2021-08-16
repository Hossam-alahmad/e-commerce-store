<div class="row header">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Orders
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h4 class="page-header"><i class="fa fa-fw fa-handshake-o"></i> View Orders</h4>
        <div class="table-product table-responsive">
            <form method="get" class="search" onsubmit="return check();">
                    <input type="search" name="search" class="form-control" placeholder="Search Orders (Invoice/Status)" id="search-inp">
                    <button type="submit" class="fa" id="search-btn">&#xf002;</button>
            </form>
            <table class="table table-bordered table-hover">
                <thead align="center">
                    <tr>
                        <th>Order ID:</th>
                        <th>User Email:</th>
                        <th>Invoice No:</th>
                        <th>Product ID:</th>
                        <th>Product Quantity:</th>
                        <th>Status:</th>
                        <th>Delete Order:</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php 
                        if(!isset($_GET['orders_search'])){
                            viewOrders();
                        }
                        else if(isset($_GET['orders_search'])){
                            viewSearchOrders($_GET['orders_search']);
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
        <?php 
            $content = "Delete Successfully";
            include "Includes/Components/notification.php";
        ?>
</div>
<?php 
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        $query = "DELETE FROM pending_orders WHERE order_id = '$order_id'";
        $con->exec($query);
        echo "<script>
                var notify = document.getElementById('notify-success');
                    notify.classList.add('success');
                    setTimeout(function(){
                        notify.classList.remove('success');
                        window.open('index.php?view_orders','_self');
                    },2000);
            </script>";
    }

?>