<div class="row header">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Insert Product Category
            </li>
        </ul>
    </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-edit"></i> Insert Product Category</h4>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Category Name:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="text" class="form-control" name="product_title">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Category Description:</label>
                            <div class="col-md-6 col-lg-12">
                                <textarea name="product_desc" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-lg-12">
                                <input type="submit" value="Insert Category" name="submit" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php 
            $content = "Category Insert Successfully";
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
                $ins_p_cat = "INSERT INTO product_categories (p_cat_name,p_cat_desc) VALUES ('$p_cat_name','$p_cat_desc')";
                $store_in_db = $con->exec($ins_p_cat);

                if($store_in_db){
                    echo "
                        <script>
                            var notify = document.getElementById('notify-success');
                                notify.classList.add('success');
                                setTimeout(function(){
                                    notify.classList.remove('success');
                                    window.open('index.php?insert_p_cat','_self');
                                },2000);
                        </script>";
                }
                else{
                    echo '<script>alert("Product Category Insert Faild")</script>';
                }
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        
    }

?>