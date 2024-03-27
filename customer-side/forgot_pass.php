<?php
	include("includes/db.php");
	include("functions/functions.php");
?>

<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Auto Shop</title>

 	<link rel="stylesheet" type="text/css" href="styles/bootstrap-337.min.css">
	<link rel="stylesheet" type="text/css" href="font-awsome/css/font-awesome.min.css">
 	<link rel="stylesheet" type="text/css" href="styles/style.css">

 	<style type="text/css">
 		.registration-form-container{
			position: fixed;
			left: 0;
			z-index: 1000;
			height: 100%;
			width: 100%;
			background: rgba(255, 255, 255, .9);
			display: flex;
			justify-content: center;
			align-items: center;	
			top: 0;
			opacity: 1;
		}


		.registration-form-container form{
			padding: 2rem;
			margin: 2rem;
			border-radius: .5rem;
			box-shadow: var(--box-shadow);
			background: var(--bg-color);
			border: var(--box-shadow);
			text-align: center;
			width: 40rem;
		}

		.registration-form-container form .buttons{
			display: flex;
			align-items: center;
			gap: 1rem;
		}

		.registration-form-container form .btn{
			display: block;
			width: 100%;
			margin: .5rem 0;
		}

		.registration-form-container form h3{
			color: var(text-color);
			font-size: 2.5rem;
			padding-bottom: 1rem;
			text-transform: uppercase;
		}

		.registration-form-container form .box{
			margin: .7rem 0;
			width: 100%;
			text-transform: none;
			color: var(--text-color);
			font-size: 1.2rem;
			padding: 1rem 1.2rem;
			border: var(--border);
			border-radius: .5rem;
		}

		.registration-form-container form p{
			padding: 1rem 0;
			font-size: 1.5rem;
			color: var(--text-color);
		}

		.registration-form-container form p a{
			color: var(--gray);
			text-decoration: underline;
		}

		.registration-form-container #close-reg-btn{
			position: absolute;
			top: 1.5rem;
			right: 2.5rem;
			font-size: 4rem;
			color: var(--text-color);
			cursor: pointer;
		}
 	</style>

 </head>
 <body>
 	<!-- Navbar Start -->
 	<header class="header">

 		<!-- Menubar -->
 		<div id="menubar" class="fa-solid fa-bars" style="color: #000000;"></div>

 		<!-- Logo -->
 		<a href="#" class="logo"><img src="img/logo.jpg" alt=""></span></a>

 		<!-- Nav Menu -->
 		<nav class="navbar" style="margin-top: 2rem;">
 			<a href="#home">Home</a>
 			<a href="#services">Services</a>
 			<a href="#parts">New Arrivals</a>
 			<a href="#reviews">About Us</a>
 			<a href="#contact">Contact</a>
 		</nav>

 		<div id="login-btn">
	 		<button type="button" class="btn">Login</button>
	 		<i class="fa-solid fa-user" style="color: #000000;"></i>
 		</div>

 	</header>
 	<!-- Navbar End -->


 	<!-- OTP Verification -->
	<div class="registration-form-container">
 		<form action="" method="POST">
 			<h3>Forgot your password?</h3>
 			<p>Enter your registered email and we'll send you an OTP Verification</p>
 			<input type="text" name="frgtEmail" placeholder="Existing Email Address" class="box" required>
 			<input type="submit" name="frgt-btn" class="btn" value="Submit">
 		</form>
 	</div>


	<script src="https://kit.fontawesome.com/a0f606d3ee.js" crossorigin="anonymous"></script>
 	<!-- javascript file -->
 	<script type="text/javascript" src="js/script.js"></script>
 </body>
 </html>

