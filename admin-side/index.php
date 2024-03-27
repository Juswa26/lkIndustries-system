<?php 
 
    session_start();
    include("includes/db.php");
    
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";   
    }else{
      $admin_session = $_SESSION['admin_email'];
      $get_admin = "SELECT * FROM admin_users WHERE ad_email='$admin_session'";
      $run_admin = mysqli_query($con,$get_admin);
      $row_admin = mysqli_fetch_array($run_admin);

      $admin_id = $row_admin['ad_id'];
      $admin_name = $row_admin['ad_name'];
      $admin_email = $row_admin['ad_email'];
      $admin_image = $row_admin['ad_img'];
      $admin_job = $row_admin['ad_role'];

      $get_parts = "select * from car_parts";
      $run_parts = mysqli_query($con,$get_parts);
      $count_parts = mysqli_num_rows($run_parts);


      $get_transact = "select * from user_transactions";
      $run_transact= mysqli_query($con,$get_transact);
      $count_transact = mysqli_num_rows($run_transact);

      $get_booking = "select * from booking";
      $run_booking= mysqli_query($con,$get_booking);
      $count_booking = mysqli_num_rows($run_booking);

      $get_customers = "select * from cust_users";      
      $run_customers = mysqli_query($con,$get_customers);
      $count_customers = mysqli_num_rows($run_customers);

      $get_p_categories = "select * from cparts_cat";
      $run_p_categories = mysqli_query($con,$get_p_categories);
      $count_p_categories = mysqli_num_rows($run_p_categories);

      
      $get_service = "select * from services";
      $run_service = mysqli_query($con,$get_service);
      $count_service = mysqli_num_rows($run_service);

      $get_rewards = "select * from rewards";
      $run_rewards = mysqli_query($con,$get_rewards);


      $get_admin = "select * from admin_users";
      $run_admin = mysqli_query($con,$get_admin);
      $count_admin = mysqli_num_rows($run_admin);



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Side</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap-337.min.css">
  <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style2.css">
  <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
</head>
<body>
    <div id="wrapper">
      <?php include("includes/sidebar.php"); ?>
      <div id="page-wrapper">
        <div class="container-fluid">
          <?php
            if(isset($_GET['dashboard'])) {
              include("dashboard.php");
            } 

            // Ptransaction Start
            

            if(isset($_GET['productsTrans'])) {
              include("transaction/view-products.php");
            }

            

            // Ptransaction End

            // Booking Start
            

            if(isset($_GET['servicesTrans'])) {
              include("transaction/view-book.php");
            }

            
            

            // Booking End

            // Parts Start
            if(isset($_GET['insert_parts'])) {
              include("parts/insert-parts.php");
            }

            if(isset($_GET['view_parts'])) {
              include("parts/view-parts.php");
            }

            if(isset($_GET['edit_part'])) {
              include("parts/edit-parts.php");
            }

            if(isset($_GET['delete_part'])) {
              include("parts/delete_parts.php");
            }
            // Parts End

            // Category Start
            if(isset($_GET['insert_cat'])) {
              include("category/insert-cat.php");
            }

            if(isset($_GET['view_cats'])) {
              include("category/view-cat.php");
            }

            if(isset($_GET['edit_cat'])) {
              include("category/edit-cat.php");
            }

            if(isset($_GET['delete_cat'])) {
              include("category/delete_cat.php");
            }
            // Category End

            // Services Start
            if(isset($_GET['view_services'])) {
              include("services/view-services.php");

            }
             if(isset($_GET['insert_service'])) {
              include("services/insert-services.php");
            }

            
            if(isset($_GET['edit_services'])) {
              include("services/edit-services.php");
            }


            if(isset($_GET['delete_services'])) {
              include("services/delete-services.php");
            }


            // Services End
             

            // Customers Start
          

            if(isset($_GET['view_customers'])) {
              include("customers/view-customers.php");
            }

            if(isset($_GET['edit_customers'])) {
              include("customers/edit-customers.php");
            }

            if(isset($_GET['delete_customers'])) {
              include("customers/delete-customers.php");
            }


             // Customers End
            

             // Users Start
             

            if(isset($_GET['view_users'])) {
              include("users/view-users.php");
            }

               if(isset($_GET['insert_user'])) {
              include("admin/insert-users.php");
            }

              if(isset($_GET['edit_user'])) {
              include("admin/edit-users.php");
            }

            if(isset($_GET['delete_user'])) {
              include("admin/delete-users.php");
            }


             // Users End
            
          ?>
        </div>
      </div>
    </div>

    <script src="https://kit.fontawesome.com/a0f606d3ee.js" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="/js/jquery-3.5.1.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
    <script src="js/jquery-331.min.js"></script>     
    <script src="js/bootstrap-337.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
            $(document).ready(function () {
            $('#admin_table').DataTable();
        });
    </script> 
</body>
</html>


<?php } ?>