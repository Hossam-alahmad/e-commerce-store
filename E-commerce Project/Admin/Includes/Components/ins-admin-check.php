<?php 
        /*  if click on register
        /   add values of input into variable
        /   encryption admin password
        /   connect to database into admins table
        /   check if adminname or email has already exist show message 
        /   else  add admin into database and register done
        */
        session_start();
        include "connection.php";
        if(isset($_POST['admin_name'])){
            $admin_name          = $_POST['admin_name'];
            $admin_first_name    = $_POST['first_name'];
            $admin_last_name     = $_POST['last_name'];
            $admin_email         = $_POST['email'];
            $admin_birth         = $_POST['birthday'];
            $admin_gender        = $_POST['gender'];
            $admin_country       = $_POST['country'];
            $admin_city          = $_POST['city'];
            $admin_pass          = sha1($_POST['password']);// ecriptyon admin password using sha1 algorithm
            $query = "SELECT * FROM admins";
            $get_admin = $con->prepare($query);
            $get_admin->execute();
            $total_record = $get_admin->rowCount();
            $check = true;
            while($result = $get_admin->fetch(PDO::FETCH_ASSOC)){
                if($result['admin_name'] == $admin_name){
                    echo "<script>alert('admin name has already exist');</script>";
                    $check = false;
                }
                else if($result['admin_email'] == $admin_email){
                    echo "<script>alert('Email has already exist');</script>";
                    $check = false;
                }
            }
            try{
                if($check){
                        $query = "INSERT INTO admins (
                            admin_name,
                            first_name,
                            last_name,
                            admin_email,
                            admin_birth,
                            admin_gender,
                            admin_country,
                            admin_city,
                            admin_pass,
                            admin_level)
                    values ('$admin_name',
                            '$admin_first_name',
                            '$admin_last_name',
                            '$admin_email',
                            '$admin_birth',
                            '$admin_gender',
                            '$admin_country',
                            '$admin_city',
                            '$admin_pass',
                            '3')";
                    $admin_reg = $con->exec($query);
                    echo "<script>alert('Resgiter Success');</script>";
                    
                }
            }
            catch(PDOException $msg){
                echo $msg->getMessage();
            }
                                    
        }
    ?>