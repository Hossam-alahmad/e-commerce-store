<?php 
    session_start();
    include "../../../Admin/Includes/Components/connection.php";
    if(isset($_FILES['image_file']['name'])){

        $user_email = $_SESSION['user_email'];
        $query = $con->prepare("SELECT user_image FROM users where user_email ='$user_email'");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if($result['user_image'] != ""){
            $user_image = $result['user_image'];
            $location = "../../Layout/images/users-image/" . $user_image;
            unlink(realpath($location));
        }

        $filename = $_FILES['image_file']['name'];

        $location = "../../Layout/Images/users-image/" . $filename;
        $uploadOk = 1;
        $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
        $valid_extension = array("jpg","jpeg","png");
        if(!in_array(strtolower($imageFileType),$valid_extension)){
            $uploadOk = 0;
        }
        if($uploadOk == 0){
            echo 0;
        }
        else{
            if(move_uploaded_file($_FILES['image_file']['tmp_name'],$location)){
                $user_name = $_SESSION['user_name'];
                $user_email = $_SESSION['user_email'];
                try{
                    $query = "UPDATE users SET user_image = '$filename' where user_name = '$user_name' AND user_email = '$user_email'";
                    $con->exec($query); 
                    echo "Upload Image Success";
                }
                catch(Exception $e){
                    echo $e->getMessage();
                }
            }
            else{
                echo 0;
            }
        }
    }
?>