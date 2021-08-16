<?php 
    $user_email = $_SESSION['user_email'];
    $get_user_id = $con->prepare("SELECT * FROM users where user_email = ?");
    $get_user_id->execute([$user_email]);
    $result = $get_user_id->fetch(PDO::FETCH_ASSOC);
    $user_id = $result['user_id'];
?>

<div class="payment-box box">
    <h1 class="text-center">
        Payment Options For You
    </h1>
    <center>
        <p class="lead">
            <a href="order.php?user_id=<?php echo $user_id;?>">Offline Payment
                <img src="Layout/images/payment/paypal.png" class="img-responsive" width="100%">
            </a>
        </p>
    </center>
</div>