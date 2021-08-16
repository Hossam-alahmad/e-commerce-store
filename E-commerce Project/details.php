<?php 
    $active = "SHOP";
    include 'Includes/Components/header.php';
?>

    <div class="breadcrumb-box" id="breadcrumb-box"> <!-- breadcrumb-box Start -->
        <div class="container"> <!-- container Start -->
            <div class="col-md-12"> <!-- col-md-12 Start -->
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="shop.php">Shop</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"> <?php echo $p_cat_name; ?> </a>
                    </li>
                    <li class="breadcrumb-item active">
                        <?php echo $product_name; ?>
                    </li>
                </ul>
            </div> <!-- col-md-12 Finish -->
        </div> <!-- container Finish -->
    </div> <!-- breadcrumb-box Finish -->
    <div class="details-content">
        <div class="container">
            <div class="row">
                <?php 
                    include 'Includes/Components/sidebar.php';
                ?>
                <div class="col-md-8 col-lg-9 detail-content">
                    <div id="productMain" class="row">
                        <div class="col-sm-12 col-lg-6 sliderProduct">
                            <div id="mainImage" style="height:100%;">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:100%;"> 
                                    <ul class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                    </ul>
                                    <div class="carousel-inner" style="height:100%;">
                                        <?php
                                            // display all image product
                                            for($i = 0;$i<3;$i++){
                                                if($_GET['p_cat'] != 2){
                                                    if($i == 0){
                                                            echo "
                                                                <div class='carousel-item active' style='height:100%;'>
                                                                    <img class='d-block w-100' src='Admin/Layout/images/product_images/$product_img[$i]' alt='$product_img[$i]' style='height:100%;'>
                                                                </div>
                                                            ";
                                                    }
                                                    else{
                                                        echo "
                                                            <div class='carousel-item ' style='height:100%;'>
                                                                <img class='d-block w-100' src='Admin/Layout/images/product_images/$product_img[$i]' alt='$product_img[$i]' style='height:100%;'>
                                                            </div>
                                                        ";
                                                    }
                                                }
                                                else{
                                                    if($i == 0){
                                                        echo "
                                                            <div class='carousel-item active' style='height:100%;'>
                                                                <img class='d-block' src='Admin/Layout/images/product_images/$product_img[$i]' alt='$product_img[$i]' style='height:100%;margin:0 auto;'>
                                                            </div>
                                                        ";
                                                    }
                                                    else{
                                                        echo "
                                                            <div class='carousel-item ' style='height:100%;'>
                                                                <img class='d-block' src='Admin/Layout/images/product_images/$product_img[$i]' alt='$product_img[$i]' style='height:100%; margin:0 auto;'>
                                                            </div>
                                                        ";
                                                    }
                                                }
                                            }
                                        ?>
                                        
                                    </div>
                                    <div>
                                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    </div>
                                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6 details">
                            <div class="box">
                                <h3 class="text-center">
                                    <?php  echo $product_name; ?>
                                </h3>
                                <?php 
                                    if(isset($_SESSION['user_email'])){
                                        $user_email = $_SESSION['user_email'];
                                        $product_id = $_GET['product_id'];
                                        $query = $con->prepare("SELECT * FROM product_loved where product_id = '$product_id' AND user_email = '$user_email'");
                                        $query->execute();
                                        $result = $query->fetch(PDO::FETCH_ASSOC);
                                        $active = $result['active'];
                                    } 
                                ?>
                                <span class="loved" id="total-loved" data-text="<?php echo $_GET['product_id']; ?>" data-value="<?php echo getTotalProductLoved(); ?>">
                                    <?php echo getTotalProductLoved(); ?> <i class="fa fa-heart <?php echo $active; ?>" id="loved"></i></span>
                                <form  class="form-horizontal" method="post">
                                    <div class="form-group row">
                                        <label for="" class="col-md-5 control-label ">Products Quantity</label>
                                        <div class="col-md-7">
                                            <select name="product-quantity" id="" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="price row">
                                        <p class="col-md-12">Product Price: 
                                            <span>
                                                <?php 
                                                    if($product_price_cut > 0) echo "<del>$$product_price</del> / <ins>$$product_price_cut</ins>";
                                                    else echo "$$product_price";
                                            
                                                ?>
                                            </span>
                                        </p>
                                    </div>
                                    <p class="text-center buttons">
                                        <button type="submit" name="add_cart" class="btn btn-success i fa fa-shopping-cart">
                                            Add To Cart
                                        </button>
                                        <button type="submit" name="buy-now" class="btn btn-default i fa fa-shopping-cart">
                                            Buy Now
                                        </button>
                                    </p>
                                </form>
                                <?php
                                    // call addCart function to add product to cart
                                    addCart();
                                    buyNow();
                                ?>
                            </div>
                            <div class="row" id="thumbs">
                                <?php
                                    // display image thumbs products
                                    for($i = 0;$i < 3;$i++){
                                        if($_GET['p_cat'] != 2){
                                            echo "
                                            <div class='col-sm-4'>
                                                <a data-target='#myCarousel' data-slide-to='$i' href='' class='thumb'>
                                                    <img src='Admin/Layout/images/product_images/$product_img[$i]' alt='$product_img[$i]' class='img-responsive img-thumbnail'>
                                                </a>
                                            </div>
                                            ";
                                        }
                                        else{
                                            echo "
                                            <div class='col-sm-4'>
                                                <a data-target='#myCarousel' data-slide-to='$i' href='' class='thumb'>
                                                    <img src='Admin/Layout/images/product_images/$product_img[$i]' alt='$product_img[$i]' class='img-responsive img-thumbnail' style='width:60%;margin:0 20%;'>
                                                </a>
                                            </div>
                                            ";
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="box" id="details">
                        <h4>Product Details</h4>
                            <?php echo $product_desc;?>
                        <hr>
                    </div>
                    <div class="another-product row" id="another-product">
                        
                        <?php
                            // call function to display product you like
                            productYouLikeIt();
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include 'Includes/Components/footer.php';
    ?>
    <script src="Layout/js/product-loved.js"></script>
    </body>
</html> 