<div class="footer" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <h4>Pages</h4>
                <ul>
                    <li><a href="../cart.php">Shopping Cart</a></li>
                    <li><a href="../contact.php">Contact Us</a></li>
                    <li><a href="../shop.php">Shop</a></li>
                    <li>
                        <?php 
                            if(isset($_SESSION['user_name'])){
                                echo "<a href='my-account.php?my_orders'>My Account</a>";
                            }
                            else{
                                echo "<a href='../login.php'>My Account</a>";
                            }
                        ?>
                    </li>
                </ul>
                <hr>
                <h4>User Section</h4>
                <ul>
                    <li><a href="../login.php">Login</a></li>
                    <li><a href="../user-register.php">Register</a></li>
                </ul>
                <hr class="d-md-none">
            </div>
            <div class="col-sm-6 col-md-3">
                <h4>Top Products Categories</h4>
                <ul>
                    <?php 
                        // Get Product Category From Database
                        getProductCat();
                    ?>
                </ul>
                <hr class="d-md-none">
            </div>
            <div class="col-sm-6 col-md-3">
                <h4>Find Us</h4>
                <p>
                    <Strong>Hossam Alahmad inc.</Strong>
                    <br>Syria - Idleb
                    <br>Teacher-Housing
                    <br>+963981099271
                    <br>hossamahmad1998@gmail.com
                </p>
                <a href="../contact.php">Check Our Contact Page</a>
                <hr class="d-md-none">
            </div>
            <div class="col-sm-6 col-md-3">
                <h4>Get The News</h4>
                <p class="text-muted">
                    Dont miss our latest update products
                </p>
                <form action="" method="post">
                    <div class="input-group">
                    <input type="text" class="form-control" name="email">
                    <span class="input-group-btn">
                        <input type="submit" value="Subscribe" class="btn btn-default">
                    </span>
                    </div>
                </form>
                <hr>
                <h4>Follow Us:</h4>
                <p>
                    <a href="" class="fa fa-envelope"></a>
                    <a href="" class="fa fa-google-plus"></a>
                    <a href="" class="fa fa-twitter"></a>
                    <a href="" class="fa fa-instagram"></a>
                    <a href="" class="fa fa-facebook"></a>
                </p>
            </div>
        </div>
    </div>
    <div class="foot">
            <p>Copyright 2020 &copy; By Eng.Hossam Alahmad All Rights Reseved.</p>
    </div>
</div>