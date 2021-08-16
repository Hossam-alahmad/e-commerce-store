<?php 
    if(isset($_GET['admin_id'])){
        $admin_id = $_GET['admin_id'];
        $query = $con->prepare("SELECT * FROM admins where admin_id = '$admin_id'");
        $query->execute();
        $get_admin = $query->fetch(PDO::FETCH_ASSOC);
        $admin_name = $get_admin['admin_name'];
    }
?>
<div class="row header">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edit Admin Level
            </li>
        </ul>
    </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-users"></i> Edit Admin Level</h4>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="" method="POST" enctype="multipart/form-data" onsubmit="return check();">
                            <div class="form-group">
                                <label for="">Admin Name:</label>
                                <input type="text" class="form-control" name="admin_name" id="admin_name" value="<?php echo $admin_name; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Admin Level:</label>
                                <select class="form-control" name="admin_level" id="admin_level">
                                    <?php 
                                        for($i=1;$i<4;$i++){
                                            if($_GET['edit_level'] == $i){
                                                echo "
                                                    <option value='$i' selected>$i</option>
                                                ";
                                            }
                                            else{
                                                echo "
                                                    <option value='$i'>$i</option>
                                                ";
                                            }

                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="up_level" class="btn btn-primary" id="up_level">
                                    <i class="fa fa-user"></i> Update Level
                                </button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
        <?php 
            $content = "Level Update Successfully";
            include "Includes/Components/notification.php";
        ?>
    </div>


    
