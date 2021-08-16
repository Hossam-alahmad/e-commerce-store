<div class="row header">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Insert Box
            </li>
        </ul>
    </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-suitcase" aria-hidden="true"></i> Insert Box</h4>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Box Title:</label>
                            <div class="col-md-6 col-lg-12">
                                <input type="text" class="form-control" name="box_title" id="box_title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Box Description:</label>
                            <div class="col-md-6 col-lg-12">
                                <textarea class="form-control" maxlength="100" name="box_desc" style="resize:none;" id="box_desc"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-lg-12">
                                <input type="submit" value="Insert Box" name="submit" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php 
            $content = "Box Insert Successfully";
            include "Includes/Components/notification.php";
        ?>
    </div>
    

<?php
    // Insert Data In Database MySql Using PDO
    if(isset($_POST['submit'])){
        // Get Data From Form
        $box_title = $_POST['box_title'];
        $box_desc   = $_POST['box_desc'];

        try{
            if($box_title != "" && $box_desc != ""){
                $query = $con->prepare("SELECT * FROM boxes");
                $query->execute();
                $total_boxes = $query->rowCount();
                if($total_boxes < 3)
                {
                    $box_title = $box_title.strtoupper($box_title);
                    
                    $ins_box ="INSERT INTO boxes (box_title,box_desc) 
                            values ('$box_title','$box_desc')";
                    $store_in_db = $con->exec($ins_box);

                    if($store_in_db){
                        echo "
                            <script>
                                var notify = document.getElementById('notify-success');
                                    notify.classList.add('success');
                                    setTimeout(function(){
                                        notify.classList.remove('success');
                                        window.open('index.php?view_boxes','_self');
                                    },2000);
                            </script>";
                    }
                    else{
                        echo "<script>alert('Boxes Insert Faild')</script>";
                    }
                }
                else{
                    echo "<script>alert('Boxes Is Full')</script>";
                }
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        
    }

?>