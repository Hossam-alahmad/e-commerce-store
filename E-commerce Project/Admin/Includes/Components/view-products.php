<div class="row header">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Products
            </li>
        </ul>
    </div>
</div>
<div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-tag"></i> View Products</h4>
            <div class="table-product table-responsive">
                <form method="get" class="search" onsubmit="return check();">
                    <input type="search" name="search" class="form-control" placeholder="Search Product" id="search-inp">
                    <button type="submit" class="fa" id="search-btn">&#xf002;</button>
                </form>
                <table class="table table-bordered table-hover">
                    <thead align="center">
                        <th>Product ID:</th>
                        <th>Product Name:</th>
                        <th>Product Image:</th>
                        <th>Product Price:</th>
                        <th>Product Price Cut:</th>
                        <th>Product Sold:</th>
                        <th>Product Keywords:</th>
                        <th>Product Delete:</th>
                        <th>Product Edit:</th>
                    </thead>
                    <tbody align="center">
                        <?php 
                            if(!isset($_GET['product_search'])){
                                viewProducts();
                            }
                            else if(isset($_GET['product_search'])){
                                viewSearchProduct($_GET['product_search']);
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
    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        $query = "DELETE FROM products WHERE product_id = '$product_id'";
        $con->exec($query);
        echo "<script>
                var notify = document.getElementById('notify-success');
                    notify.classList.add('success');
                    setTimeout(function(){
                        notify.classList.remove('success');
                        window.open('index.php?view_products','_self');
                    },2000);
            </script>";
    }

?>