<div class="row header">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
        <hr>
        <ul class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
        </ul>
    </div>
</div>
<div class="row analyse">
    <div class="card-box col-sm-12 col-lg-3 col-md-6">
            <div class="row">
                <div class="icon col-sm-4">
                    <i class="fa fa-tasks fa5x"></i>
                </div>
                <div class="content col-sm-8">
                    <div>
                        <span><?php echo getTotal("products"); ?></span>
                        <span>Products</span>
                    </div>
                </div>
            </div>
            <a href="index.php?view_products">
                <div class="footer">
                    <span class="pull-left">
                        View Details
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                </div>
            </a>
    </div>
    <div class="card-box col-lg-3 col-md-6">
            <div class="row">
                <div class="icon col-sm-4">
                    <i class="fa fa-users fa5x"></i>
                </div>
                <div class="content col-sm-8">
                    <div>
                        <span><?php echo getTotal("users"); ?></span>
                        <span>Users</span>
                    </div>
                </div>
            </div>
            <a href="index.php?view_products">
                <div class="footer">
                    <span class="pull-left">
                        View Details
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                </div>
            </a>
    </div>
    <div class="card-box col-lg-3 col-md-6">
            <div class="row">
                <div class="icon col-sm-4">
                    <i class="fa fa-tag fa5x"></i>
                </div>
                <div class="content col-sm-8">
                    <div>
                        <span><?php echo getTotal("product_categories"); ?></span>
                        <span>Product Categories</span>
                    </div>
                </div>
            </div>
            <a href="index.php?view_p_cats">
                <div class="footer">
                    <span class="pull-left">
                        View Details
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                </div>
            </a>
    </div>
    <div class="card-box col-lg-3 col-md-6">
            <div class="row">
                <div class="icon col-sm-4">
                    <i class="fa fa-shopping-cart fa5x"></i>
                </div>
                <div class="content col-sm-8">
                    <div>
                        <span><?php echo getTotal("pending_orders"); ?></span>
                        <span>Orders</span>
                    </div>
                </div>
            </div>
            <a href="index.php?view_orders">
                <div class="footer">
                    <span class="pull-left">
                        View Details
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                </div>
            </a>
    </div>
</div>
<div class="row orders">
    <div class="new-orders">
        <div class="header">
            <i class="fa fa-money"></i> New Orders
        </div>
        <div class="orders-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Order No:</th>
                        <th>User Email:</th>
                        <th>Invoice No:</th>
                        <th>Product ID:</th>
                        <th>Product Quantity:</th>
                        <th>Status:</th>
                    </tr>
                </thead>
                <?php viewNewOrders(); ?>
            </table>
            <a href="index.php?view_orders">
                <spnn class="pull-right">View All Orders <i class="fa fa-arrow-circle-right"></i></spn>
            </a>
        </div>
    </div>
</div>
