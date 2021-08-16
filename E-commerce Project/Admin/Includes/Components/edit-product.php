<?php 
    if(isset($_GET['edit_product'])){
        $product_id = $_GET['edit_product'];
        $query = $con->prepare("SELECT * FROM Products where product_id = '$product_id'");
        $query->execute();
        $get_product       = $query->fetch(PDO::FETCH_ASSOC);
        $p_cat_id          = $get_product['p_cat_id'];
        $product_name      = $get_product['product_name'];
        $product_image1    = $get_product['product_image1'];
        $product_image2    = $get_product['product_image2'];
        $product_image3    = $get_product['product_image3'];
        $product_price     = $get_product['product_price'];
        $product_price_cut     = $get_product['product_price_cut'];
        $product_keywords  = $get_product['product_keywords'];
        $product_desc      = $get_product['product_description'];
        $product_date      = $get_product['product_date'];
    }
?>
<div class="row header">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edit Product 
            </li>
        </ul>
    </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-tag"></i> Edit Product</h4>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Title:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="text" class="form-control" name="product_title" value="<?php echo $product_name; ?>">
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
                                            $categoryId = $result['p_cat_id'];
                                            $categoryName = $result['p_cat_name'];
                                            if($categoryId == $p_cat_id)
                                                echo '<option value="' . $categoryId . '" selected>' . $categoryName . '</option>';
                                            else
                                                echo '<option value="' . $categoryId . '">' . $categoryName . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Image 1:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="file" name="product_img1" class="form-control">
                                <div class="img-box">
                                    <img src="Layout/Images/product_images/<?php echo $product_image1; ?>" class="img-responsive">
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Image 2:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="file" name="product_img2" class="form-control" >
                                <div class="img-box">
                                    <img src="Layout/Images/product_images/<?php echo $product_image2; ?>" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Image 3:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="file" name="product_img3" class="form-control">
                                <div class="img-box">
                                    <img src="Layout/Images/product_images/<?php echo $product_image3; ?>" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Price:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="text" name="product_price" class="form-control" value="<?php echo $product_price; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Price Cut:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="text" name="product_price_cut" class="form-control" value="<?php echo $product_price_cut; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Keywords:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="text" name="product_keywords" class="form-control" value="<?php echo $product_keywords; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Description:</label>
                            <div class="col-md-6 col-lg-12">
                                <textarea name="product_desc" class="form-control" rows="5"><?php echo $product_desc; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-lg-12">
                                <input type="submit" value="Edit Product" name="submit" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php 
            $content = "Product Edit Successfully";
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
        $product_price_cut = $_POST['product_price_cut'];
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
            if($product_img1 == ""){
                $product_img1 = $product_image1;
            }
            else{
                $location = "../../Layout/images/product_images/" . $product_image1;
                unlink(realpath($location));
            }
            if($product_img2 == ""){
                $product_img2 = $product_image2;
            }
            else{
                $location = "../../Layout/images/product_images/" . $product_image2;
                unlink(realpath($location));
            }
            if($product_img3 == ""){
                $product_img3 = $product_image3;
            }
            else{
                $location = "../../Layout/images/product_images/" . $product_image3;
                unlink(realpath($location));
            }
            if($product_name != "" && $p_cat_id != "" && $product_price != "" && $product_keywords != "" && $product_desc != "" && $product_img1 != "" && $product_img2 != "" && $product_img3 != "" && $product_price_cut != ""){
                $edit_product ="UPDATE products SET p_cat_id = '$p_cat_id',
                                                    product_name = '$product_name',
                                                    product_image1 = '$product_img1',
                                                    product_image2 = '$product_img2',
                                                    product_image3 = '$product_img3',
                                                    product_price  = '$product_price',
                                                    product_price_cut = '$product_price_cut',
                                                    product_keywords = '$product_keywords',
                                                    product_description = '$product_desc',
                                                    product_date = NOW() 
                                                    WHERE product_id = $product_id;";
                $store_in_db = $con->exec($edit_product);

                if($store_in_db){
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
                    echo '<script>alert("Product Edit Faild")</script>';
                }
            }
        }
        catch(Exception $e){
            echo '<script>alert("Product Edit Faild")</script>';
        }
        
    }

?>