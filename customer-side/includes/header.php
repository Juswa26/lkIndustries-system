<?php 
	include("includes/db.php");
	include("functions/functions.php");
	
    $customer_name = '';
    $is_logged_in = false;

	if(isset($_SESSION['email'])) {
        $customer_session = $_SESSION['email'];
	    $get_customer = "SELECT * FROM cust_users WHERE customer_email='$customer_session'";
	    $run_customer = mysqli_query($con, $get_customer);

	    if(mysqli_num_rows($run_customer) > 0) {
            $row_customer = mysqli_fetch_array($run_customer);
            $cust_name = $row_customer['customer_name'];
            $is_logged_in = true;
        } else {
            echo "No customer record found.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LK Industrial</title>

	<link rel="stylesheet" type="text/css" href="styles/bootstrap-337.min.css">
	<link rel="stylesheet" type="text/css" href="font-awsome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<!-- Navbar Start -->
	<header class="header">

		<div id="menubar" class="fa-solid fa-bars"></div>
		<a href="index.php" class="logo"><img src="img/LK.png" alt=""></a>

		<nav class="navbar">
			<a href="index.php" class="nav-link">Home</a>
<!-- ADD ON 
			<a href="services.php" class="nav-link">Services</a>
 -->
			<a href="parts.php" class="nav-link">Products</a>
			<a href="index.php#about-us" class="nav-link">About Us</a>
			<a href="index.php#contact" class="nav-link">Contact</a>
		</nav>

        <?php if($is_logged_in): ?>
            <div class="row">
		 		<div class="col cart-col">
		 			<a href="cart.php" class="cart-btn"><i class="fa-solid fa-cart-shopping fa-2xl">&nbsp;<?php items() ?></i></a>
		 		</div>
		 		<div class="col user-col" id="user-btn">
					<div class="dropdown">
					  <button class="btn1 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
					    Account
					  </button>
					  <ul class="dropdown-menu fs-4" aria-labelledby="dropdownMenuButton1">
					    <li><h5 class="dropdown-header fs-5">Welcome: <?php echo "$cust_name"; ?></h5></li>
					    <li><a class="dropdown-item" href="user-transactions.php">Transactions</a></li>
					    <li><a class="dropdown-item" href="rewards.php">Exchange Points</a></li>
					    <li><a class="dropdown-item" href="edit-profile.php">Edit Account</a></li>
					    <li><hr class="dropdown-divider"></li>
	    				<li><a class="dropdown-item" href="logout.php">Log Out</a></li>
					  </ul>
					</div>
		 		</div>
	 		</div>
        <?php else: ?>
        	<div class="row">
		 		<div class="col" id="login-btn">
			 		<button type="button" class="btn1">Login</button>
			 		<i class="fa-solid fa-user" style="color: #000;"></i>
		 		</div>
	 		</div>
        	
            <!-- Login Form -->
			 	<div class="login-form-container">

			 		<span class="fa-solid fa-xmark" id="close-login-btn"></span>

			 		<form action="" method="POST">
			 			<h3>User Login</h3>
			 			<input type="email" name="email" placeholder="email" class="box">
			 			<input type="password" name="pass" placeholder="password" class="box">
			 			<p>forget your password? <a href="forgot_pass.php">click here</a></p>
			 			<input type="submit" name="log-btn" value="Login" class="btn1">

			 			<p>don't have an account? <a href="#" id="reg_btn">register here</a></p>
			 		</form>
			 	</div>

			 	<!-- Registration form -->
			 	<div class="registration-form-container">

			 		<span class="fa-solid fa-xmark" id="close-reg-btn"></span>

			 		<form action="functions/functions.php" method="POST">
			 			<h3>User Sign up</h3>
			 			<input type="text" name="name" placeholder="Full Name" class="box" required>
			 			<input type="email" name="email" placeholder="Email Address" class="box" required>
			 			<input type="phone" name="phone" placeholder="Phone Number" class="box" required>
			 			<input type="password" name="password" placeholder="Password" class="box" required>
			 			<input type="password" name="cpassword" placeholder="Confrim Password" class="box" required>
			 			<input type="submit" name="reg-btn" value="Sign up" class="btn1">  
			 			<p>already have an account? <a href="#" id="login_btn">Sign in</a></p>
			 		</form>
 				</div>
        <?php endif; ?>
	</header>
</body>
</html>
