<?php
include("includes/header.php");
?>


<div id="content">
	<div class="container">


<section class="car-parts">
	<div class="container part-wrap">

		<div class="card part-card">
		    <ul class="breadcrumb">
		    	<li><a href="index.php">Home</a></li>
		    	<li>Industrial Products</li>
		    </ul>
		</div>


	<div class="row car-row">
		<div class="col side-col">
			<div class="card side-card mt-5" style="width: 25rem;">
				<div class="card-header fs-3">
				    Products Category
				 </div>
				<div class="card-body">
					<form class="d-flex mb-3">
				        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				        <button class="btn btn-outline-dark" type="submit"><i class="fa-solid fa-magnifying-glass" style="color: #000;"></i></button>
				    </form>
					<ul class="list-group fs-4">
					    <a href="?category=Interior"><li class="list-group-item list-group-item-action <?php echo $category === 'Interior' ? 'active' : ''; ?>">Machinery</li></a>
					    <a href="?category=Exterior"><li class="list-group-item list-group-item-action <?php echo $category === 'Exterior' ? 'active' : ''; ?>">Accessory Equipments</li></a>
					    <a href="?category=SuspensionAndBrakes"><li class="list-group-item list-group-item-action <?php echo $category === 'SuspensionAndBrakes' ? 'active' : ''; ?>">Components Parts</li></a>
					    <a href="?category=EngineParts"><li class="list-group-item list-group-item-action <?php echo $category === 'EngineParts' ? 'active' : ''; ?>">Operating Supplies</li></a>
					    <a href="?category=Maintenance"><li class="list-group-item list-group-item-action <?php echo $category === 'Maintenance' ? 'active' : ''; ?>">Processed Materials</li></a>
					</ul>
				</div>
			</div>		
   		</div>
   		<div class="col-9">
   			<div class="head-box">
				<div class="container text-center">
					<h3 class="heading fw-bold">Car Parts</h3>
					<hr>
					<p class="fs-3">Here you can check out our new products with fair price.</p>
				</div>
			</div>
			<div class="parts">
				<div class="container">
					<div class="row row-cols-2 row-cols-md-3 g-5 gy-2">
						<?php 

						$pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        				getCarParts($pageNumber);

						?>			
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
			
		<nav aria-label="Page navigation example">
		    <ul class="pagination justify-content-center pagination-lg">
		        <?php
		        // Getting the parts and the number of pages
		        list($parts, $numPages) = getPartsPagination(1, 6);
		        $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;

		        // Previous Page
		        if ($pageNumber > 1) {
		            $prevPage = $pageNumber - 1;
		            echo '<li class="page-item"><a class="page-link" href="?page=' . $prevPage . '">Previous</a></li>';
		        } else {
		            echo '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a></li>';
		        }

		        // Pagination Numbers
		        for ($i = 1; $i <= $numPages; $i++) {
		            if ($i == $pageNumber) {
		                echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
		            } else {
		                echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
		            }
		        }

		        // Next Page
		        if ($pageNumber < $numPages) {
		            $nextPage = $pageNumber + 1;
		            echo '<li class="page-item"><a class="page-link" href="?page=' . $nextPage . '">Next</a></li>';
		        } else {
		            echo '<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>';
		        }
		        ?>
		    </ul>
		</nav>


		</section>

	</div>
</div>



<?php

include ("includes/footer.php")

?>



 	<!-- font awesome link -->
 	<script src="https://kit.fontawesome.com/a0f606d3ee.js" crossorigin="anonymous"></script>
 	<!-- bootstrap link -->
 	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 	<!-- javascript file -->
 	<script type="text/javascript" src="	js/script.js"></script>
 </body>
 </html>
