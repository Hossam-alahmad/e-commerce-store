<div class="row header">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Slides
            </li>
        </ul>
    </div>
</div>
<div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-picture-o"></i> View Slides</h4>
            <div class="table-product table-responsive">
                <form method="get" class="search" onsubmit="return check();">
                    <input type="search" name="search" class="form-control" placeholder="Search Slide" id="search-inp">
                    <button type="submit" class="fa" id="search-btn">&#xf002;</button>
                </form>
                <table class="table table-bordered table-hover">
                    <thead align="center">
                        <th class="p-cat-id">Slide ID:</th>
                        <th>Slide Name:</th>
                        <th>Slide Image:</th>
                        <th class="delete-edit">Slide Delete:</th>
                        <th class="delete-edit">Slide Edit:</th>
                    </thead>
                    <tbody align="center">
                        <?php 
                            if(!isset($_GET['slide_search'])){
                                veiwSlides();
                            }
                            else{
                                viewSearchSlides($_GET['slide_search']);
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
    if(isset($_GET['slide_id'])){
        $slide_id = $_GET['slide_id'];
        $query = "DELETE FROM slider WHERE slide_id = '$slide_id'";
        $con->exec($query);
        echo "<script>
                var notify = document.getElementById('notify-success');
                    notify.classList.add('success');
                    setTimeout(function(){
                        notify.classList.remove('success');
                        window.open('index.php?view_slides','_self');
                    },2000);
            </script>";
    }

?>