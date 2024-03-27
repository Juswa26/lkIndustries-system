<?php 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>
<?php
	if(isset($_GET['delete_part'])) {
	    $delete_part_id = $_GET['delete_part'];

	    $delete_query = "DELETE FROM car_parts WHERE cpart_id='$delete_part_id'"; // Adjust the table name and column name to match your actual schema

	    if(mysqli_query($con, $delete_query)) {
	        echo "<script>alert('Car Part has been deleted successfully!');</script>";
	        echo "<script>window.open('index.php?view_parts','_self')</script>";
	    } else {
	        echo "<script>alert('Error: Could not delete the car part');</script>";
	    }
	}
?>

<?php } ?>
