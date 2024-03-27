 <?php 
	session_start();

	include("includes/db.php");
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
 			<a href="#home">Home</a>
 			<a href="#featured">Featured</a>
 			<a href="#services">Services</a>
 			<a href="#parts">Parts</a>
 			<a href="#reviews">Reviews</a>
 			<a href="#contact">Contact</a>
 		</nav>

 		<!-- Login -->
 		<div id="login-btn">
 		<button type="button" class="btn">Login</button>
 		<i class="fa-solid fa-user" style="color: #000000;"></i>
 		</div>
 	</header>
 	<!-- Navbar End -->

 	<!-- Login Form -->
 	<div class="login-form-container">

 		<span class="fa-solid fa-xmark" id="close-login-btn"></span>

 		<form action="">
 			<h3>User Login</h3>
 			<input type="email" placeholder="email" class="box">
 			<input type="password" placeholder="password" class="box">
 			<p>forget your password? <a href="#">click here</a></p>
 			<input type="submit" value="Login" class="btn">
 			<p>or login with</p>
 			<div class="buttons">
 				<a href="#" class="btn">google</a>
 				<a href="#" class="btn">facebook</a>
 			</div>
 			<p>don't have an account? <a href="#">register here</a></p>
 		</form>
 	</div>

 	<!-- Home Section Start-->
 	<section class="home" id="home">
 		<h1 class="home-parallax" data-speed="-2"> Avail our Services</h1>
 		<img class="home-parallax" data-speed="5" src="img/home-main.png" alt="">
 		<a class="btn home-parallax" data-speed="7" href="#">Explore</a> 		
 	</section>
 	<!-- Home Section End -->

 	<!-- Icon Section Starts -->
 	<section class="icon-section">
	 	<div class="icon-container">
	 		<div class="icons">
	 			<i class="fa-solid fa-house" style="color: #000000;"></i>
	 			<div class="content">
	 				<h3>100+</h3>
	 				<p>branches</p>
	 			</div>
	 		</div>

	 		<div class="icons">
	 			<i class="fa-solid fa-car" style="color: #000000;"></i>
	 			<div class="content">
	 				<h3>3100+</h3>
	 				<p>cars sold</p>
	 			</div>
	 		</div>

	 		<div class="icons">
	 			<i class="fa-solid fa-users" style="color: #000000;"></i>
	 			<div class="content">
	 				<h3>500+</h3>
	 				<p>happy clients</p>
	 			</div>
	 		</div>

	 		<div class="icons">
	 			<i class="fa-solid fa-car" style="color: #000000;"></i>
	 			<div class="content">
	 				<h3>100+</h3>
	 				<p>new cars</p>
	 			</div>
	 		</div>
	 	</div>
	</section>
 	<!-- Icon Section End -->

 	<!-- Vehicles Seciton Starts-->
 	<section class="vehicle" id="vehicles">
 		<h1 class="heading">popular<span> vehicles</span></h1>

 		<div class="slider">
 			 <div class="wrapper">

 			 	<i class="fa-solid fa-angle-left preNext" id="preBtn" style="color: #000000;"></i>

 			 	<div class="wrapper-box">
 			 		<div class="box active">
 			 			<img src="img/parts.png" alt="">
 			 			<div class="content">
	 			 			<h3>new model 1</h3>
	 			 			<div class="price"><b>price:</b> <span>Php 5,000.00</span></div>
	 			 			<div class="details">
		 			 			<p class="detials"><i class="fa-solid fa-circle" style="color: #000000;"></i><b>Tire Brand:</b> XYZ Tire Co.</p>
		 			 			<p class="detials"><i class="fa-solid fa-circle" style="color: #000000;"></i><b>Model:</b> SuperGrip Pro</p>
		 			 		</div>
	 			 			<a href="#" class="btn">Check Out</a>
	 			 		</div>
 			 		</div>

 			 		<div class="box">
 			 			<img src="img/parts.png" alt="">
 			 			<div class="content">
	 			 			<h3>new model 2</h3>
	 			 			<div class="price"><b>price:</b> <span>Php 5,000.00</span></div>
	 			 			<div class="details">
		 			 			<p class="detials"><i class="fa-solid fa-circle" style="color: #000000;"></i><b>Tire Brand:</b> XYZ Tire Co.</p>
		 			 			<p class="detials"><i class="fa-solid fa-circle" style="color: #000000;"></i><b>Model:</b> SuperGrip Pro</p>
		 			 		</div>
	 			 			<a href="#" class="btn">Check Out</a>
	 			 		</div>
 			 		</div>

 			 		<div class="box">
 			 			<img src="img/parts.png" alt="">
 			 			<div class="content">
	 			 			<h3>new model 3</h3>
	 			 			<div class="price"><b>price:</b> <span>Php 5,000.00</span></div>
	 			 			<div class="details">
		 			 			<p class="detials"><i class="fa-solid fa-circle" style="color: #000000;"></i><b>Tire Brand:</b> XYZ Tire Co.</p>
		 			 			<p class="detials"><i class="fa-solid fa-circle" style="color: #000000;"></i><b>Model:</b> SuperGrip Pro</p>
		 			 		</div>
	 			 			<a href="#" class="btn">Check Out</a>
	 			 		</div>
 			 		</div>

 			 		<div class="box">
 			 			<img src="img/parts.png" alt="">
 			 			<div class="content">
	 			 			<h3>new model 4</h3>
	 			 			<div class="price"><b>price:</b> <span>Php 5,000.00</span></div>
	 			 			<div class="details">
		 			 			<p class="detials"><i class="fa-solid fa-circle" style="color: #000000;"></i><b>Tire Brand:</b> XYZ Tire Co.</p>
		 			 			<p class="detials"><i class="fa-solid fa-circle" style="color: #000000;"></i><b>Model:</b> SuperGrip Pro</p>
		 			 		</div>
	 			 			<a href="#" class="btn">Check Out</a>
	 			 		</div>
 			 		</div>

 			 		<div class="box">
 			 			<img src="img/parts.png" alt="">
 			 			<div class="content">
	 			 			<h3>new model 5</h3>
	 			 			<div class="price"><b>price:</b> <span>Php 5,000.00</span></div>
	 			 			<div class="details">
		 			 			<p class="detials"><i class="fa-solid fa-circle" style="color: #000000;"></i><b>Tire Brand:</b> XYZ Tire Co.</p>
		 			 			<p class="detials"><i class="fa-solid fa-circle" style="color: #000000;"></i><b>Model:</b> SuperGrip Pro</p>
		 			 		</div>
	 			 			<a href="#" class="btn">Check Out</a>
	 			 		</div>
 			 		</div>

 			 		<div class="box">
 			 			<img src="img/parts.png" alt="">
 			 			<div class="content">
	 			 			<h3>new model 6</h3>
	 			 			<div class="price"><b>price:</b> <span>Php 5,000.00</span></div>
	 			 			<div class="details">
		 			 			<p class="detials"><i class="fa-solid fa-circle" style="color: #000000;"></i><b>Tire Brand:</b> XYZ Tire Co.</p>
		 			 			<p class="detials"><i class="fa-solid fa-circle" style="color: #000000;"></i><b>Model:</b> SuperGrip Pro</p>
		 			 		</div>
	 			 			<a href="#" class="btn">Check Out</a>
	 			 		</div>
 			 		</div>
 			 	</div>

 			 	

 			 	<i class="fa-solid fa-chevron-right preNext" id="nextBtn" style="color: #000000;"></i>

 			 </div>

 			 <div class="activeCircle">
 			 	<div class="fa-regular fa-solid fa-circle" style="color: #000"></div>
 			 	<div class="fa-regular fa-circle" style="color: #000"></div>
 			 	<div class="fa-regular fa-circle" style="color: #000"></div>
 			 	<div class="fa-regular fa-circle" style="color: #000"></div>
 			 	<div class="fa-regular fa-circle" style="color: #000"></div>
 			 	<div class="fa-regular fa-circle" style="color: #000"></div>
 			 </div>

 		</div>
 	</section>
 	<!-- Vehicles Section End -->

 	<!-- Services Secion Start -->
 	<section class="services" id="services">

 		<h1 class="heading">our <span>services</span></h1>

 		<div class="box-container">
	 		<div class="box">
	 			<i class="fa-solid fa-screwdriver-wrench" style="color: #000000;"></i>
	 			<h3>Car Maintenance</h3>
	 			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, illum.</p>
	 			<a href="#" class="btn">read more</a>
	 		</div>

	 		<div class="box">
	 			<i class="fa-solid fa-oil-can" style="color: #000000;"></i>
	 			<h3>Change Oil</h3>
	 			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, illum.</p>
	 			<a href="#" class="btn">read more</a>
	 		</div>

	 		<div class="box">
	 			<i class="fa-solid fa-car-burst" style="color: #000000;"></i>
	 			<h3>Body Repair</h3>
	 			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, illum.</p>
	 			<a href="#" class="btn">read more</a>
	 		</div>

	 		<div class="box">
	 			<i class="fa-solid fa-car-on" style="color: #000000;"></i>
	 			<h3>Car Tuning</h3>
	 			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, illum.</p>
	 			<a href="#" class="btn">read more</a>
	 		</div>

	 		<div class="box">
	 			<i class="fa-solid fa-fill-drip" style="color: #000000;"></i>>
	 			<h3>Body Paint</h3>
	 			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, illum.</p>
	 			<a href="#" class="btn">read more</a>
	 		</div>

	 		<div class="box">
	 			<i class="fa-solid fa-circle-dot" style="color: #000000;"></i>
	 			<h3>Tire Replacement</h3>
	 			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, illum.</p>
	 			<a href="#" class="btn">read more</a>
	 		</div>
	 	</div>
 	</section>
 	<!-- Services Secion End -->

 	<!-- featured section starts -->
 	<section class="featured" id="featured">

 		<h1 class="heading"><span>featured</span> cars</h1>

 		<div class="featured-slider">
	 		<div class="featured-wrapper">
	 			
	 			<i class="fa-solid fa-angle-left fPreNext" id="fPreBtn" style="color: #000000;"></i>

	 			<div class="featured-wrapper2">
	 				<div class="featured-wrapper-box">
	 					<div class="box active">
	 						<img src="img/part.jpg" alt="">
	 						<h3>new model 1</h3>
	 						<div class="stars">
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star-half-stroke" style="color: #000000;"></i>
	 						</div>
	 						<div class="price">Php 000.00</div>
	 						<a href="#" class="btn">Check Out</a>
	 					</div>

	 					<div class="box ">
	 						<img src="img/part.jpg" alt="">
	 						<h3>new model 2</h3>
	 						<div class="stars">
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star-half-stroke" style="color: #000000;"></i>
	 						</div>
	 						<div class="price">Php 000.00</div>
	 						<a href="#" class="btn">Check Out</a>
	 					</div>

	 					<div class="box ">
	 						<img src="img/part.jpg" alt="">
	 						<h3>new model 3</h3>
	 						<div class="stars">
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star-half-stroke" style="color: #000000;"></i>
	 						</div>
	 						<div class="price">Php 000.00</div>
	 						<a href="#" class="btn">Check Out</a>
	 					</div>

	 					<div class="box ">
	 						<img src="img/part.jpg" alt="">
	 						<h3>new model 4</h3>
	 						<div class="stars">
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star-half-stroke" style="color: #000000;"></i>
	 						</div>
	 						<div class="price">Php 000.00</div>
	 						<a href="#" class="btn">Check Out</a>
	 					</div>

	 					<div class="box ">
	 						<img src="img/part.jpg" alt="">
	 						<h3>new model 5</h3>
	 						<div class="stars">
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star-half-stroke" style="color: #000000;"></i>
	 						</div>
	 						<div class="price">Php 000.00</div>
	 						<a href="#" class="btn">Check Out</a>
	 					</div>

	 					<div class="box ">
	 						<img src="img/part.jpg" alt="">
	 						<h3>new model 6</h3>
	 						<div class="stars">
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star-half-stroke" style="color: #000000;"></i>
	 						</div>
	 						<div class="price">Php 000.00</div>
	 						<a href="#" class="btn">Check Out</a>
	 					</div>
	 				</div>
	 			</div>
 			
	 			<i class="fa-solid fa-chevron-right fPreNext" id="fNextBtn" style="color: #000000;"></i>

 			</div>

 			<div class="fActCircle">
 				<div class="fa-regular fa-solid fa-circle" style="color: #000"></div>
 			 	<div class="fa-regular fa-circle" style="color: #000"></div>
 			 	<div class="fa-regular fa-circle" style="color: #000"></div>
 			 	<div class="fa-regular fa-circle" style="color: #000"></div>
 			 	<div class="fa-regular fa-circle" style="color: #000"></div>
 			 	<div class="fa-regular fa-circle" style="color: #000"></div>
 			</div>
 		</div>
 	</section>
 	<!-- Featured Section End -->

 	<!-- Subscribe Section Starts -->
 	<section class="subscribe">
 		<h3>subscribe for latest update</h3>
 		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam.</p>

 		<form action="">
 			<input type="email" placeholder="enter your email">
 			<input type="submit" value="submit">
 		</form>
 	</section>
 	<!-- Subscribe Section End -->

 	<!-- Review Setion starts -->
 	<section class="review" id="#reviews">
 		
 		<h1 class="heading">client's <span>reviews</span></h1>

 		<div class="review-slider">
 			
 			<i class="fa-solid fa-angle-left rPreNext" id="rPreBtn" style="color: #000000;"></i>

 			<div class="review-wrapper">
 				<div class="review-wrapper-box">
 					
 					<div class="box active">
 						<img src="img/user.jpg" alt="">
 						<div class="content">
 							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, ratione.</p>
 							<h3>John Doe 1</h3>
 							<div class="stars">
 								<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star-half-stroke" style="color: #000000;"></i>
 							</div>
 						</div>
 					</div>

 					<div class="box">
 						<img src="img/user.jpg" alt="">
 						<div class="content">
 							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, ratione.</p>
 							<h3>John Doe 2</h3>
 							<div class="stars">
 								<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star-half-stroke" style="color: #000000;"></i>
 							</div>
 						</div>
 					</div>

 					<div class="box">
 						<img src="img/user.jpg" alt="">
 						<div class="content">
 							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, ratione.</p>
 							<h3>John Doe 3</h3>
 							<div class="stars">
 								<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star-half-stroke" style="color: #000000;"></i>
 							</div>
 						</div>
 					</div>

 					<div class="box">
 						<img src="img/user.jpg" alt="">
 						<div class="content">
 							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, ratione.</p>
 							<h3>John Doe 4</h3>
 							<div class="stars">
 								<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star-half-stroke" style="color: #000000;"></i>
 							</div>
 						</div>
 					</div>

 					<div class="box">
 						<img src="img/user.jpg" alt="">
 						<div class="content">
 							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, ratione.</p>
 							<h3>John Doe 5</h3>
 							<div class="stars">
 								<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star-half-stroke" style="color: #000000;"></i>
 							</div>
 						</div>
 					</div>

 					<div class="box">
 						<img src="img/user.jpg" alt="">
 						<div class="content">
 							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, ratione.</p>
 							<h3>John Doe 6</h3>
 							<div class="stars">
 								<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star" style="color: #000000;"></i>
	 							<i class="fa-solid fa-star-half-stroke" style="color: #000000;"></i>
 							</div>
 						</div>
 					</div>

 				</div>
 			</div>

 			<i class="fa-solid fa-chevron-right rPreNext" id="rNextBtn" style="color: #000000;"></i>

 			<div class="rActCircle">
 				<div class="fa-regular fa-solid fa-circle" style="color: #000"></div>
 			 	<div class="fa-regular fa-circle" style="color: #000"></div>
 			 	<div class="fa-regular fa-circle" style="color: #000"></div>
 			 	<div class="fa-regular fa-circle" style="color: #000"></div>
 			 	<div class="fa-regular fa-circle" style="color: #000"></div>
 			 	<div class="fa-regular fa-circle" style="color: #000"></div>
 			</div>

 		</div>
 	</section>
 	<!-- Review Setion End -->


 	<!-- Contact Section Start -->
 	<section class="contact" id="contact">

 		<h1 class="heading"><span>contact</span> us</h1>

 		<div class="row">
 			<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d469.2003989949922!2d120.93942607578738!3d14.409904276913922!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d300da2ac3e9%3A0xe96c98ecf087099d!2sBBM%20Auto%20parts%20%26%20trading!5e1!3m2!1sen!2sph!4v1690096262966!5m2!1sen!2sph" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

 			<form action="">
 				<h3>get in touch</h3>
 				<input type="text" placeholder="name" class="box">
 				<input type="email" placeholder="email" class="box">
 				<input type="text" placeholder="phone number" class="box">
 				<textarea class="box" cols="30" rows="10" placeholder="message"></textarea>
 				<input type="submit" value="send message" class="btn">
 			</form>
 		</div>

 	</section>
 	<!-- Contact Section End -->

 	<!-- Footer Section Start -->

 	<section class="footer">
 		<div class="footer-box-container">
 			<div class="box">
 				<h3>our  branches</h3>
 				<a href="#"><i class="fa-solid fa-location-dot" style="color: #000000;"></i>Bacoor</a>
 				<a href="#"><i class="fa-solid fa-location-dot" style="color: #000000;"></i>Imus</a>
 			</div>

 			<div class="box">
 				<h3>quick links</h3>
 				<a href="#"><i class="fa-solid fa-arrow-right" style="color: #000000;"></i>home</a>
 				<a href="#"><i class="fa-solid fa-arrow-right" style="color: #000000;"></i>services</a>
 				<a href="#"><i class="fa-solid fa-arrow-right" style="color: #000000;"></i>parts</a>
 				<a href="#"><i class="fa-solid fa-arrow-right" style="color: #000000;"></i>reviews</a>
 				<a href="#"><i class="fa-solid fa-arrow-right" style="color: #000000;"></i>contact</a>
 			</div>

 			<div class="box">
 				<h3>Contacts</h3>
 				<a href="#"><i class="fa-solid fa-phone" style="color: #000000;"></i>+6391 5470 2200</a>
 				<a href="#"><i class="fa-solid fa-envelope" style="color: #000000;"></i>Bbmautoparts&services@gmail.com</a>
 				
 			</div>

 			<div class="box">
 				<h3>social media</h3>
 				<a href="#"><i class="fa-brands fa-facebook" style="color: #000000;"></i>Facebook</a>
 				<a href="#"><i class="fa-brands fa-twitter" style="color: #000000;"></i>Twitter</a>
 				<a href="#"><i class="fa-brands fa-twitter" style="color: #000000;"></i>Instagram</a>
 			</div>
 		</div>

 		<div class="copyright">copyright &copy; | all rights reserved</div>
 	</section>

 	<!-- Footer Section End -->



 	<!-- font awesome link -->
 	<script src="https://kit.fontawesome.com/a0f606d3ee.js" crossorigin="anonymous"></script>

 	<!-- javascript file -->
 	<script type="text/javascript" src="js/script.js"></script>
 </body>
 </html>