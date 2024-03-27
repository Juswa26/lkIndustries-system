<?php
include ("includes/header.php")
?>
 
<section class="change-pass">
	<div class="container pass-wrap">
		<div class="card pass-card">
		    <ul class="breadcrumb">
		    	<li><a href="index.php">Home</a></li>
		    	<li>Edit Account</li>
		    </ul>
		</div>

		<div class="container box">
			<div class="row">
				<div class="col row-options">
					<div class="card" style="width: 27rem;">
						<img src="img/user.jpg" class="card-img-top img-fluid" alt="...">
						<h2 class="text-center my-2">Name: User Name</h2>
						<div class="card-body">
							<ul class="list-group fs-3">
								<a href="user-transactions.php"><li class="list-group-item list-group-item-action">
									<i class="fa-solid fa-box-archive" style="color: #000;"></i>&nbsp; Transactions</li>
								</a>
								<a href="rewards.php"><li class="list-group-item list-group-item-action">
									<i class="fa-solid fa-gift" style="color: #000;"></i>&nbsp; Loyalty Rewards</li>
								</a>
								<a href="edit-profile.php"><li class="list-group-item list-group-item-action">
									<i class="fa-solid fa-user-pen" style="color: #000;"></i>&nbsp; Edit Profile</li>
								</a>
								<a href="change-pass.php"><li class="list-group-item list-group-item-action active bg-dark" aria-current="true">
									<i class="fa-solid fa-key" style="color: #fff;"></i>&nbsp; Change Password</li>
								</a>
								<a href="logout.php"><li class="list-group-item list-group-item-action">
									<i class="fa-solid fa-right-from-bracket" style="color: #000;"></i>&nbsp; Log Out</li>
								</a>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-9 row-content">
					<div class="card" style="width: 84rem;">
						<div class="card-body mb-3">
						    <h1 class="mt-5 text-center">Change Account Password</h1>
						    <h3 class="mt-4 text-center text-muted">Change you account password by providing your old password and the new password</h3>
						    <hr class="text-center my-5">
						    
						    <form class="profile-form" action="" method="post">
						    	<div class="col-sm-11 form-group ms-5 fs-3	"><!-- form-group Start -->
							        <label>Old Password</label>
							        <input type="password" class="form-control fs-4" name="old_pass" required>
							    </div><!-- form-group Finish -->

							    <div class="col-sm-11 form-group ms-5 fs-3"><!-- form-group Start -->
							        <label>New Password</label>
							        <input type="password" class="form-control fs-4" name="new_pass" required>
							    </div><!-- form-group Finish -->

							    <div class="col-sm-11 form-group ms-5 fs-3"><!-- form-group Start -->
							        <label>Confirm New Password</label>
							        <input type="password" class="form-control fs-4" name="cnew_pass" required>
							    </div><!-- form-group Finish -->


						    	<div class="text-center mt-5"><!-- text-center Start -->   
							        <button name="update" class="btn btn-secondary btn-lg">    
							        Save Changes 
							        </button>

							        <button name="update" class="btn btn-danger btn-lg">    
							        Cancel
							    </div><!-- text-center Finish -->
						    </form>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</section>

<?php

include ("includes/footer.php")

?>



 	<!-- font awesome link -->
 	<script src="https://kit.fontawesome.com/a0f606d3ee.js" crossorigin="anonymous"></script>
 	<!-- bootstrap link -->
 	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 	<!-- javascript file -->
 	<script type="text/javascript" src="js/script.js"></script>
 </body>
 </html>