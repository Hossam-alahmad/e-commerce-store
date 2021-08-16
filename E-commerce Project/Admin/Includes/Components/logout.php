<?php 
    session_start(); // start session

    session_unset(); // clear data from session

    session_destroy(); // remove session

    echo "<script>window.open('../../login.php','_self');</script>";
?>