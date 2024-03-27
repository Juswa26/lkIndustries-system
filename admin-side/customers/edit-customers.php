<?php 
    
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{

        if(isset($_GET['edit_customers'])) {
            $customer_id= $_GET['edit_customers']; // The ID of the category you want to edit, passed in URL.
            $get_customers = "SELECT * FROM cust_users WHERE customer_id = '$customer_id'";
            $run_customers = mysqli_query($con, $get_customers);
            $row_customers = mysqli_fetch_assoc($run_customers);
            $customer_name = $row_customers['customer_name'];
            $customer_email = $row_customers['customer_email'];
            $customer_phone= $row_customers['customer_phone'];
           
        }

        if(isset($_POST['update'])) {
            $updated_customer_name = $_POST['customer_name'];
            $updated_customer_email = $_POST['customer_email'];
            $updated_customer_phone = $_POST['customer_phone'];
         
        
            if(empty($updated_customer_name) || empty($updated_customer_email)  || empty($updated_customer_phone)  ) {
                echo '<script>alert("Both fields are required!");</script>';
            } else {
                $stmt = $con->prepare("UPDATE cust_users SET customer_name = ?, customer_email = ?,  customer_phone= ? WHERE customer_id = ?");
                $stmt->bind_param("sssi", $updated_customer_name, $updated_customer_email,$updated_customer_phone, $customer_id);
        
                if($stmt->execute()) {
                    echo '<script>alert("Customer profile successfully updated!");</script>';
                    echo '<script>window.location.href="index.php?view_customers";</script>';
                } else {
                    echo '<script>alert("Error: '. $stmt->error .'");</script>';
                }
                $stmt->close();
            }
        }





?>

<div class="row mt-5"><!-- row 1 Start -->
    <div class="col-lg-12"><!-- col-lg-12 Start -->
        <ol class="breadcrumb"><!-- breadcrumb Start -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Customers
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Edit Customers
				</h3>
			</div>

            <div class="panel-body"><!-- panel-body Start -->
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal Start -->
                    <div class="form-group"><!-- form-group Start -->
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 Start --> 
                            Customer Name
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <input name="customer_name" type="text" class="form-control " value=" <?php echo $customer_name; ?>">
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group Start -->
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 Start --> 
                            Customer Email
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <input name="customer_email" type="text" class="form-control " value=" <?php echo $customer_email; ?>">
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group Start -->
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 Start --> 
                            Customer Phone
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <input name="customer_phone" type="text" class="form-control " value=" <?php echo $customer_phone; ?>">
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                    
                        
                        
                    

                    <div class="form-group"><!-- form-group Start -->
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 Start --> 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <input value="Submit" name="update" type="submit" class="form-control btn btn-primary" >
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
<?php } ?>