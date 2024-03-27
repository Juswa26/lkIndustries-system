<?php 
    
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{

?>

<div class="row mt-5"><!-- row 1 Start -->
    <div class="col-lg-12"><!-- col-lg-12 Start -->
        <ol class="breadcrumb"><!-- breadcrumb Start -->
            <li>  
                <i class="fa fa-dashboard"></i> Dashboard / View Services   
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-tags fa-fw"></i> View Services
				</h3>
			</div>

            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table id="admin_table" class="table table-hover table-striped table-bordered">
						<thead><!-- thead begin -->

                            <tr><!-- tr begin -->
							<th> #</th>
							<th> Service_ID</th>
                                <th> Service_Name</th>
                                <th> Service_Description</th>
								<th> Edit_Services</th>
								<th> Delete_Services</th>
                                
                                
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
						
                        <tbody> 
					
						<?php
                                $rowNumber = 0;
                                while($services = mysqli_fetch_assoc($run_service)) {
                                    $rowNumber++;
                                    $serv_id = $services['serv_id'];
                                    echo "<tr>";
                                    echo "<td>" . $rowNumber . "</td>"; 

                                    echo "<td>" . $services['serv_code'] . "</td>";  // Services ID
                                    echo "<td>" . $services['serv_name'] . "</td>";  // Services Title
                                    echo "<td>" . $services['serv_desc'] . "</td>";  // Services Desc
                                    echo "<td><a href='index.php?edit_services=" . $serv_id . "' class='btn btn-dark'><i class='fa-solid fa-pen-to-square' style='color: #fff;'></i>  Edit Service</a></td>";  // Edit Category link
                                   echo "<td>
                                    <a href='index.php?delete_services=" . $serv_id . "' onClick=\"return confirm('Are you sure you want to delete this service?')\" class='btn btn-danger'>
                                        <i class='fa-solid fa-trash-can' style='color: #fff;'></i> Delete Service
                                        </a>
                                        </td>";  // Delete Services link
echo                                    "</tr>";

                                }
                            ?>
						
                        	<!-- <tr>
                        		<td>1</td>
                        		<td>Change Oil</td>
                        		<td>Pinalitan ang Oil</td>
                        		<th>Edit</th>
								<th>Delete</th>
                        	</tr>
                        	<tr>
                        		<td>2</td>
                        		<td>Change Oil</td>
                        		<td>Pinalitan ang Oil</td>
                        		<th>Edit</th>
								<th>Delete</th>
                        	</tr> -->
                        	
                        	
                        </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>