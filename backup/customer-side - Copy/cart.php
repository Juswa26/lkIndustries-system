<?php
include ("includes/header.php");

if (!$con || !mysqli_ping($con)) {
    $con = mysqli_connect("localhost", "root", "", "auto_shop");
}

$customer_email = $_SESSION['email'];

$query = "SELECT customer_id FROM cust_users WHERE customer_email = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $customer_email);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
    $cust_id = $user['customer_id'];
} else {
    die("User not found.");
}
$stmt->close();


// Handle form submission logic, if coming directly from part_details.php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['add-cart'])) {
    // Extract data from POST
    $cpart_id = $_POST['cpart_id'];
    $cpart_img = $_POST['cpart_img'];
    $cpart_name = $_POST['cpart_name'];
    $cpart_price = $_POST['cpart_price'];
    $cpart_quant = $_POST['cpart_quant'];

    // Insert data into the database
    $stmt = $con->prepare("INSERT INTO cust_cart (cust_id, cpart_id, cpart_img, cpart_name, cpart_quant, cpart_price) VALUES (?, ?, ?, ?, ?, ?)");
	if (!$stmt) {
	    die("Prepare failed: " . $con->error);
	}
    $stmt->bind_param("iissss", $cust_id, $cpart_id, $cpart_img, $cpart_name, $cpart_quant, $cpart_price);



    if (!$stmt->execute()) {
        // Handle insertion error.
        echo "Error adding to cart: " . $stmt->error;
    }
    $stmt->close();
}

function displayCartItems($conn, $cust_id) {
    $query = "SELECT * FROM cust_cart WHERE cust_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $cust_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $cart_items = $result->fetch_all(MYSQLI_ASSOC);
    
    $output = '<tbody>';

    $grandTotal = 0;
    
    foreach ($cart_items as $index => $item) {
        $row_num = $index + 1;  // to display row number starting from 1
        $subtotal = $item['cpart_quant'] * $item['cpart_price'];
        $grandTotal += $subtotal;
        
        $output .= '<tr>';
        $output .= '<th scope="row">' . $row_num . '</th>';
        $output .= '<td style="width: 5rem; height: 5rem overflow-y: hidden;"><img src="img/cparts/' . htmlspecialchars($item['cpart_img']) . '" class="card-img-top" alt="part image"></td>';
        $output .= '<td>' . htmlspecialchars($item['cpart_name']) . '</td>';
        $output .= '<td>Php ' . htmlspecialchars(number_format($item['cpart_price'], 2)) . '</td>';
        $output .= '<td>' . htmlspecialchars($item['cpart_quant']) . '</td>';
        $output .= '<td>Php ' . htmlspecialchars(number_format($subtotal, 2)) . '</td>';
        $output .= '<td><a href="delete_cart.php?cart_id=' . $item['cart_id'] . '"><i class="fa-solid fa-circle-xmark ms-4" style="color: #000;"></i></a></td>';
        $output .= '</tr>';
    }
    
    $output .= '</tbody>';
    
    echo $output;

    return $grandTotal;


	}
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
						<div class="card-body">
							<h1 class="card-title" style="font-size: 4rem; ">Cart</h1>
							<h4 class="card-text text-muted">You Currently have <?php echo items(); ?> item(s) in you cart</h2>
							<table class="table mb-5 fs-4">
							  <thead>
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">product image</th>
							      <th scope="col">Product Name</th>
							      <th scope="col">unit price</th>
							      <th scope="col">Quantity</th>
							      <th scope="col">Subtotal</th>
							      <th scope="col">Delete</th>

							    </tr>
							  </thead>

							 <?php displayCartItems($con, $cust_id); ?> 
							<!--   <tbody>
							    <tr>
							      <th scope="row">1</th>
							      <td style="width: 5rem; height: 5rem"><img src="img/cparts/bumper.png" class="card-img-top" alt="part image"></td>
							      <td>Car Part Product Name</td> 
							      <td>Php 000.00</td> 
							      <td>00</td>
							      <td>Php 000.00</td>
							      <td><a href="$"><i class="fa-solid fa-circle-xmark ms-4" style="color: #000;"></i></a></td>
							    </tr>
							  </tbody> -->
							</table>

							<div class="card-footer">
								<div class="row mt-3">
									<div class="col col-9">
										<a href="index.php" class="btn1 btn-lg">Back Home</a>
									</div>
									<div class="col" style="text-align: right;">
										<a href="checkout.php" class="btn1 btn-lg">Proceed Checkout</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
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


				<div class="col col-3 order-summary">
					<div class="card" style="width: 27rem;">
						<div class="card-header fw-bold" style="font-size: 2rem">
						    Order Summary
						</div>
						<div class="card-body" style="margin: .5rem">
							<p class="card-text fs-5 text-muted mb-3">
								Aditional costs are calculated based on value you have entered
							</p>
							<table class="table" style="font-size: 1.1rem">
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
