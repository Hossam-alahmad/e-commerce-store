<?php 
        /*  if click on register
        /   add values of input into variable
        /   encryption user password
        /   connect to database into users table
        /   check if username or email has already exist show message 
        /   else  add user into database and register done
        */
        session_start();
        include "Admin/Includes/Components/connection.php";
        include "Includes/Functions/function.php";
        if(isset($_POST['username'])){
            $user_name          = $_POST['username'];
            $user_first_name    = $_POST['firstname'];
            $user_last_name     = $_POST['lastname'];
            $user_email         = $_POST['email'];
            $user_birth         = $_POST['birthday'];
            $user_gender        = $_POST['gender'];
            $user_country       = $_POST['country'];
            $user_city          = $_POST['city'];
            $user_pass          = sha1($_POST['password']);// ecriptyon user password using sha1 algorithm
            $user_ip            = getRealIpUser();
            $query = "SELECT * FROM users";
            $get_user = $con->prepare($query);
            $get_user->execute();
            $total_record = $get_user->rowCount();
            $check = true;
            while($result = $get_user->fetch(PDO::FETCH_ASSOC)){
                if($result['user_name'] == $user_name){
                    echo "<script>alert('Username has already exist');</script>";
                    $check = false;
                }
                else if($result['user_email'] == $user_email){
                    echo "<script>alert('Email has already exist');</script>";
                    $check = false;
                }
            }
            try{
                if($check){
                        $query = "INSERT INTO users (
                            user_name,
                            user_first_name,
                            user_last_name,
                            user_email,
                            user_birth,
                            user_gender,
                            user_country,
                            user_city,
                            user_password,
                            user_ip,
                            user_date)
                    values ('$user_name',
                            '$user_first_name',
                            '$user_last_name',
                            '$user_email',
                            '$user_birth',
                            '$user_gender',
                            '$user_country',
                            '$user_city',
                            '$user_pass',
                            '$user_ip',
                            NOW())";
                    $user_reg = $con->exec($query);
                    $_SESSION['user_id']       = $total_record + 1;
                    $_SESSION['user_name']     = $user_name;
                    $_SESSION['user_email']    = $user_email;
                    $_SESSION['user_ip']       = $user_ip;  
                    echo "<script>alert('Resgiter Success');</script>";
                    echo "<script>window.open('index.php','_self');</script>";
                    
                }
            }
            catch(PDOException $msg){
                echo $msg->getMessage();
            }
                                    
        }
    ?>