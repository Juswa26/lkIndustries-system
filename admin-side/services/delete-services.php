<?php 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    } else {
?>
<?php
	if(isset($_GET['delete_services'])) {
	    $delete_service_id = $_GET['delete_services'];

	    $delete_query = "DELETE FROM services WHERE serv_id='$delete_service_id'"; // pacheck kung tama

	    if(mysqli_query($con, $delete_query)) {
	        echo "<script>alert('Service has been deleted successfully!');</script>";
	        echo "<script>window.open('index.php?view_services','_self')</script>";
	    } else {
	        echo "<script>alert('Error: Could not delete the service');</script>";
	    }
	}
?>

<?php } ?>