<?php 
    if(isset($_GET['edit_p_cat'])){
        $p_cat_id = $_GET['edit_p_cat'];
        $query = $con->prepare("SELECT * FROM product_categories where p_cat_id = '$p_cat_id'");
        $query->execute();
        $record = $query->rowCount();
        if($record > 0){
            $get_p_cat = $query->fetch(PDO::FETCH_ASSOC);
            $p_cat_name = $get_p_cat['p_cat_name'];
            $p_cat_desc = $get_p_cat['p_cat_desc'];
        }
    }
?>
<div class="row header">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edit Product Category
            </li>
        </ul>
    </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-edit"></i> Edit Product Category</h4>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Category Name:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="text" class="form-control" name="product_title" value="<?php echo $p_cat_name; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Category Description:</label>
                            <div class="col-md-6 col-lg-12">
                                <textarea name="product_desc" class="form-control" rows="5"><?php echo $p_cat_desc; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-lg-12">
                                <input type="submit" value="Edit Category" name="submit" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php 
            $content = "Category Edit Successfully";
            include "Includes/Components/notification.php";
        ?>
    </div>
    

<?php
    // Insert Product Category In Database MySql Using PDO
    if(isset($_POST['submit'])){
        // Get Data From Form
        $p_cat_name = $_POST['product_title'];
        $p_cat_desc = $_POST['product_desc'];

        try{
            if($p_cat_name != "" && $p_cat_desc != ""){
                $edit_p_cat = "UPDATE product_categories SET p_cat_name='$p_cat_name',
                                                            p_cat_desc='$p_cat_desc'
                                                        where p_cat_id = $p_cat_id";
                $store_in_db = $con->exec($edit_p_cat);

                if($store_in_db){
                    echo "
                        <script>
                            var notify = document.getElementById('notify-success');
                                notify.classList.add('success');
                                setTimeout(function(){
                                    notify.classList.remove('success');
                                    window.open('index.php?view_p_cats','_self');
                                },2000);
                        </script>";
                }
                else{
                    echo '<script>alert("Product Category Edit Faild")</script>';
                }
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        
    }

?>