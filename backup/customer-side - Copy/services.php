<?php
include ("includes/header.php")
?>

<section class="service">
	<div class="container serv-wrap">
		<div class="card serv-card">
		    <ul class="breadcrumb">
		    	<li><a href="index.php">Home</a></li>
		    	<li>Services</li>
		    </ul>
		</div>
		<div class="container box">
			<div class="row">

				<div class="col-8 row-content">
					<div class="card" style="width: 75rem;">
						<div class="card-body mb-1">
						    <h1 class="mt-5 text-center">Book with us now</h1>
						    <h3 class="my-4 text-center text-muted">Complete the form to schedule the initial inspection</h3>
						    <hr class="text-center my-3">

						    <form class="profile-form" action="checkout_process.php" method="post">
						    	<h3 class="ms-4 my-3 fw-bold">Customer Information</h3>
						    	<div class="col-sm-11 form-group ms-5 fs-3	"><!-- form-group Start -->
							        <label>Full Name</label>
							        <input type="text" class="form-control fs-4" name="c_name" value="<?php echo htmlspecialchars($cust_name); ?>" required>
							    </div><!-- form-group Finish -->

							    <div class="col-sm-6 form-group ms-5 fs-3"><!-- form-group Start -->
							        <label>Email</label>
							        <input type="text" class="form-control fs-4" name="c_email" value="<?php echo htmlspecialchars($cust_email); ?>" required>
							    </div><!-- form-group Finish -->

							    <div class="col-sm-5 form-group fs-3 align-self-end"><!-- form-group Start -->
							        <label>Contact No. </label>
							        <input type="text" class="form-control fs-4" name="c_contact" value="<?php echo htmlspecialchars($cust_phone); ?>" required>
							    </div><!-- form-group Finish -->

							    <h3 class="col-sm-11 my-3 fw-bold">Vehicle Information</h3>
							    <div class="col-sm-3 form-group ms-5 fs-3"><!-- form-group Start -->
							        <label>Make</label>
							        <input type="text" class="form-control fs-4" name="c_make" placeholder="e.g., Toyota, Ford" required>
							    </div><!-- form-group Finish -->
							    <div class="col-sm-3 form-group ms-5 fs-3"><!-- form-group Start -->
							        <label>Model</label>
							        <input type="text" class="form-control fs-4" name="c_model" placeholder="e.g., camry, f-150" required>
							    </div><!-- form-group Finish -->
							    <div class="col-sm-4 form-group ms-5 fs-3"><!-- form-group Start -->
							    	<label>Year</label>
							        <select class="form-control fs-4" id="year" name="c_year">
									    <option selected disabled>Choose...</option>
									    <?php 
									    for($i = 2023; $i >= 1920; $i--){
									      echo "<option value='$i'>$i</option>";
									    }
									    ?>
									  </select>
							    </div><!-- form-group Finish <--></-->

							    <div class="col-sm-11 form-group ms-5 fs-3"><!-- form-group Start -->
							        <label>VIN - Vehicle Information Number</label>
							        <input type="text" class="form-control fs-4" name="c_vin" placeholder="your vehicle information number" required>
							    </div><!-- form-group Finish -->

							    <div class="col-sm-6 form-group ms-5 fs-3"><!-- form-group Start -->
							        <label>Odometer Reading</label>
							        <input type="text" class="form-control fs-4" name="c_odo" placeholder="current mileage in km/h" required>
							    </div><!-- form-group Finish -->
							    <div class="col-sm-5 form-group fs-3"><!-- form-group Start -->
							        <label>License Plate Number</label>
							        <input type="text" class="form-control fs-4" name="c_plate" placeholder="your plate number" required>
							    </div><!-- form-group Finish -->

							    <!-- Service Request -->
							    <h3 class="col-sm-11 my-3 fw-bold">Service Requested</h3>
							    <!-- Types of services-->
							    <div class="form-group ms-5">
							    	<label class="fs-3">Types of Services</label><br>
							    	<select class="form-select fs-3" name="service" aria-label="Default select example" style="width: 65.5rem;">
									  <option value="" disabled selected>Open this select menu</option>
									  <option value="PMS (Preventive Maintenance Startchedule">PMS</option>
									  <option value="Change Oil">Change Oil</option>
									  <option value="Engine Rebuilding">Engine Rebuilding</option>
									  <option value="Engine Replacement">Engine Replacement</option>
									  <option value="Flood Damaged Repair">Flood Damaged Repair</option>
									  <option value="Paint Job">Paint Job</option>
									  <option value="Body Repair">Body Repair</option>
									  <option value="Transmission Change (A to M)">Transmission Change (A to M)</option>
									  <option value="Brake Change">Brake Change</option>
									  <option value="Other">Other</option>
									</select>

									<!-- Problem Description -->
									<div class="col-sm-11 form-group mt-2 fs-3"><!-- form-group Start -->
								        <label>Description of the problem(s)</label>
								        <textarea class="form-control fs-4" name="c_desc" placeholder="Please provide a detailed description of the issue you're experiencing with your vehicle. The more detail you provide, the better we can diagnose the problem" id="floatingTextarea" rows="8"></textarea>
								    </div><!-- form-group Finish -->

							    </div>	

							    <div class="form-group col-sm-4 fs-3 ms-5">
								    <label for="firstChoice">Desired Date and Time</label>
								    <input type="datetime-local" name="c_dnt" id="firstChoice" class="form-control fs-4">
								</div>

								<input type="hidden" name="cust_id" value="<?php echo $cust_id; ?>">

						    	<div class="col-sm-11 form-group ms-5 text-center mt-5"><!-- text-center Start -->   
							        <button type="submit" name="book" class="btn1 btn-lg">    
							        Create Booking
							        </button>

							        <button type="reset" name="cancel" class="btn1 btn-lg">    
							        Cancel
							    </div><!-- text-center Finish -->
						    </form>

						</div>
					</div>
				</div>

				<div class="col row-options ms-4">
					<div class="card" style="width: 35rem;">
						<h1 class="mt-5 text-center">Our Services</h1>
						<hr class="text-center">
						<div class="accordion accordion-flush" id="accordionExample">

						  	<div class="accordion-item">
						  	  <h2 class="accordion-header" id="headingOne">
						  	    <button class="accordion-button fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						  	      PMS (Preventive Maintenance Service)
						  	    </button>
						  	  </h2>
						  	  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
						  	    <div class="accordion-body fs-5 lh-lg">
						  	      Ensuring your vehicle's long-term health requires regular preventive maintenance. Our PMS service includes comprehensive checks and minor adjustments to avoid potential major repairs. From fluid checks, filter changes, tire inspection to battery testing, our team ensures your vehicle stays in top form.
						  	    </div>
						  	  </div>
						  	</div>

						  	<div class="accordion-item">
						  	  <h2 class="accordion-header" id="headingTwo">
						  	    <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						  	      Change Oil
						  	    </button>
						  	  </h2>
						  	  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
						  	    <div class="accordion-body fs-5 lh-lg">
						  	      Regular oil changes are vital for your engine's health and longevity. Our service includes draining the old engine oil, replacing the oil filter, and filling up with premium-quality motor oil that suits your vehicle's specifications. Extend your engine's life with our expert oil change service.
						  	    </div>
						  	  </div>
						  	</div>

						  	<div class="accordion-item">
						  	  <h2 class="accordion-header" id="headingThree">
						  	    <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						  	      Engine Rebuilding
						  	    </button>
						  	  </h2>
						  	  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
						  	    <div class="accordion-body fs-5 lh-lg">
						  	      When major engine troubles strike, count on us for full engine rebuilding services. Our expert mechanics can dismantle your engine, repair or replace worn-out parts, and then reassemble it to factory specifications. This service can breathe new life into your vehicle, enhancing its performance and reliability.
						  	    </div>
						  	  </div>
						  	</div>

						  	<div class="accordion-item">
						  	  <h2 class="accordion-header" id="headingFour">
						  	    <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
						  	      Engine Replacement
						  	    </button>
						  	  </h2>
						  	  <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
						  	    <div class="accordion-body fs-5 lh-lg">
						  	      In some cases, it may be more cost-effective to replace the engine rather than repair it. We offer engine replacement services where we will source and install a new or refurbished engine that meets or exceeds original manufacturer specifications. Trust us to get your vehicle back on the road in no time.
						  	    </div>
						  	  </div>
						  	</div>

						  	<div class="accordion-item">
						  	  <h2 class="accordion-header" id="headingFive">
						  	    <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
						  	      Flood Damaged Cars Repair
						  	    </button>
						  	  </h2>
						  	  <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
						  	    <div class="accordion-body fs-5 lh-lg">
						  	      Floods can cause significant damage to your vehicle. Our team is skilled in repairing flood-damaged cars, including drying out, cleaning, and replacing damaged parts. We will check the engine, electrical system, and interior to ensure your car is safe to drive again.
						  	    </div>
						  	  </div>
						  	</div>

						  	<div class="accordion-item">
						  	  <h2 class="accordion-header" id="headingSix">
						  	    <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
						  	      Paint Job
						  	    </button>
						  	  </h2>
						  	  <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
						  	    <div class="accordion-body fs-5 lh-lg">
						  	     Whether you want to refresh your vehicle's appearance or cover up scratches and dents, our professional paint job service has you covered. We offer color-matching, high-quality paint options, and top-tier finishing techniques to give your vehicle a fresh, new look.
						  	    </div>
						  	  </div>
						  	</div>

						  	<div class="accordion-item">
						  	  <h2 class="accordion-header" id="headingSeven">
						  	    <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
						  	      Body repair
						  	    </button>
						  	  </h2>
						  	  <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
						  	    <div class="accordion-body fs-5 lh-lg">
						  	      From minor dings to major collision damage, our body repair service is equipped to handle it all. Our technicians use state-of-the-art tools and techniques to restore your vehicle to its pre-damage condition, ensuring it looks and drives like new.
						  	    </div>
						  	  </div>
						  	</div>

						  	<div class="accordion-item">
						  	  <h2 class="accordion-header" id="headingEight">
						  	    <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
						  	      Transmission Change 
						  	      <br> (Automatic to Manual)
						  	    </button>
						  	  </h2>
						  	  <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
						  	    <div class="accordion-body fs-5 lh-lg">
						  	      If you prefer the control of a manual transmission, we offer services to change your automatic transmission to a manual one. Our skilled technicians will ensure a seamless transition, allowing you to experience the joy of stick-shift driving.
						  	    </div>
						  	  </div>
						  	</div>

						  	<div class="accordion-item">
						  	  <h2 class="accordion-header" id="headingNine">
						  	    <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
						  	      Brake Change
						  	    </button>
						  	  </h2>
						  	  <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
						  	    <div class="accordion-body fs-5 lh-lg">
						  	      Your safety is our top priority. We provide complete brake change services, including replacing brake pads, rotors, and fluid as needed. Our team uses high-quality parts to ensure you have reliable stopping power on the road.
						  	    </div>
						  	  </div>
						  	</div>

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
 	<script type="text/javascript">
 		function enableTextbox() {
	        var checkBox = document.getElementById("otherCheck");
	        var text = document.getElementById("otherInput");
	        if (checkBox.checked == true){
	            text.disabled = false;
	        } else {
	            text.disabled = true;
	        }
	    }
 	</script>
 </body>
 </html>