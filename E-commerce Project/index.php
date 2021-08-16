<?php 
    $active = 'HOME';
    include 'Includes/Components/header.php'; 
?>
    <div class="slider-home-page container" id="slider">
        <div class="col-md-12 slider-box"> 
            <div class="slider-content">
                <?php
                    // Get Slider Home Page Images From Database
                    getSliderHomePage();
                ?>
            </div>
            <div class="slide-icon previous">
                <span class="prev" id="prev" onclick="prevClickBtn();">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </span>
            </div>
            <div class="slide-icon next">
                <span class="next" id="next" onclick="nextClickBtn();">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </span>
            </div>
            <div class="collapse-box" id="collapse-box"> 
                <!--
                <ul>
                    <li><i class="fa fa-circle" aria-hidden="true"></i></li>
                    <li><i class="fa fa-circle" aria-hidden="true"></i></li>
                    <li><i class="fa fa-circle" aria-hidden="true"></i></li>
                </ul>
                -->
            </div>
        </div>
    </?>
    <div id="store-introduction" class="store-introduction">
        <div class="container">
            <div class="row text-center">
                <?php 
                    $query = $con->prepare("SELECT * FROM boxes");
                    $query->execute();

                    $icons = ['heart','tag','thumbs-up'];
                    $i = 0;
                    while($get_box = $query->fetch(PDO::FETCH_ASSOC)){
                        $box_title = $get_box['box_title'];
                        $box_desc  = $get_box['box_desc'];

                        echo "
                            <div class='col-xm-4 col-sm-12 col-md-4'>
                                <div class='box same-height'>
                                    <div class='icon'>
                                        <i class='fa fa-$icons[$i]'></i>
                                    </div>
                                    <div class='content'>
                                        <h3>
                                            $box_title
                                        </h3>
                                        <p>$box_desc</p>
                                    </div>
                                </div>
                            </div>
                        ";
                        $i++;
                    }
    
                ?>

            </div>
        </div>
    </div>
    <div class="product-store" id="product-store">
        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2>
                        Our Latest Products
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="product-content" id="product-content">
        <div class="container">
            <div class="row">
                    <?php
                        // Get Product From Database (only 8 Product)
                        getProductIndex();
                    ?>
            </div>
        </div>
    </div>
    </div>
    <?php
        
        include 'Includes/Components/footer.php';
    ?>
    <script src="Layout/js/sliderHomePage.js"></script>
</body>
</html> 