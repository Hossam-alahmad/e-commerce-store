<?php 
    if(isset($_GET['edit_slide'])){
        $slide_id = $_GET['edit_slide'];
        $query = $con->prepare("SELECT * FROM slider where slide_id = '$slide_id'");
        $query->execute();
        $record = $query->rowCount();
        if($record > 0){
            $get_slide = $query->fetch(PDO::FETCH_ASSOC);
            $slide_name = $get_slide['slide_name'];
            $slide_img = $get_slide['slide_image'];
        }
    }
?>
<div class="row header">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edit Slide
            </li>
        </ul>
    </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-picture-o"></i> Edit Slide</h4>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Slide Name:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="text" class="form-control" name="slide_title" value="<?php echo $slide_name; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Slide Image:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="file" name="slide_img" class="form-control">
                                <div class="img-box">
                                    <img src="Layout/Images/main_slider/<?php echo $slide_img; ?>" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-lg-12">
                                <input type="submit" value="Edit Slide" name="submit" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php 
            $content = "Slide Edit Successfully";
            include "Includes/Components/notification.php";
        ?>
    </div>
    

<?php
    // Edit Slide In Database MySql Using PDO
    if(isset($_POST['submit'])){
        // Get Data From Form
        $slide_name = $_POST['slide_title'];
        $slide_image = $_FILES['slide_img']['name'];
        $temp_name = $_FILES['slide_img']['tmp_name'];
        move_uploaded_file($temp_name,'Layout/images/main_slider/' . $slide_image . '');
        
        try{
            if($slide_image == ""){
                $slide_image = $slide_img;
            }
            else{
                $location = "../../Layout/images/main_slider/" . $slide_img;
                unlink(realpath($location));
            }
            if($slide_name != "" && $slide_image != ""){
                $edit_slide = "UPDATE slider SET slide_name='$slide_name',
                                                            slide_image='$slide_image'
                                                        where slide_id = $slide_id";
                $store_in_db = $con->exec($edit_slide);
                if($store_in_db){
                    echo "
                        <script>
                            var notify = document.getElementById('notify-success');
                                notify.classList.add('success');
                                setTimeout(function(){
                                    notify.classList.remove('success');
                                    window.open('index.php?view_slides','_self');
                                },2000);
                        </script>";
                }
                else{
                    echo '<script>alert("Slide Edit Faild")</script>';
                }
            }
            else{
                echo '<script>alert("Slide Edit Faild")</script>';
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        
    }

?>