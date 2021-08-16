<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    try{
        // user can send message to admin for contact us
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){
            $user_name    = $_POST['name'];
            $user_email   = $_POST['email'];
            $user_subject = $_POST['subject'];
            $user_message = $_POST['message'];

            require_once "PHPMailer/PHPMailer.php";
            require_once "PHPMailer/SMTP.php";
            require_once "PHPMailer/Exception.php";
            $mail = new PHPMailer();

            // SMTP setting
            $mail->isSMTP();
            $mail->Host         ="smtp.gmail.com";
            $mail->SMTPAuth     = true;
            $mail->Username     = "hossamahmad1998@gmail.com";
            $mail->Password     = "19981972@@";
            $mail->Port         = 465;
            $mail->SMTPSecure   = "ssl";

            // Email setting

            $mail->setFrom($user_email,$user_name);
            $mail->addAddress('hossamahmad1998@gmail.com');
            $mail->isHTML(true);
            $mail->Subject  = $user_subject;
            $mail->Body     = $user_message;

            if($mail->send()){
                echo "<script>alert('Message Sent Successfully');</script>";
            }
            else{
                echo "<script>alert('Error! Message Not Sent');</script>";
            }
        }
    }
    catch(Exception $e){
            
    }
?>