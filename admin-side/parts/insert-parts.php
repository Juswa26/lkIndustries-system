<?php 
    
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{

?>

<?php
    function generatePartCode() {
        $characters = '0123456789'; 
        $randomString = '';

        for ($i = 0; $i < 7; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        
        return 'CPT' . $randomString;
    }

    
    if (isset($_POST['submit'])) {
    // Get the values from the form
    $cpart_name = $_POST['cpart_name'];
    $cpart_cat = $_POST['cpart_cat'];
    $cpart_quant = $_POST['cpart_quant'];
    $cpart_price = $_POST['cpart_price'];
    $cpart_desc = $_POST['cpart_desc'];

    // Handle the file upload for the car part image
    $cpart_img = $_FILES['cpart_img']['name'];
    $cpart_img_tmp = $_FILES['cpart_img']['tmp_name'];
    move_uploaded_file($cpart_img_tmp, "img/cparts/$cpart_img");

    $cpart_code = generatePartCode();

    // Validate the input
    if(empty($cpart_name) || empty($cpart_cat) || empty($cpart_quant) || empty($cpart_price) || empty($cpart_desc) || empty($cpart_img)) {
        echo '<script>alert("All fields are required!");</script>';
    } else {
        // Prepare the insertion statement
        $stmt = $con->prepare("INSERT INTO car_parts (cpart_code, cpart_name, cpart_category, cpart_price, cpart_stock, cpart_desc, cpart_img) VALUES (?, ?, ?, ?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("sssiiss", $cpart_code, $cpart_name, $cpart_cat, $cpart_price, $cpart_quant, $cpart_desc, $cpart_img);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo '<script>alert("Car part has been added successfully!");</script>';
            echo '<script>window.location.href="index.php?view_parts";</script>';
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
                    <div class="form-group"><!-- form-group Start -->
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 Start --> 
                            Car Part Name 

                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <input name="cpart_name" type="text" class="form-control" required>
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                       <!-- Category selection dropdown -->
                    <div class="form-group">
                        <label class="control-label col-md-3">Category</label>
                        <div class="col-md-6">
                            <select name="cpart_cat" class="form-control" required>
                                <option value="" disabled selected>Select Category</option>

                                <!-- Paste mula dito ang backup na code if need -->
                                  <?php

                  $sql="SELECT * from cparts_cat";
                  $result = $con-> query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['cat_name']."'>".$row['cat_name'] ."</option>";
                    }
                  }
                ?>

                <!-- Paste end -->
                            </select>
                        </div>
                    </div>

                     <!-- Duplicated fields -->
                    <div class="form-group">
                        <label class="control-label col-md-3">Quantity</label>
                        <div class="col-md-6">
                            <input name="cpart_quant" type="number" class="form-control" pattern="^\d+(\.\d{1,2})?$" required>
                        </div>
                    </div>

                     <!-- Duplicated fields -->
                    <div class="form-group">
                        <label class="control-label col-md-3">Price</label>
                        <div class="col-md-6">
                            <input name="cpart_price" type="number" class="form-control" pattern="^\d+(\.\d{1,2})?$" required>
                        </div>
                    </div>

                    <div class="form-group"><!-- form-group Start -->
                        <label class="col-md-3 control-label"> Car Part Desc </label> 
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <textarea name="cpart_desc" cols="19" rows="6" class="form-control" required></textarea>    
                        </div><!-- col-md-6 Finish -->
                    </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group Start -->
                        <label class="col-md-3 control-label"> Car Part Image</label> 
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <input name="cpart_img" type="file" class="form-control form-height-custom" required> 
                        </div><!-- col-md-6 Finish -->
                    </div><!-- form-group Finish -->


                    <div class="form-group"><!-- form-group Start -->
                        <label class="col-md-3 control-label"></label> 
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control">
                        </div><!-- col-md-6 Finish -->
                    </div><!-- form-group Finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
<?php } ?>