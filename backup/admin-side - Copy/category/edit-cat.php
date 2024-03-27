<?php 
    
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{

?>

<?php

if(isset($_GET['edit_cat'])) {
    $cat_id = $_GET['edit_cat']; // The ID of the category you want to edit, passed in URL.
    $get_category = "SELECT * FROM cparts_cat WHERE cat_id = '$cat_id'";
    $run_category = mysqli_query($con, $get_category);
    $row_category = mysqli_fetch_assoc($run_category);
    $cat_title = $row_category['cat_name'];
    $cat_desc = $row_category['cat_description'];
}

if(isset($_POST['update'])) {
    $updated_cat_title = $_POST['cat_title'];
    $updated_cat_desc = $_POST['cat_desc'];

    if(empty($updated_cat_title) || empty($updated_cat_desc)) {
        echo '<script>alert("Both fields are required!");</script>';
    } else {
        $stmt = $con->prepare("UPDATE cparts_cat SET cat_name = ?, cat_description = ? WHERE cat_id = ?");
        $stmt->bind_param("ssi", $updated_cat_title, $updated_cat_desc, $cat_id_to_edit);

        if($stmt->execute()) {
            echo '<script>alert("Category has been updated successfully!");</script>';
            echo '<script>window.location.href="index.php?view_cats";</script>';
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
                <i class="fa fa-dashboard"></i> Dashboard / Edit Part Category
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Edit Category
                </h3>
            </div>

            <div class="panel-body"><!-- panel-body Start -->
                <form action="index.php?edit_cat=<?php echo $cat_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Start -->
                    <div class="form-group"><!-- form-group Start -->
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 Start --> 
                            Category Title 
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <input name="cat_title" type="text" class="form-control" value="<?php echo $cat_title; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group Start -->
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 Start --> 
                            Category Description 
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <textarea type='text' name="cat_desc" id="" cols="30" rows="10" class="form-control"><?php echo $cat_desc; ?></textarea>
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group Start -->
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 Start --> 
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <input value="Update Category" name="update" type="submit" class="form-control btn btn-primary">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>