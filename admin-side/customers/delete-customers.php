<?php 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    } else {
?>
<?php
	if(isset($_GET['delete_customers'])) {
	    $delete_customer_id = $_GET['delete_customers'];

	    $delete_query = "DELETE FROM cust_users WHERE customer_id='$delete_customer_id'"; // pacheck kung tama

	    if(mysqli_query($con, $delete_query)) {
	        echo "<script>alert('Customer successfully deleted!');</script>";
	        echo "<script>window.open('index.php?view_customers','_self')</script>";
	    } else {
	        echo "<script>alert('Error: Could not delete the Customer');</script>";
	    }
	}
?>

<?php } ?>