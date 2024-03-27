<?php
include("includes/header.php");

	$grandTotal = 0;  // Initialize the variable to store the total
	$query = "SELECT * FROM cust_cart WHERE cust_id = ?";
	$stmt = $con->prepare($query);
	$stmt->bind_param("i", $cust_id);  // Make sure $cust_id is defined
	$stmt->execute();
	$result = $stmt->get_result();
	$cart_items = $result->fetch_all(MYSQLI_ASSOC);
	foreach ($cart_items as $item) {
	    $subtotal = $item['cpart_quant'] * $item['cpart_price'];
	    $grandTotal += $subtotal;
	}
	$fee = 50.00;
	$finalTotal = $grandTotal + $fee;
	$stmt->close();

?>

<section class="user-cart">
	<div class="container cart-wrap">
		<div class="card cart-card">
		    <ul class="breadcrumb">
		    	<li><a href="index.php">Home</a></li>
		    	<li>Cart</li>
		    </ul>
		</div>

		<div class="container box">
			<div class="row inner-box">
				<div class="col col-9 sidebar">
					<div class="card" style="width: 85rem">
						<div class="card-header">
							<h1 class="card-title" style="font-size: 4rem; ">Check Out</h1>
							<h4 class="card-text text-muted">Confirm Order Details</h2>
						</div>
						<div class="card-body">
							<div class="container">
								<form class="profile-form" action="checkout_process.php" method="post">
							    	<div class="col-sm-5 form-group ms-5 fs-3	"><!-- form-group Start -->
								        <label for="Name">Full Name</label>
								        <input type="text" class="form-control fs-4" name="cname" value="<?php echo htmlspecialchars($cust_name); ?>" required>
								    </div><!-- form-group Finish -->

								    <div class="col-sm-5 form-group ms-5 fs-3"><!-- form-group Start -->
								        <label for="contact">Contact No.</label>
								        <input type="text" class="form-control fs-4" name="ccon" value="<?php echo htmlspecialchars($cust_phone); ?>" required>
								    </div><!-- form-group Finish -->

								    <div class="col-sm-5 form-group ms-5 fs-3	"><!-- form-group Start -->
								        <label for="fulfillment">Fulfillment Option</label>
								        <div class="input-group mb-3">
										  <select class="form-select fs-3" name="fulfillment" id="inputGroupSelect01" required>
										    <option value="" disabled selected>Choose...</option>
										    <option value="in store pickup">In Store Pickup</option>
										    <option value="standard delivery" disabled>Standard Delivery</option>
										  </select>
										</div>
								    </div><!-- form-group Finish -->

								    <div class="col-sm-5 form-group ms-5 fs-3"><!-- form-group Start -->
								        <label for="payment">Payment Option</label>
								        <div class="input-group mb-3">
										  <select class="form-select fs-3" name="payment" id="inputGroupSelect01" required>
										    <option value="" disabled selected>Choose...</option>
										    <option value="store payment">Store Payment</option>
										    <option value="gcash" disabled>Gcash</option>
										    <option value="paymaya" disabled>Paymaya</option>
										  </select>
										</div>
								    </div><!-- form-group Finish -->
							</div>
 
								<input type="hidden" name="amount" value="<?php echo $finalTotal; ?>">

								<input type="hidden" name="cust_id" value="<?php echo $cust_id; ?>">


								<div class="card-footer">
									<div class="row mt-3">
										<div class="col col-9">
											<a href="index.php" class="btn1 btn-lg">Back to Cart</a>
										</div>
										<div class="col" style="text-align: right;">
											<input type="submit" class="btn1 btn-lg" name="confirm_order" value="Confirm">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="col col-3 order-summary">
					<div class="card" style="width: 27rem;">
						<div class="card-header fw-bold" style="font-size: 2rem">
						    Order Summary
						</div>
						<div class="card-body" style="margin: .5rem">
							<p class="card-text fs-5 text-muted mb-3">
								Aditional costs are calculated based on value you have entered
							</p>
							<table class="table fs-5" style="font-size: 1.1rem">
							  <tbody>
							    <tr>
							      <th scope="row" class="text-muted">Order Sub-Total</th>
							      <td>
							      <?php
							        echo 'Php ' . htmlspecialchars(number_format($grandTotal, 2));
							       ?>
							       </td>
							    <tr>
							      <th scope="row" class="text-muted">Shipping and Handling</th>
							      <td>
							      	<?php
							            echo 'Php ' . htmlspecialchars(number_format($fee, 2));
							        ?>
							      </td>
							    </tr>
							    <tr>
							      <th scope="row">Total</th>
							      <td>
							      	<?php
							            echo 'Php ' . htmlspecialchars(number_format($finalTotal, 2));
							        ?>
							      </td>
							    </tr>
							  </tbody>
							</table>
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