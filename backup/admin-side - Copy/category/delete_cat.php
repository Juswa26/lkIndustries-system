<?php 
    
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{

?>

<?php

if(isset($_GET['delete_cat'])) {
    $delete_cat_id = $_GET['delete_cat'];

    $delete_query = "DELETE FROM cparts_cat WHERE cat_id='$delete_cat_id'";

    if(mysqli_query($con, $delete_query)) {
        echo "<script>alert('Category has been deleted successfully!');</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";
    } else {
        // Handle error
        echo "<script>alert('Error: Could not delete the category');</script>";
    }
}

?>

<?php } ?> 