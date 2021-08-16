<div class="col-md-4 col-lg-3 sidebar-box">
    <!--
         <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="panel-title">
                Filter
                <span class="pull-right" id="hide-show">Hide <i class="fa fa-plus" id="icon"></i></span>
            </h3>
            
        </div>
        <div class="panel-body" id="filter">
            <form method="GET" enctype="multipart/form-data" action="">
                
                <div class="form-group">
                    <input type="checkbox" name="p_loved" id="p-loved" class="<?php if(isset($_GET['filter_loved'])) echo "checked"; ?>" <?php if(isset($_GET['filter_loved'])) echo "checked"; ?>>
                    <label for="">Most Loved</label>
                </div> 
                <div class="form-group">
                    <div>
                        <input type="radio" name="p_price" id="p-price">
                        <label for="">between $100-$0</label>
                    </div>
                    <div>
                        <input type="radio" name="p_price">
                        <label for="">between $1000-$100</label>
                    </div>
                    <div>
                        <input type="radio" name="p_price">
                        <label for="">between $10000-$1000</label>
                    </div>
                    <div>
                        <input type="radio" name="p_price">
                        <label for="">Big than $10000</label>
                    </div>
                </div>  
            </form>
        </div>
    </div>
    -->
    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="panel-title">Products Categories</h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked category-menu">
                <?php 
                    getProductCat();
                ?>
            </ul>
        </div>
    </div>
</div>