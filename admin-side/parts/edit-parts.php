<?php 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>
<?php
  if(isset($_GET['edit_part'])) {
    $part_id = $_GET['edit_part']; // The ID of the car part you want to edit, passed in the URL.
    $get_part = "SELECT * FROM car_parts WHERE cpart_id = '$part_id'";
    $run_part = mysqli_query($con, $get_part);
    $row_part = mysqli_fetch_assoc($run_part);
    $cpart_name = $row_part['cpart_name'];
    $cpart_category = $row_part['cpart_category'];
    $cpart_price = $row_part['cpart_price'];
    $cpart_stock = $row_part['cpart_stock'];
    $cpart_desc = $row_part['cpart_desc'];
    $cpart_img = $row_part['cpart_img'];
  }

  if(isset($_POST['update'])) {
    $updated_part_name = $_POST['cpart_name'];
    $updated_part_category = $_POST['cpart_cat'];
    $updated_part_price = $_POST['cpart_price'];
    $updated_part_stock = $_POST['cpart_stock'];
    $updated_part_desc = $_POST['cpart_desc'];
    $updated_part_image = $_FILES['new_cpart_img']['name'];
    $updated_part_image_tmp = $_FILES['new_cpart_img']['tmp_name'];

    if(!isset($_FILES['new_cpart_img']['name']) || $_FILES['new_cpart_img']['name'] == '') {
        $updated_part_image = $cpart_img;
    } else {
        // Handle the upload and assignment of the new image
        $updated_part_image = $_FILES['new_cpart_img']['name'];
        $updated_part_image_tmp = $_FILES['new_cpart_img']['tmp_name'];
        move_uploaded_file($updated_part_image_tmp, "img/cparts/$updated_part_image");
    }


    if(empty($updated_part_name) || empty($updated_part_category) || empty($updated_part_price) || empty($updated_part_stock) || empty($updated_part_desc)) {
          echo '<script>alert("All fields are required!");</script>';
      } else {
        $stmt = $con->prepare("UPDATE car_parts SET cpart_name = ?, cpart_category = ?, cpart_price = ?, cpart_stock = ?, cpart_desc = ?, cpart_img = ? WHERE cpart_id = ?");
    $stmt->bind_param("ssiissi", $updated_part_name, $updated_part_category, $updated_part_price, $updated_part_stock, $updated_part_desc, $updated_part_image, $part_id);

        if($stmt->execute()) {
            echo '<script>alert("Car part has been updated successfully!");</script>';
            echo '<script>window.location.href="index.php?view_parts";</script>';
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
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert New Car part
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="fa fa-money fa-fw"></i> Add New Car part
        </h3>
      </div>

            <div class="panel-body"><!-- panel-body Start -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Start -->
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Car Part Name </label> 
                        <div class="col-md-6">
                            <input name="cpart_name" type="text" class="form-control" value="<?php echo $cpart_name; ?>" required>
                        </div>
                    </div>

                       <!-- Category selection dropdown -->
                    <div class="form-group">
                      <label class="control-label col-md-3">Category</label>
                      <div class="col-md-6">
                          <select name="cpart_cat" class="form-control" required>
                              <option value="" disabled <?php if(empty($cpart_category)) echo "selected"; ?>>Select Category</option>
                              <option value="Engine" <?php if($cpart_category == 'Engine') echo "selected"; ?>>Machinery</option>
                              <option value="Interior" <?php if($cpart_category == 'Interior') echo "selected"; ?>>Accessory Equipments</option>
                              <option value="Brakes & Suspension" <?php if($cpart_category == 'Brakes & Suspension') echo "selected"; ?>>Components Parts</option>
                              <option value="Exterior" <?php if($cpart_category == 'Exterior') echo "selected"; ?>>Operating Supplies</option>
                              <option value="Mags" <?php if($cpart_category == 'Mags') echo "selected"; ?>>Processed Materials</option>
                              
                          </select>
                      </div>
                    </div>

                     <!-- Duplicated fields -->
                    <div class="form-group">
                        <label class="control-label col-md-3">Quantity</label>
                        <div class="col-md-6">
                            <input name="cpart_stock" type="number" class="form-control" pattern="^\d+(\.\d{1,2})?$" value="<?php echo $cpart_stock; ?>" required>
                        </div>
                    </div>

                     <!-- Duplicated fields -->
                    <div class="form-group">
                        <label class="control-label col-md-3">Price</label>
                        <div class="col-md-6">
                            <input name="cpart_price" type="number" class="form-control" pattern="^\d+(\.\d{1,2})?$" value="<?php echo $cpart_price; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Car Part Desc</label> 
                        <div class="col-md-6">
                            <textarea name="cpart_desc" cols="19" rows="6" class="form-control" required><?php echo $cpart_desc; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Current Car Part Image</label>
                        <div class="col-md-6">
                            <input type="hidden" name="cpart_img" value="<?php echo $cpart_img ?>">
                            <img src="img/cparts/<?php echo $cpart_img; ?>" width="100" height="100">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">New Car Part Image</label>
                        <div class="col-md-6">
                            <input name="new_cpart_img" type="file" class="form-control">
                        </div>
                    </div>

                    <div class="form-group"><!-- form-group Start -->
                        <label class="col-md-3 control-label"></label> 
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <input name="update" value="Update Part" type="submit" class="btn btn-primary form-control">
                        </div><!-- col-md-6 Finish -->
                    </div><!-- form-group Finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>