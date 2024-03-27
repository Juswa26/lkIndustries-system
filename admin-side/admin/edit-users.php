<?php 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>
<?php
  if(isset($_GET['edit_user'])) {
    $ad_id = $_GET['edit_user']; // The ID of the car part you want to edit, passed in the URL.
    $get_ad = "SELECT * FROM admin_users WHERE ad_id = '$ad_id'";
    $run_ad = mysqli_query($con, $get_ad);
    $row_ad = mysqli_fetch_assoc($run_ad);
    $ad_name = $row_ad['ad_name'];
    $ad_email = $row_ad['ad_email'];
    $ad_pass = $row_ad['ad_pass'];
    $ad_contact = $row_ad['ad_contact'];
    $ad_role = $row_ad['ad_role'];
    $ad_img = $row_ad['ad_img'];
  }

  if(isset($_POST['update'])) {
    $updated_ad_name = $_POST['ad_name'];
    $updated_ad_email = $_POST['ad_email'];
    $updated_ad_pass = $_POST['ad_pass'];
    $updated_ad_contact = $_POST['ad_contact'];
    $updated_ad_role = $_POST['ad_role'];
    $updated_ad_img = $_FILES['ad_img']['name'];
    $updated_ad_img_tmp = $_FILES['new_ad_img']['tmp_name'];

    if(!isset($_FILES['new_ad_img']['name']) || $_FILES['new_ad_img']['name'] == '') {
        $updated_ad_img = $ad_img;
    } else {
        // Handle the upload and assignment of the new image
        $updated_ad_img = $_FILES['new_ad_img']['name'];
        $updated_ad_img_tmp = $_FILES['new_ad_img']['tmp_name'];
        move_uploaded_file($updated_ad_img_tmp, "img/$updated_ad_img");
    }


    if(empty($updated_ad_name) || empty($updated_ad_email) || empty($updated_ad_pass) || empty($updated_ad_contact) || empty($updated_ad_role)) {
          echo '<script>alert("All fields are required!");</script>';
      } else {

        $stmt = $con->prepare("UPDATE admin_users SET ad_name = ?, ad_email = ?, ad_pass = ?, ad_contact = ?, ad_role = ?, ad_img = ? WHERE ad_id = ?");
    $stmt->bind_param("ssiissi", $updated_ad_name, $updated_ad_email, $updated_ad_pass, $updated_ad_contact, $updated_ad_role, $updated_ad_img, $ad_id);

        if($stmt->execute()) {
            echo '<script>alert("Car part has been updated successfully!");</script>';
            echo '<script>window.location.href="index.php?view_users";</script>';
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
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Admin
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="fa fa-money fa-fw"></i> Edit Profile
        </h3>
      </div>

            <div class="panel-body"><!-- panel-body Start -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Start -->
                    <div class="form-group">
                        <label class="col-md-3 control-label"> New User Name </label> 
                        <div class="col-md-6">
                            <input name="ad_name" type="text" class="form-control" value="<?php echo $ad_name; ?>" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label"> New Email </label> 
                        <div class="col-md-6">
                            <input name="ad_email" type="text" class="form-control" value="<?php echo $ad_email; ?>" required>
                        </div>
                    </div>


                     <!-- Duplicated fields -->
                    <div class="form-group">
                        <label class="control-label col-md-3">New Password</label>
                        <div class="col-md-6">
                            <input name="ad_pass" type="password" class="form-control" pattern="^\d+(\.\d{1,2})?$" value="<?php echo $ad_pass; ?>" required>
                        </div>
                    </div>

                     <!-- Duplicated fields -->
                    <div class="form-group">
                        <label class="control-label col-md-3">New Contact Number</label>
                        <div class="col-md-6">
                            <input name="ad_contact" type="number" class="form-control" pattern="^\d+(\.\d{1,2})?$" value="<?php echo $ad_contact; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">New Role</label> 
                        <div class="col-md-6">
                            <input name="ad_role" type="text" class="form-control" value="<?php echo $ad_role; ?>" required> </input>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Current Admin Display Photo</label>
                        <div class="col-md-6">
                            <input type="hidden" name="ad_img" value="<?php echo $ad_img ?>">
                            <img src="img/<?php echo $ad_img; ?>" width="100" height="100">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">New Admin Display Photo</label>
                        <div class="col-md-6">
                            <input name="new_ad_img" type="file" class="form-control">
                        </div>
                    </div>

                    <div class="form-group"><!-- form-group Start -->
                        <label class="col-md-3 control-label"></label> 
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <input name="update" value="Update Profile" type="submit" class="btn btn-primary form-control">
                        </div><!-- col-md-6 Finish -->
                    </div><!-- form-group Finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>