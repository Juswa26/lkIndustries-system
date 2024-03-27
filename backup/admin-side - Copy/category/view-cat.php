<?php 
    
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('../login.php','_self')</script>";
    }else{

?>

<div class="row mt-5"><!-- row 1 Start -->
    <div class="col-lg-12"><!-- col-lg-12 Start -->
        <ol class="breadcrumb"><!-- breadcrumb Start -->
            <li>  
                <i class="fa fa-dashboard"></i> Dashboard / View Categories   
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-tags fa-fw"></i> View Parts Category
				</h3>
			</div>

            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table id="admin_table" class="table table-hover table-striped table-bordered">
						<thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                            	<th> # </th>
                                <th> Category ID </th>
                                <th> Category Title </th><a href="#" class="btn-outline-danger"></a>
                                <th> Category Desc </th>
                                <th> Edit Category </th>
                                <th> Delete Category </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody>
                            <?php
                                $rowNumber = 0;
                                while($category = mysqli_fetch_assoc($run_p_categories)) {
                                    $rowNumber++;
                                    $cat_id = $category['cat_id'];
                                    echo "<tr>";
                                    echo "<td>" . $rowNumber . "</td>"; 
                                    echo "<td>" . $category['cat_code'] . "</td>";  // Category ID
                                    echo "<td>" . $category['cat_name'] . "</td>";  // Category Title
                                    echo "<td>" . $category['cat_description'] . "</td>";  // Category Desc
                                    echo "<td><a href='index.php?edit_cat=" . $cat_id . "' class='btn btn-dark'><i class='fa-solid fa-pen-to-square' style='color: #fff;'></i>  Edit</a></td>";  // Edit Category link
                                    echo "<td><a href='index.php?delete_cat=" . $cat_id . "' onClick=\"return confirm('Are you sure you want to delete this category?')\"> class='btn btn-danger'><i class='fa-solid fa-trash-can' style='color: #fff;'></i>  Delete</a></td>";  // Delete Category link
                                    echo "</tr>";
                                }
                            ?>
                        	<!-- <tr>
                        		<td>1</td>
                        		<td>ID00000000</td>
                        		<td>Cat Title</td>
                        		<td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga maxime cum, laudantium error dolor ipsum! Enim illum cupiditate sunt accusantium, minus, placeat, dolorum magni labore corporis nihil amet odit sint!</td>
                        		<td>Edit</td>
                        		<td>Delete</td>
                        	</tr> -->
                        </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<?php } ?>