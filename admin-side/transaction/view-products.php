<?php 
    
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('../login.php','_self')</script>";
    }else{

?>

<div class="row mt-5"><!-- row 1 Start -->
    <div class="col-lg-12"><!-- col-lg-12 Start -->
        <ol class="breadcrumb"><!-- breadcrumb Start -->
            <li>  
                <i class="fa fa-dashboard"></i> Dashboard / View Products Transaction
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="fa fa-tags fa-fw"></i> View Products Transaction
        </h3>
      </div>

            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table id="admin_table" class="table table-hover table-striped table-bordered">
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->

                            <th>trans_id</th>
                            <th>cust_id</th>
                            <th>trans_code</th>
                            <th>trans_date</th>
                            <th>amount</th>
                            <th>deliv_method</th>
                            <th>pay_method</th>
                            <th>trans_status</th>
                            
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->

                        <tbody>
                          <?php
                            $rowNumber = 0;
                            while($transact= mysqli_fetch_assoc($run_transact)) {
                                $rowNumber++;
                                $trans_id = $transact['trans_id'];
                                echo "<tr>";
                                echo "<td>" . $rowNumber . "</td>";
                                echo "<td>" . $transact['cust_id'] . "</td>";   
                                echo "<td>" . $transact['trans_code'] . "</td>";  
                                echo "<td>" . $transact['trans_date'] . "</td>";  
                                echo "<td>" . $transact['amount'] . "</td>";  
                                echo "<td>" . $transact['deliv_method'] . "</td>"; 
                                echo "<td>" . $transact['pay_method'] . "</td>"; 
                                echo "<td>" . $transact['trans_status'] . "</td>"; 
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