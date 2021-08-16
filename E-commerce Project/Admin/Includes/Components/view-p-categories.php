<div class="row header">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Product Categories
            </li>
        </ul>
    </div>
</div>
<div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-edit"></i> View Product Categories</h4>
            <div class="table-product table-responsive">
                <form method="get" class="search" onsubmit="return check();">
                    <input type="search" name="search" class="form-control" placeholder="Search Product Category" id="search-inp">
                    <button type="submit" class="fa" id="search-btn">&#xf002;</button>
                </form>
                <table class="table table-bordered table-hover">
                    <thead align="center">
                        <tr>
                            <th class="p-cat-id">Product Category ID:</th>
                            <th>Product Name:</th>
                            <th>Product Description:</th>
                            <th class="delete-edit">Product Category Delete:</th>
                            <th class="delete-edit">Product Category Edit:</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        <?php 
                            if(!isset($_GET['p_cat_search'])){
                                viewProductCategories();
                            }
                            else if(isset($_GET['p_cat_search'])){
                                viewSearchProductCategories($_GET['p_cat_search']);
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
    if(isset($_GET['p_cat_id'])){
        $p_cat_id = $_GET['p_cat_id'];
        $query = "DELETE FROM product_categories WHERE p_cat_id = '$p_cat_id'";
        $con->exec($query);
        echo "<script>
                var notify = document.getElementById('notify-success');
                    notify.classList.add('success');
                    setTimeout(function(){
                        notify.classList.remove('success');
                        window.open('index.php?view_p_cats','_self');
                    },2000);
            </script>";
    }

?>