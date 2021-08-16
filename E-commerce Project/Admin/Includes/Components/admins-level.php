<div class="row header">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Admins Levels
            </li>
        </ul>
    </div>
</div>
<div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-users"></i> Admins Levels</h4>
            <div class="table-product table-responsive">
                <table class="table table-bordered table-hover">
                    <thead align="center">
                        <th>Admin ID:</th>
                        <th>Admin Name:</th>
                        <th>Admin Image:</th>
                        <th>Admin Email:</th>
                        <th>Admin Birth:</th>
                        <th>Admin Gender:</th>
                        <th>Admin Level:</th>
                        <th>Edit Level:</th>

                    </thead>
                    <tbody align="center">
                        <?php 
                            if(!isset($_GET['level_search'])){
                                viewAdminsLevel();
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php 
            $content = "Delete Successfully";
            include "Includes/Components/notification.php";
        ?>
    </div>
<?php 
    if(isset($_GET['admin_id'])){
        $admin_id = $_GET['admin_id'];
        $query = "DELETE FROM admins WHERE admin_id = '$admin_id'";
        $con->exec($query);

        if($_SESSION['admin_id'] == $admin_id){
            session_unset();

            session_destroy();
        }
        echo "<script>
                var notify = document.getElementById('notify-success');
                    notify.classList.add('success');
                    setTimeout(function(){
                        notify.classList.remove('success');
                        window.open('index.php?view_admins','_self');
                    },2000);
            </script>";
    }

?>