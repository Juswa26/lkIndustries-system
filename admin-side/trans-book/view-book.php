<?php 
    
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('../login.php','_self')</script>";
    }else{

?>

<div class="row mt-5"><!-- row 1 Start -->
    <div class="col-lg-12"><!-- col-lg-12 Start -->
        <ol class="breadcrumb"><!-- breadcrumb Start -->
            <li>  
                <i class="fa fa-dashboard"></i> Dashboard / View Booking Transaction
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="fa fa-tags fa-fw"></i> View Booking Transaction
        </h3>
      </div>

            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table id="admin_table" class="table table-hover table-striped table-bordered">
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                            
                            <th>btrans_code</th>
                            <th>cust_id</th>
                            <th>cust_name</th>
                            <th>cust_email</th>
                            <th>cust_contact</th>
                            <th>car_make</th>
                            <th>car_model</th>
                            <th>car_year</th>
                            <th>car_vin</th>
                            <th>car_odo</th>
                            <th>car_license</th>
                            <th>serv_name</th>
                            <th>book_desc</th>
                            <th>book_status</th>
                            <th>shed_date</th>
                            <th>date_created</th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody>
                          <?php
                            $rowNumber = 0;
                            while($book= mysqli_fetch_assoc($run_booking)) {
                                $rowNumber++;
                                $btrans_id = $book['btrans_id'];
                                echo "<tr>";
                                echo "<td>" . $rowNumber . "</td>";
                                echo "<td>" . $run_booking['btrans_code'] . "</td>";  
                                echo "<td>" . $book['cust_id'] . "</td>";  
                                echo "<td>" . $book['cust_name'] . "</td>";  
                                echo "<td>" . $book['cust_email'] . "</td>";  
                                echo "<td>" . $book['cust_contact'] . "</td>";  
                                echo "<td>" . $book['car_make'] . "</td>"; 
                                echo "<td>" . $book['car_model'] . "</td>"; 
                                echo "<td>" . $book['car_year'] . "</td>"; 
                                echo "<td>" . $book['car_vin'] . "</td>"; 
                                echo "<td>" . $book['car_odo'] . "</td>"; 
                                echo "<td>" . $book['car_license'] . "</td>"; 
                                echo "<td>" . $book['serv_name'] . "</td>"; 
                                echo "<td>" . $book['book_desc'] . "</td>"; 
                                echo "<td>" . $book['book_status'] . "</td>"; 
                                echo "<td>" . $book['sched_date'] . "</td>"; 
                                echo "<td>" . $book['date_created'] . "</td>"; 
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