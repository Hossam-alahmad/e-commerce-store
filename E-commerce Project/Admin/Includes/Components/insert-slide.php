<div class="row header">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Insert Slide 
            </li>
        </ul>
    </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-picture-o"></i> Insert Slide</h4>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Slide Name:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="text" class="form-control" name="slide_title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Slide Image:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="file" name="slide_img" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-lg-12">
                                <input type="submit" value="Insert Slide" name="submit" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php 
            $content = "Slide Insert Successfully";
            include "Includes/Components/notification.php";
        ?>
    </div>
    

<?php
    // Insert Data In Database MySql Using PDO
    if(isset($_POST['submit'])){
        // Get Data From Form
        $slide_name = $_POST['slide_title'];
        $slide_image = $_FILES['slide_img']['name'];
        $temp_name = $_FILES['slide_img']['tmp_name'];


        // Move the upload image to Image Folder In Admin Area
        move_uploaded_file($temp_name,'Layout/images/main_slider/' . $slide_image . '');

        try{
            if($slide_name != "" && $slide_image != ""){
                $ins_slide ="INSERT INTO slider (slide_name,slide_image) 
                        values ('$slide_name','$slide_image')";
                $store_in_db = $con->exec($ins_slide);

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
                    echo "<script>alert('Boxes Insert Faild')</script>";
                }
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        
    }

?>