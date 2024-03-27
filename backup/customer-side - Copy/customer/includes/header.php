<?php 
	include("includes/db.php");
	include("./functions/functions.php");

	$user_session = $_SESSION['email'];
	$query_user = "SELECT * FROM cust_users WHERE customer_email='$user_session'";
	$run_query_user = mysqli_query($con,$query_user);
	$row_user = mysqli_fetch_array($run_query_user);
	$user_name = $row_user['customer_name'];
 ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Auto Shop</title>

 	<link rel="stylesheet" type="text/css" href="styles/bootstrap-337.min.css">
	<link rel="stylesheet" type="text/css" href="font-awsome/css/font-awesome.min.css">
 	
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

 	<link rel="stylesheet" type="text/css" href="./styles/style2.css">
 </head>
 <body>
 	<!-- Navbar Start -->
 	<header class="header">

 		<!-- Menubar -->
 		<div id="menubar" class="fa-solid fa-bars" style="color: #000000;"></div>

 		<!-- Logo -->
 		<a href="#" class="logo"><img src="img/logo.jpg" alt=""></span></a>

 		<!-- Nav Menu -->
 		<nav class="navbar">
 			<a href="index.php">Home</a>
 			<a href="#services">Services</a>
 			<a href="#">Parts</a>
 			<a href="#reviews">About Us</a>
 			<a href="#contact">Contact</a>
 		</nav>

 		<!-- Login -->
 		<div class="dropdown">
			<a class="my-btn btn btn-secondary btn-lg dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			  Welcome: <?php echo $user_name; ?>
			</a>
			<ul class="dropdown-menu w-120 fs-3">
			  <li><a class="dropdown-item" href="#">User Profile</a></li>
			  <li><a class="dropdown-item" href="#">User Transaction</a></li>
			  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
			</ul>
		</div>
 	</header>
 	<!-- Navbar End -->

