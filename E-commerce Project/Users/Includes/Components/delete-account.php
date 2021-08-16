<center>
    <h1>Delete Your Account</h1>
    <p class="text-muted">
        If you have any questions, feel to <a href="../contact.php">Contact Us</a>. Our Customer Service work.
    </p>
</center>
<form action="my-account.php?delete_account" method="post" class="text-center">
    <div class="alert alert-danger text-center" role="alert">
        <h6>Do You Realy Want To Delete Your Account?</h6>
        <p>When you agree to delete your account you will lose your all transaction,your products cart</p>
    </div>
    <input type="submit" name="delete" value="Yes I Want To Delete" class="btn btn-danger">
</form>

<?php 
    if(isset($_POST['delete'])){
        $user_name  = $_SESSION['user_name'];
        $user_email = $_SESSION['user_email']; 
        $delete_query = "DELETE FROM users where user_name = '$user_name' AND user_email = '$user_email'";
        $con->exec($delete_query);
        
        echo "<script>alert('Account has been deleted');</script>";
        echo "<script>window.open('Includes/Components/logout.php','_self');</script>";
    }
?>