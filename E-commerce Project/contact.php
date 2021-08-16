<?php 
    $active = 'CONTACT US';
    include 'Includes/Components/header.php'; 
?>

        <div class="breadcrumb-box" id="breadcrumb-box"><!-- breadcrumb-box Start -->
            <div class="container"> <!-- container Start -->
                <div class="col-md-12"> <!-- col-md-12 Start -->
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Contact Us
                        </li>
                    </ul>
                </div> <!-- col-md-12 Finish -->
            </div> <!-- container Finish -->
        </div><!-- breadcrumb-box Finish -->
        <div class="contact">
            <div class="container">
                <div class="row">
                    <?php
                        include 'Includes/Components/sidebar.php';
                    ?>
                    <div class="col-md-8 contact">
                        <div class="box">
                            <div class="box-header">
                                <center>
                                    <h2>Contact Us</h2>
                                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sit. Error harum numquam magnam laudantium voluptatum sint, placeat eveniet hic dicta blanditiis deserunt quod maxime iusto vero? Voluptatem, impedit adipisci.</p>
                                </center>
                                <form action="contact.php" method="POST" onsubmit="return check();">
                                    <div class="form-group">
                                        <label for="">Name <span>*</span></label>
                                        <input type="text" class="form-control" name="name" id="name">
                                        <div class="notification" id="name-notify">
                                            Please enter your name
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email <span>*</span></label>
                                        <input type="email" class="form-control" name="email" id="email">
                                        <div class="notification" id="email-notify">
                                            Please enter your email
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Subject <span>*</span></label>
                                        <input type="text" class="form-control" name="subject" id="subject">
                                        <div class="notification" id="subject-notify">
                                            Please enter your subject
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Message <span>*</span></label>
                                        <textarea class="form-control" name="message" id="message" style="resize:vertical;"></textarea>
                                        <div class="notification" id="message-notify">
                                            Please enter your message
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn btn-success">
                                        <i class="fa fa-envelope" aria-hidden="true"></i> Send Message
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $content = "Email Sent Successfully";
            include 'Includes/Components/notification.php';
            include 'Includes/Components/footer.php';
        ?>
        <script src="Layout/js/contact-check.js"></script>
    </body>
</html> 