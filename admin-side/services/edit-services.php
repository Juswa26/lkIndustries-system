<?php 
    
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{

        if(isset($_GET['edit_services'])) {
            $serv_id= $_GET['edit_services']; 
            $get_services = "SELECT * FROM services WHERE serv_id = '$serv_id'";
            $run_services = mysqli_query($con, $get_services);
            $row_services = mysqli_fetch_assoc($run_services);
            $serv_name = $row_services['serv_name'];
            $serv_desc = $row_services['serv_desc'];
        }

        if(isset($_POST['update'])) {
            $updated_serv_name = $_POST['serv_name'];
            $updated_serv_desc = $_POST['serv_desc'];
        
            if(empty($updated_serv_name) || empty($updated_serv_desc)) {
                echo '<script>alert("Both fields are required!");</script>';
            } else {
                $stmt = $con->prepare("UPDATE services SET serv_name = ?, serv_desc = ? WHERE serv_id = ?");
                $stmt->bind_param("ssi", $updated_serv_name, $updated_serv_desc, $serv_id);
        
                if($stmt->execute()) {
                    echo '<script>alert("Service has been updated successfully!");</script>';
                    echo '<script>window.location.href="index.php?view_services";</script>';
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
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Services
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Edit Services
				</h3>
			</div>

            <div class="panel-body"><!-- panel-body Start -->
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal Start -->
                    <div class="form-group"><!-- form-group Start -->
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 Start --> 
                            Service Title 
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <input name="serv_name" type="text" class="form-control " value=" <?php echo $serv_name; ?>">
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group Start -->
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 Start --> 
                            Service Description 
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <textarea type='text' name="serv_desc" id="" cols="30" rows="10" class="form-control" > <?php echo $serv_desc; ?></textarea>
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