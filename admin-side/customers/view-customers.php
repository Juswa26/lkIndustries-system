<?php 
    
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{

?>

<div class="row mt-5"><!-- row 1 Start -->
    <div class="col-lg-12"><!-- col-lg-12 Start -->
        <ol class="breadcrumb"><!-- breadcrumb Start -->
            <li>  
                <i class="fa fa-dashboard"></i> Dashboard / Customers   
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-tags fa-fw"></i> View Customers
				</h3>
			</div>

            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table id="admin_table" class="table table-hover table-striped table-bordered">
						<thead><!-- thead begin -->
                            <tr><!-- tr begin -->
							
                                <th> Customer_ID </th>
                                <th> Customer_Name </th>
                                <th> Customer_Email </th>
                                <th> Customer_Phone </th>
                                <th> Customer_Pass </th>
                                <th> Created_At </th>
								<th> Edit_Customer</th>
								<th> Delete_Customer</th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody>

						<?php
                                $rowNumber = 0;
                                while($customers = mysqli_fetch_assoc($run_customers)) {
                                    $rowNumber++;
                                    $customer_id = $customers['customer_id'];
                                    echo "<tr>";
                                    echo "<td>" . $rowNumber . "</td>"; 
                                    echo "<td>" . $customers['customer_name'] . "</td>";  
                                    echo "<td>" . $customers['customer_email'] . "</td>";  
                                    echo "<td>" . $customers['customer_phone'] . "</td>";  
									echo "<td>" . $customers['customer_pass'] . "</td>";  
									echo "<td>" . $customers['created_at'] . "</td>";  
                                    echo "<td><a href='index.php?edit_customers=" . $customer_id . "' class='btn btn-dark'><i class='fa-solid fa-pen-to-square' style='color: #fff;'></i>  Edit Customer</a></td>";  // Edit Category link
                                   echo "<td>
                                    <a href='index.php?delete_customers=" . $customer_id . "' onClick=\"return confirm('Are you sure you want to delete this customer?')\" class='btn btn-danger'>
                                        <i class='fa-solid fa-trash-can' style='color: #fff;'></i> Delete Customer
                                        </a>
                                        </td>";  // Delete Services link
echo                                    "</tr>";
                                }
                            ?>













                        	<!-- <tr>
                        		<td>1</td>
                        		<td>ID00000000</td>
                        		<td>Cat Title</td>
                        		<td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga maxime cum, laudantium error dolor ipsum! Enim illum cupiditate sunt accusantium, minus, placeat, dolorum magni labore corporis nihil amet odit sint!</td>
                                <td> 09726456782 </td>
                                <td> 1234 </td>
                                <td> Customer_Pass </td>
                        		<th>Edit</th>
                        		<th>Delete</th>
                        	</tr>
                        	<tr>
                        		<td>1</td>
                        		<td>ID00000000</td>
                        		<td>Cat Title</td>
                        		<td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga maxime cum, laudantium error dolor ipsum! Enim illum cupiditate sunt accusantium, minus, placeat, dolorum magni labore corporis nihil amet odit sint!</td>
                                <td> 09726456782 </td>
                                <td> 1234 </td>
                                <td> Customer_Pass </td>
                        		<th>Edit</th>
                        		<th>Delete</th>
                        	</tr>
                        	 -->
                        	
                        </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>