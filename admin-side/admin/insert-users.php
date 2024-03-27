
<?php 
    
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{

?>

<?php
    function generateAdminCode() {
        $characters = '0123456789'; 
        $randomString = '';

        for ($i = 0; $i < 7; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        
        return 'ADM' . $randomString;
    }

    
    if (isset($_POST['submit'])) {
        var_dump($_POST);
    // Get the values from the form
    $ad_name = $_POST['ad_name'];
    $ad_email = $_POST['ad_email'];
    $ad_pass = $_POST['ad_pass'];
    $ad_contact = $_POST['ad_contact'];
    $ad_role = $_POST['ad_role'];

    // Handle the file upload for the car part image
    $ad_img = $_FILES['ad_img']['name'];
    $ad_img_tmp = $_FILES['ad_img']['tmp_name'];
    move_uploaded_file($ad_img_tmp, "img/$ad_img");

    $ad_code = generateAdminCode();

    // Validate the input
    if (empty($ad_name) || empty($ad_email) || empty($ad_pass) || empty($ad_contact) || empty($ad_role) || empty($ad_img)) {
        echo '<script>alert("All fields must be required!");</script>';
    } else {
        // Prepare the insertion statement
        $stmt = $con->prepare("INSERT INTO admin_users (ad_code, ad_name, ad_email, ad_pass, ad_contact, ad_role, ad_img) VALUES (?, ?, ?, ?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("ssssiss", $ad_code, $ad_name, $ad_email, $ad_pass, $ad_contact, $ad_role, $ad_img);      
        
        // Execute the statement
        if ($stmt->execute()) {
            echo '<script>alert("Admin User has been added successfully!");</script>';
            echo '<script>window.location.href="index.php?view_users";</script>';
        } else {
            echo '<script>alert("Error: ' . $stmt->error . '");</script>';
        }

        // Close the prepared statement
        $stmt->close();
    }
}

?>

<div class="row mt-5"><!-- row 1 Start -->
    <div class="col-lg-12"><!-- col-lg-12 Start -->
        <ol class="breadcrumb"><!-- breadcrumb Start -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert New Admin Users
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Add new Admin
				</h3>
			</div>

            <div class="panel-body"><!-- panel-body Start -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Start -->
                    <div class="form-group"><!-- form-group Start -->
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 Start --> 
                            Admin Name 

                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <input name="ad_name" type="text" class="form-control" required>
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                       <!-- Duplicate these bad boys -->
                    <div class="form-group">
                        <label class="control-label col-md-3">Role</label>
                        <div class="col-md-6">
                            <input name="ad_role" type="text" class="form-control" required>
                        </div>
                    </div>  <!-- Duplicate Until Here -->

                      <!-- Duplicate these bad boys -->
                    <div class="form-group">
                        <label class="control-label col-md-3">Phone Number</label>
                        <div class="col-md-6">
                            <input name="ad_contact" type="tel" class="form-control" required>
                        </div>
                    </div>  <!-- Duplicate Until Here -->

                      <!-- Duplicate these bad boys -->
                    <div class="form-group">
                        <label class="control-label col-md-3">Email</label>
                        <div class="col-md-6">
                            <input name="ad_email" type="email" class="form-control" placeholder="example@gmail.com" required>
                        </div>
                    </div>  <!-- Duplicate Until Here -->

                      <!-- Duplicate these bad boys -->
                    <div class="form-group">
                        <label class="control-label col-md-3">Password</label>
                        <div class="col-md-6">
                            <input name="ad_pass" type="password" class="form-control" required>
                        </div>
                    </div>  <!-- Duplicate Until Here -->

                       <div class="form-group"><!-- form-group Start -->
                        <label class="col-md-3 control-label"> Admin Display Photo</label> 
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <input name="ad_img" type="file" class="form-control form-height-custom" required> 
                        </div><!-- col-md-6 Finish -->
                    </div><!-- form-group Finish -->

                   

                    <div class="form-group"><!-- form-group Start -->
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 Start --> 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <input value="Submit" name="submit" type="submit" class="form-control btn btn-primary">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
<?php } ?>