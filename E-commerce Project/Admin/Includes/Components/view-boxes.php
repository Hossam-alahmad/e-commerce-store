<div class="row header">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Boxes
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h4 class="page-header"><i class="fa fa-suitcase" aria-hidden="true"></i> View Boxes</h4>
        <div class="boxes row">
            <?php 
                viewBoxes();
            ?>
            
        </div>
    </div>
        <?php 
            $content = "Delete Successfully";
            include "Includes/Components/notification.php";
        ?>
</div>
<?php 
    
    if(isset($_GET['box_id'])){
        $box_id = $_GET['box_id'];
        $query = "DELETE FROM boxes WHERE box_id = '$box_id'";
        $con->exec($query);
        echo "<script>
                var notify = document.getElementById('notify-success');
                    notify.classList.add('success');
                    setTimeout(function(){
                        notify.classList.remove('success');
                        window.open('index.php?view_boxes','_self');
                    },2000);
            </script>";
    }
?>