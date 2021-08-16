<div class="row header">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Users
            </li>
        </ul>
    </div>
</div>
<div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-users"></i> View Users</h4>
            <div class="table-product table-responsive">
                <form method="get" class="search" onsubmit="return check();">
                    <input type="search" name="search" class="form-control" placeholder="Search Users" id="search-inp">
                    <button type="submit" class="fa" id="search-btn">&#xf002;</button>
                </form>
                <table class="table table-bordered table-hover">
                    <thead align="center">
                        <th>User ID:</th>
                        <th>User Name:</th>
                        <th>User Image:</th>
                        <th>User Email:</th>
                        <th>User Birth:</th>
                        <th>User Gender:</th>
                        <th>User Country:</th>
                        <th>User City:</th>
                        <th>User Delete:</th>

                    </thead>
                    <tbody align="center">
                        <?php 
                            if(!isset($_GET['user_search'])){
                                viewUsers();
                            }
                            else if(isset($_GET['user_search'])){
                                viewSearchUsers($_GET['user_search']);
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
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $query = "DELETE FROM users WHERE user_id = '$user_id'";
        $con->exec($query);
        echo "<script>
                var notify = document.getElementById('notify-success');
                    notify.classList.add('success');
                    setTimeout(function(){
                        notify.classList.remove('success');
                        window.open('index.php?view_users','_self');
                    },2000);
            </script>";
    }

?>