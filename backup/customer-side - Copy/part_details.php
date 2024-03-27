<?php
include ("includes/header.php");

function formatPhilippinePeso($amount_in_centavos) {
        $amount = $amount_in_centavos;
        // Format to 2 decimal places, and return with the ₱ symbol
        return '₱' . number_format($amount, 2);
    }

// Check if the 'id' parameter is set in the URL
	if(isset($_GET['id'])) {
	    $part_id = intval($_GET['id']);  // Convert to integer for safety

	    // Prepare the query and bind the parameter
	    $stmt = $con->prepare("SELECT * FROM car_parts WHERE cpart_id = ?");
	    if (!$stmt) {
		    die("Prepare failed: " . mysqli_error($con));
		}
	    $stmt->bind_param("i", $part_id);
	    
	    $stmt->execute();
	    
	    $result = $stmt->get_result();
	    $part = $result->fetch_assoc();

	    if ($part) {
	    	$cpart_id = $part['cpart_id'];
		    $cpart_name = $part['cpart_name'];
		    $cpart_image = $part['cpart_img'];
		    $cpart_price = formatPhilippinePeso($part['cpart_price']); // using the same formatting function
		    $cpart_stock = $part['cpart_stock'];
		    $cpart_desc = $part['cpart_desc'];
	    } else {
	        echo "Car part not found!";
	    }

	    $stmt->close();
	} else {
	    echo "Invalid request!";
	}





?>

<section class="part-details">
	<div class="container part-wrap">
		<div class="card part-card">
		    <ul class="breadcrumb">
		    	<li><a href="index.php">Home</a></li>
		    	<li><a href="parts.php">Car Parts</a></li>
		    	<li><?php echo htmlspecialchars($cpart_name); ?></li>
		    </ul>
		</div>


		<div class="container box">
			<div class="row">
				<div class="col side-col">
					<div class="card side-card" style="width: 27rem;">
						<div class="card-header fs-3">
						    Car Parts Category
						 </div>
						<div class="card-body">
							<form class="d-flex mb-3">
						        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
						        <button class="btn btn-outline-dark" type="submit"><i class="fa-solid fa-magnifying-glass" style="color: #000;"></i></button>
						    </form>
							<ul class="list-group fs-4">
							    <a href="?category=Interior"><li class="list-group-item list-group-item-action <?php echo $category === 'Interior' ? 'active' : ''; ?>">Interior</li></a>
							    <a href="?category=Exterior"><li class="list-group-item list-group-item-action <?php echo $category === 'Exterior' ? 'active' : ''; ?>">Exterior</li></a>
							    <a href="?category=SuspensionAndBrakes"><li class="list-group-item list-group-item-action <?php echo $category === 'SuspensionAndBrakes' ? 'active' : ''; ?>">Suspension And Brakes</li></a>
							    <a href="?category=Mags"><li class="list-group-item list-group-item-action <?php echo $category === 'Mags' ? 'active' : ''; ?>">Mags</li></a>
							    <a href="?category=EngineParts"><li class="list-group-item list-group-item-action <?php echo $category === 'EngineParts' ? 'active' : ''; ?>">Engine Parts</li></a>
							    <a href="?category=Maintenance"><li class="list-group-item list-group-item-action <?php echo $category === 'Maintenance' ? 'active' : ''; ?>">Maintenance</li></a>
							</ul>
						</div>
					</div>		
		   		</div>
				<div class="col-9 grid-layout">

					<div class="container">
						<div class="row details">

							<div class="col-5 part-img">
								<div class="card" style="width: 33rem; height: 39.5rem; overflow-y: hidden;">
								  <img src="img/cparts/<?php echo htmlspecialchars($cpart_image); ?>" class="card-img-top" alt="">
								</div>
							</div>
							<div class="col-7 part-title">
								<div class="card text-center" style="width: 48rem; height: 39.5rem;">
									<div class="card-body">
									   <h1 class="card-title mt-5"><?php echo htmlspecialchars($cpart_name); ?></h1>
									   <h3 class="mt-5 card-subtitle mb-2 text-muted">
									   	In Stock: <?php echo htmlspecialchars($cpart_stock); ?>
									   </h3>
									   <form class="row part-quantity" action="cart.php" method="post">
									   		<label for="quantity" class="col-sm-6 col-form-label">Quantity</label>
									   		<div class="col-sm-6">
									   			<input type="number" name="cpart_quant" class="form-control form-control-sm" id="quantity" value="1" min="1" max="<?php echo htmlspecialchars($cpart_stock); ?>">
									   		</div>

									   		<!-- hidden -->
									   		<input type="hidden" name="cpart_id" value="<?php echo $cpart_id; ?>">
										    <input type="hidden" name="cpart_img" value="<?php echo $cpart_image; ?>">
										    <input type="hidden" name="cpart_name" value="<?php echo $cpart_name; ?>">
										    <input type="hidden" name="cpart_price" value="<?php echo $part['cpart_price'];; ?>">

										    <h2 class="part-price mt-5">
										   		Price: <?php echo htmlspecialchars($cpart_price); ?>
										   </h2>
										   <input type="submit" name="add-cart" value="Add to cart" class="btn1 mt-5">

									   </form>

									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="card part-info mb-4" style="width: 83rem;">
						<div class="card-body">
						  <h1 class="card-title pb-3 mt-2">Part Details</h1>
						  <p class="card-text fs-4 ms-5"><?php echo htmlspecialchars($cpart_desc); ?></p>
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
