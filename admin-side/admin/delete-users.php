<?php 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    } else {
?>
<?php
	if(isset($_GET['delete_user'])) {
	    $delete_ad_id = $_GET['delete_user'];

	    $delete_query = "DELETE FROM admin_users WHERE ad_id='$delete_ad_id'"; 

	    if(mysqli_query($con, $delete_query)) {
	        echo "<script>alert('This Admin has been deleted successfully!');</script>";
	        echo "<script>window.open('index.php?view_users','_self')</script>";
	    } else {
	        echo "<script>alert('Error: Could not delete Admin');</script>";
	    }
	}
?>

<?php } ?>