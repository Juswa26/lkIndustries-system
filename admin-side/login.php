<?php
  session_start();
  include("includes/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>M-Dev Store Admin Area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <style>

@font-face {
    font-family: 'Montserrat';
    src: url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
}
      body{
  padding-top: 10%;
  background-color: #333;
}

.form-login {
    max-width: 350px;
    padding: 40px;
    border: 3px black;
    border-radius: 20px;
    background: #e9e9e9;
    margin: 0 auto;
    box-shadow: rgba(0, 0, 0, .7) 13px 13px 10px;
}

.form-login .form-login-heading{
   font-family: 'Montserrat', sans-serif;
    font-weight: 600;
    font-size: 24px;
    color: #286290;
    text-align: center;
    color: #333;
    text-align: center;
}
    </style>


</head>

<body>
</body>
  <div class="container"><!-- container Start -->
    <form action="" class="form-login" method="post"><!-- form Start -->
      <h2 class="form-login-heading"> Admin Login </h2>
      <input type="text" class="form-control" placeholder="Email Address" name="admin_email" required>
      <input type="Password" class="form-control"placeholder="Password" name="admin_pass" required>


      <button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login"><!-- button login Start -->
        Login
      </button><!-- button login Finish -->
    </form><!-- form Finish -->
  </div><!-- container Finish -->
</html>

<?php 

  if(isset($_POST['admin_login'])){
    $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
    $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
    $get_admin = "SELECT * FROM admin_users WHERE ad_email='$admin_email' AND ad_pass='$admin_pass'";
    $run_admin = mysqli_query($con,$get_admin);
    $count = mysqli_num_rows($run_admin);

    if ($count==1) {
      $_SESSION['admin_email']=$admin_email;
      echo "<script>alert('Logged in. Welcome Back')</script>";

      echo "<script>window.open('index.php?dashboard','_self')</script>";
    }else{
      echo "<script>alert('Email or Password is Invalid')</script>";
    }
  }

 ?>
