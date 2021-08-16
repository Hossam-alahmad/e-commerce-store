<?php 
    $active = 'SHOP';
    include 'Includes/Components/header.php'; 
?>
    <div class="breadcrumb-box" id="breadcrumb-box"> 
        <div class="container"> 
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Shop
                    </li>
                </ul>
            </div> 
        </div>
    </div> 
    <div class="shop-content">
        <div class="container">
            <div class="row">
                <?php 
                    include 'Includes/Components/sidebar.php';
                ?>
                <div class="content col-md-8 col-lg-9 row clear-padding">
                    <?php 
                        // if condition for check if p_cat is exist
                        if(!isset($_GET['p_cat'])){
                                echo '
                                <div class="col-md-12 header">
                                    <h1>Shop</h1>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur voluptas quod nam sapiente velit architecto debitis odio. Suscipit possimus exercitationem odit voluptas ipsam rerum labore praesentium explicabo. Iure, consequatur molestiae!</p>
                                </div>
                            ';
                        }
                    ?>
                    <?php
                        $perPage = 6;
                        if(!isset($_GET['p_cat'])){
                            // this function for get product in shop.php only 6 product on 1 page
                            //if(!isset($_GET['filter_loved'])){
                                getProductShop($perPage);
                            //}
                            //else{
                            //    getProductsByFilters($perPage);
                            //}
                        }
                        else{
                            // this function for get product from Database to shop.php by his categories
                            getProductShopCat($perPage);
                        } 
                    ?>
                    <nav class="pagintaion-box col-md-12" aria-label="Page navigation example">
                        <ul class="pagination" style="justify-content: center;">
                            <?php
                                // this function for get pagintation 
                                getPagination($perPage); 
                            ?>
                        </ul>
                    </nav>
                </div>
                
            </div>
        </div>
    </div>
    <?php
        include 'Includes/Components/footer.php';
    ?>
    </body>
</html> 