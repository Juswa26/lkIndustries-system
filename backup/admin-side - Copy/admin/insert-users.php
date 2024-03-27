<?php 
    
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{

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
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal Start -->
                    <div class="form-group"><!-- form-group Start -->
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 Start --> 
                            Admin Name 

                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 Start -->
                            <input name="admin_name" type="text" class="form-control">
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                       <!-- Duplicate these bad boys -->
                    <div class="form-group">
                        <label class="control-label col-md-3">Role</label>
                        <div class="col-md-6">
                            <input name="admin_role" type="text" class="form-control">
                        </div>
                    </div>  <!-- Duplicate Until Here -->

                      <!-- Duplicate these bad boys -->
                    <div class="form-group">
                        <label class="control-label col-md-3">Phone Number</label>
                        <div class="col-md-6">
                            <input name="admin_num" type="tel" class="form-control">
                        </div>
                    </div>  <!-- Duplicate Until Here -->

                      <!-- Duplicate these bad boys -->
                    <div class="form-group">
                        <label class="control-label col-md-3">Email</label>
                        <div class="col-md-6">
                            <input name="admin_email" type="email" class="form-control" placeholder="example@gmail.com">
                        </div>
                    </div>  <!-- Duplicate Until Here -->

                      <!-- Duplicate these bad boys -->
                    <div class="form-group">
                        <label class="control-label col-md-3">Password</label>
                        <div class="col-md-6">
                            <input name="admin_pass" type="password" class="form-control">
                        </div>
                    </div>  <!-- Duplicate Until Here -->

                   

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