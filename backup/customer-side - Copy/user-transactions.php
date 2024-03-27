<?php
include ("includes/header.php");

// Fetch user ID based on email
$query = "SELECT customer_id FROM cust_users WHERE customer_email = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $cust_email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$userId = $user['customer_id'];

// Fetch transactions for this user
$query = "SELECT * FROM user_transactions WHERE cust_id = ?"; 
$stmt = $con->prepare($query);
$stmt = $con->prepare($query);

$stmt->bind_param("i", $userId);
$stmt->execute();
$transactions = $stmt->get_result();

?>

<section class="transact">
	<div class="container trans-wrap">
		<div class="card trans-card">
		    <ul class="breadcrumb">
		    	<li><a href="index.php">Home</a></li>
		    	<li>Transactions</li>
		    </ul>
		</div>
 
		<div class="container box">
			<div class="row">
				<div class="col row-options">
					<div class="card" style="width: 27rem;">
						<img src="img/user.jpg" class="card-img-top img-fluid" alt="...">
						<h2 class="text-center my-2">Name: <?php echo $cust_name; ?></h2>
						<div class="card-body">
							<ul class="list-group fs-3">
								<a href="user-transactions.php"><li class="list-group-item list-group-item-action active bg-dark" aria-current="true">
									<i class="fa-solid fa-box-archive" style="color: #fff;"></i>&nbsp; Transactions</li>
								</a>
								<a href="rewards.php"><li class="list-group-item list-group-item-action">
									<i class="fa-solid fa-gift" style="color: #000;"></i>&nbsp; Loyalty Rewards</li>
								</a>
								<a href="edit-profile.php"><li class="list-group-item list-group-item-action">
									<i class="fa-solid fa-user-pen" style="color: #000;"></i>&nbsp; Edit Profile</li></a>
								<a href="change-pass.php"><li class="list-group-item list-group-item-action">
									<i class="fa-solid fa-key" style="color: #000;"></i>&nbsp; Change Password</li>
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
						<div class="card-body mb-1">
						    <h1 class="mt-5 text-center">Parts Transactions</h1>
						    <h3 class="mt-4 text-center text-muted mx-5">List of all Car Parts transactions user availed within the BBM Auto Parts and Services Website</h3>
						    <hr class="text-center my-5">
						    <?php
						    	echo '<table class="table table-hover ms-5 border trans-table fs-5">';
								echo '<thead>
								        <tr>
								            <th scope="col">#</th>
								            <th scope="col">Transaction ID</th>
								            <th scope="col">Transaction Date</th>
								            <th scope="col">Amount</th>
								            <th scope="col">Delivery Method</th>
								            <th scope="col">Payment Method</th>
								            <th scope="col">Status</th>
								        </tr>
								      </thead>';
								echo '<tbody>';

								$row_num = 0; // Counter for numbering

								while ($transaction = $transactions->fetch_assoc()) {
								    $row_num++;  // Increment the counter
								    echo '<tr>';
								    echo '<th scope="row">' . $row_num . '</th>';
								    echo '<td>' . htmlspecialchars($transaction['trans_code']) . '</td>';
								    echo '<td>' . htmlspecialchars($transaction['trans_date']) . '</td>';
								    echo '<td>Php ' . htmlspecialchars(number_format($transaction['amount'], 2)) . '</td>';
								    echo '<td>' . htmlspecialchars($transaction['deliv_method']) . '</td>';
								    echo '<td>' . htmlspecialchars($transaction['pay_method']) . '</td>';
								    echo '<td>' . htmlspecialchars($transaction['trans_status']) . '</td>';
								    echo '</tr>';
								}

								echo '</tbody>';
								echo '</table>';
						    ?>
						</div>

						<div class="trans-pagination">
							<nav aria-label="Page navigation example">
								<ul class="pagination justify-content-center">
								  <li class="page-item disabled">
								    <a class="page-link fs-4" href="#" tabindex="-1" aria-disabled="true">Previous</a>
								  </li>
								  <li class="page-item active" aria-current="page"><a class="page-link fs-4" href="#">1</a></li>
								  <li class="page-item"><a class="page-link fs-4" href="#">2</a></li>
								  <li class="page-item"><a class="page-link fs-4" href="#">3</a></li>
								  <li class="page-item">
								    <a class="page-link fs-4" href="#">Next</a>
								  </li>
								</ul>
							</nav>
						</div>
					</div>


					<div class="card mt-5" style="width: 84rem;">
						<div class="card-body mb-1">
						    <h1 class="mt-5 text-center">Service Booking</h1>
						    <h3 class="mt-4 text-center text-muted">List of all Service Booking user availed within the BBM Auto Parts and Services Website</h3>
						    <hr class="text-center my-5">

						    <table class="table table-hover ms-5 border trans-table fs-5">
								<thead>
								  <tr>
								    <th scope="col">#</th>
								    <th scope="col">Transaction ID</th>
								    <th scope="col">Transaction Date</th>
								    <th scope="col">Type of Service Requested</th>
								    <th scope="col">Date of Schedule</th>
								    <th scope="col">Status</th>
								  </tr>
								</thead>
							    <?php displayBookings(); ?>
							</table>
						</div>

						<div class="trans-pagination">
							<nav aria-label="Page navigation example">
								<ul class="pagination justify-content-center">
								  <li class="page-item disabled">
								    <a class="page-link fs-4" href="#" tabindex="-1" aria-disabled="true">Previous</a>
								  </li>
								  <li class="page-item active" aria-current="page"><a class="page-link fs-4" href="#">1</a></li>
								  <li class="page-item"><a class="page-link fs-4" href="#">2</a></li>
								  <li class="page-item"><a class="page-link fs-4" href="#">3</a></li>
								  <li class="page-item">
								    <a class="page-link fs-4" href="#">Next</a>
								  </li>
								</ul>
							</nav>
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












						   <!--  <table class="table table-hover ms-5 border trans-table fs-4">
								<thead>
								  <tr>
								    <th scope="col">#</th>
								    <th scope="col">Transaction ID</th>
								    <th scope="col">Transaction Date</th>
								    <th scope="col">Amount</th>
								    <th scope="col">Delivery Method</th>
								    <th scope="col">Payment Method</th>
								    <th scope="col">Status</th>
								  </tr>
								</thead>
							    <tbody>
								    <tr>
								      <th scope="row">1</th>
								      <td>ID00000</td>
								      <td>00-00-0000</td>
								      <td>PHP 0000.00</td>
								      <td>order is being processed</td>
								    </tr>
							    </tbody>
							</table> -->