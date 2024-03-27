<?php 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{


	function generateCatCode() {
	    $characters = '0123456789'; 
	    $randomString = '';
    
	    for ($i = 0; $i < 7; $i++) {
	        $index = rand(0, strlen($characters) - 1);
	        $randomString .= $characters[$index];
	    }
	    
	    return 'CAT' . $randomString;
		}


    if(isset($_POST['submit'])) {

    // Get the values from the form
    $cat_title = $_POST['cat_title'];
    $cat_desc = $_POST['cat_desc'];
    $cat_code = generateCatCode();
    
    // Validate the input
    if(empty($cat_title) || empty($cat_desc)) {
        $message = "Both fields are required!";
    } else {
        // Prepare the insertion statement
        $stmt = $con->prepare("INSERT INTO cparts_cat (cat_code, cat_name, cat_description) VALUES (?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("sss", $cat_code, $cat_title, $cat_desc);
        
        // Execute the statement
        if($stmt->execute()) {
		    echo '<script>alert("Category has been added successfully!");</script>';
		    echo '<script>window.location.href="index.php?view_cats";</script>';
		} else {
		    echo '<script>alert("Error: '. $stmt->error .'");</script>';
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
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert New Part Category
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Add New Category
				</h3>
			</div>

            <div class="panel-body"><!-- panel-body Start -->
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal Start -->
                    <div class="form-group"><!-- form-group Start -->
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 Start --> 
                            Category Title 
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <input name="cat_title" type="text" class="form-control">
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group Start -->
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 Start --> 
                            Category Description 
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <textarea type='text' name="cat_desc" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

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