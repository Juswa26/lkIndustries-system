<?php 
    
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('../login.php','_self')</script>";
    }else{

?>

<div class="row mt-5"><!-- row 1 Start -->
    <div class="col-lg-12"><!-- col-lg-12 Start -->
        <ol class="breadcrumb"><!-- breadcrumb Start -->
            <li>  
                <i class="fa fa-dashboard"></i> Dashboard / View Car Parts 
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="fa fa-tags fa-fw"></i> View Car Parts
        </h3>
      </div>

            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table id="admin_table" class="table table-hover table-striped table-bordered">
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> # </th>
                                <th> Parts ID </th>
                                <th> Image </th>
                                <th> Name </th>
                                <th> Category </th>
                                <th> Price </th>
                                <th> Stock </th>
                                <th> Description </th>
                                <th> Edit </th>
                                <th> Delete </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody>
                          <?php
                            $rowNumber = 0;
                            while($part = mysqli_fetch_assoc($run_parts)) {
                                $rowNumber++;
                                $part_id = $part['cpart_id'];
                                echo "<tr>";
                                echo "<td>" . $rowNumber . "</td>";
                                echo "<td>" . $part['cpart_code'] . "</td>";  // Part ID
                                echo "<td><img src='img/cparts/" . $part['cpart_img'] . "' width='60' height='60'></td>";  // Part Image
                                echo "<td>" . $part['cpart_name'] . "</td>";  // Part Name
                                echo "<td>" . $part['cpart_category'] . "</td>";  // Part Category
                                $price_formatted = '₱' . number_format($part['cpart_price'], 2); 
                                echo "<td>" . $price_formatted . "</td>";  // Part Price
                                echo "<td>" . $part['cpart_stock'] . "</td>";  // Part Stock
                                echo "<td>" . $part['cpart_desc'] . "</td>";  // Part Description
                                echo "<td><a href='index.php?edit_part=" . $part_id . "' class='btn btn-dark'><i class='fa-solid fa-pen-to-square' style='color: #fff;'></i> Edit Part</a></td>";  // Edit Part link
                                echo "<td><a href='index.php?delete_part=" . $part_id . "' onClick=\"return confirm('Are you sure you want to delete this part?')\" class='btn btn-danger'><i class='fa-solid fa-trash-can' style='color: #fff;'></i>  Delete Part</a></td>";  // Delete Part link
                                echo "</tr>";
                            }
                          ?>
 

                          <!-- <tr>
                            <td>1</td>
                            <td>ID00000000</td>
                            <td>image</td>
                            <td>name</td>
                            <td>category</td>
                            <td>price</td>
                            <td>stock</td>
                            <td>Description</td>
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