<?php 
    session_start();
    include "connection.php";
    if(isset($_FILES['image_file']['name'])){
        
        $admin_email = $_SESSION['admin_email'];
        $query = $con->prepare("SELECT admin_image FROM admins where admin_email ='$admin_email'");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if($result['admin_image'] != ""){
            $admin_image = $result['admin_image'];
            $location = "../../Layout/images/admins-images/" . $admin_image;
            unlink(realpath($location));
        }
        $filename = $_FILES['image_file']['name'];
        $location = "../../Layout/Images/admins-images/" . $filename;
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
                $admin_name = $_SESSION['admin_name'];
                $admin_email = $_SESSION['admin_email'];
                try{
                    $query = "UPDATE admins SET admin_image = '$filename' where admin_name = '$admin_name' AND admin_email = '$admin_email'";
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