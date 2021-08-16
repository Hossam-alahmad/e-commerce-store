<div class="row header">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Insert Product 
            </li>
        </ul>
    </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-tag"></i> Insert Product</h4>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Title:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="text" class="form-control" name="product_title" maxlength="20">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Category:</label>
                            <div class="col-md-6 col-lg-12">
                                <select class="form-control" name="product_cat">
                                    <option value="">Select a Category Product:</option>
                                    <?php 
                                        $getCat = $con->prepare("SELECT * FROM product_categories");
                                        $getCat->execute();
                                        while($result =  $getCat->fetch(PDO::FETCH_ASSOC)){
                                            $category_id = $result['p_cat_id'];
                                            $category_name = $result['p_cat_name'];
                                            echo '<option value="' . $category_id . '">' . $category_name . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Image 1:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="file" name="product_img1" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Image 2:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="file" name="product_img2" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Image 3:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="file" name="product_img3" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Price:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="text" name="product_price" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Keywords:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="text" name="product_keywords" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Description:</label>
                            <div class="col-md-6 col-lg-12">
                                <textarea name="product_desc" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-lg-12">
                                <input type="submit" value="Insert Product" name="submit" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php 
            $content = "Product Insert Successfully";
            include "Includes/Components/notification.php";
        ?>
    </div>
    

<?php
    // Insert Data In Database MySql Using PDO
    if(isset($_POST['submit'])){
        // Get Data From Form
        $product_name = $_POST['product_title'];
        $p_cat_id = $_POST['product_cat'];
        $product_price = $_POST['product_price'];
        $product_keywords = $_POST['product_keywords'];
        $product_desc = $_POST['product_desc'];
        

        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];

        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];

        // Move the upload image to Image Folder In Admin Area
        move_uploaded_file($temp_name1,'Layout/images/product_images/' . $product_img1 . '');
        move_uploaded_file($temp_name2,'Layout/images/product_images/' . $product_img2 . '');
        move_uploaded_file($temp_name3,'Layout/images/product_images/' . $product_img3 . '');

        try{
            if($product_name != "" && $p_cat_id != "" && $product_price != "" && $product_keywords != "" && $product_desc != "" && $product_img1 != "" && $product_img2 != "" && $product_img3 != ""){
                $insert_product ="INSERT INTO products (p_cat_id,product_name,product_image1,product_image2,product_image3,product_price,product_keywords,product_description,product_date) 
                        values ('$p_cat_id','$product_name','$product_img1','$product_img2','$product_img3','$product_price','$product_keywords','$product_desc',NOW())";
                $store_in_dB = $con->exec($insert_product);

                if($store_in_dB){
                    echo "
                        <script>
                            var notify = document.getElementById('notify-success');
                                notify.classList.add('success');
                                setTimeout(function(){
                                    notify.classList.remove('success');
                                    window.open('index.php?view_products','_self');
                                },2000);
                        </script>";
                }
                else{
                    echo "<script>alert('Product Insert Faild')</script>";
                }
            }
        }
        catch(Exception $e){
            echo  $e->getMessage();
        }
        
    }

?>