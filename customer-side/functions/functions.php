<?php 
session_start();

$con = mysqli_connect("localhost", "root", "", "auto_shop");
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validateFormData($name, $email, $phone, $pass, $cpass) {
    $errors = [];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format";
    }

    // Validate phone number format (starting with +639)
    if (!preg_match("/^\+639\d{9}$/", $phone)) {
        $errors["phone"] = "Phone number must start with +639 and have 12 digits in total (e.g., +639123456789)";
    }

    // Validate password strength
    if (strlen($pass) < 5 || !preg_match("/[A-Za-z]/", $pass) || !preg_match("/\d/", $pass)) {
        $errors["password"] = "Password must be at least 8 characters long and contain letters and numbers";
    }

    // Validate password and confirm password match
    if ($pass !== $cpass) {
        $errors["cpassword"] = "Passwords do not match";
    }

    return $errors;
}


function generateOTP() {
    $otpLength = 6; // Length of the OTP code
    $otpChars = '0123456789'; // Characters to be used in the OTP
    $otp = '';
    $otpCharsLength = strlen($otpChars);

    for ($i = 0; $i < $otpLength; $i++) {
        $otp .= $otpChars[rand(0, $otpCharsLength - 1)];
    }

    return $otp;
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


function sendemail_verify($name, $email, $otpCode){
	$mail = new PHPMailer(true);

	$mail->isSMTP();
	$mail->SMTPAuth = true; 
	
	$mail->Host = "smtp.gmail.com";                     
    $mail->Username = "sampletest806@gmail.com";                 
    $mail->Password = "dvmnmwhnhxezqnqa";  

    $mail->SMTPSecure = "tls";            
    $mail->Port = 587;

    $mail->setFrom("sampletest806@gmail.com",$name);
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "Email Verification from BBM Auto Shop and Services";



    $mail_template = "
	    <h2> BBM Auto Shop and Services Account Registration</h2>
	    <h4> Verify your email address to login with the below given One-Time-Password </h5>
	    <br/><br/>
	    <p>Your OTP is: <b>'$otpCode'</b></p>
	    <br>
	    <p>If you did not request OTP, no further action is required.</p>
    ";

    $mail->Body = $mail_template;
    $mail->send();
   	echo "<script>alert('OTP code has been sent to your email')</script>";
}


function insertOTPIntoDatabase($email, $otpCode, $otpExpiration) {
    $con = mysqli_connect("localhost", "root", "", "auto_shop");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $otp_query = "INSERT INTO verify_otp (otp_code, otp_expire, user_email) VALUES ('$otpCode', '$otpExpiration', '$email')";
    $run_otp_query = mysqli_query($con, $otp_query);

    if ($run_otp_query) {
        return true;
    } else {
        return false;
    }
}

function verifyOTP($email, $enteredOTP) {
    $con = mysqli_connect("localhost", "root", "", "auto_shop");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute the SQL query to check the OTP against the otp table.
    $verify_query = "SELECT otp_id FROM verify_otp WHERE user_email='$email' AND otp_code='$enteredOTP' ";
    $run_verify_query = mysqli_query($con, $verify_query);

    if ($run_verify_query && $run_verify_query->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function insertUserDataIntoDatabase($name, $email, $phone, $pass) {
    $con = mysqli_connect("localhost", "root", "", "auto_shop");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the database connection is successful
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $hashedPass = password_hash($pass, PASSWORD_BCRYPT);

    // Use a prepared statement to insert data
    $stmt = $con->prepare("INSERT INTO cust_users (customer_name, customer_email, customer_phone, customer_pass) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $con->error);
    }

    $stmt->bind_param("ssss", $name, $email, $phone, $hashedPass);

    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        // Debug statement to check for database-related errors
        echo "Execute failed: " . $stmt->error;
        // Alternatively, you can use var_dump($stmt->error); for more detailed information
        // var_dump($stmt->error);
        $stmt->close();
        return false;
    }
}


$errors = [];

if (isset($_POST['reg-btn'])) {
    $name = ($_POST["name"]);
    $email = sanitizeInput($_POST["email"]);
    $phone = sanitizeInput($_POST["phone"]);
    $pass = $_POST["password"];
    $cpass = $_POST["cpassword"];


    $errors = validateFormData($name, $email, $phone, $pass, $cpass);

    // Proceed with OTP generation and verification if there are no validation errors
    if (count($errors) > 0) {
        echo '<script> alert("There were errors with your submission:");';
			foreach ($errors as $error) {
			    echo ' alert("' . $error . '");';
			}
			echo 'window.location.href="../index.php";';
		echo '</script>';
    }else{
    	$name = $_POST["name"];
	    $email = $_POST["email"];
	    $phone = $_POST["phone"];
	    $pass = $_POST["password"];

	    $_SESSION['name'] = $name;
	    $_SESSION['email'] = $email;
	    $_SESSION['phone'] = $phone;
	    $_SESSION['pass'] = $pass;

	    $otpCode = generateOTP();
	    $otpExpiration = date('Y-m-d H:i:s', strtotime('+5 minutes')); // OTP will expire in 5 minutes

	    // Insert OTP into the database
	    if (insertOTPIntoDatabase($email, $otpCode, $otpExpiration)) {
	        // Send OTP to the user's email
	        sendemail_verify($name, $email, $otpCode);

	        // Redirect the user to the OTP verification page
	        echo "<script> window.location.href = '../otpVerify.php?email=" . $email . "'; </script>";
	        exit;
	    } else {
	        // Handle error when inserting OTP into the database
	        echo "Error occurred. Please try again later.";
	    }
    }
}

if (isset($_POST['otp-btn']) && isset($_GET["email"])) {


    if (!isset($_SESSION['name'], $_SESSION['email'], $_SESSION['phone'], $_SESSION['pass'])) {
        // Handle the error or exit
        echo "<script>alert('Required session information is missing. Please try again.');</script>";
        echo '<script>window.location.href="index.php"</script>';
        exit; // Exit the script early so none of the subsequent code runs.
    }

	$name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    $pass = $_SESSION['pass'];

    $email = $_GET["email"];
    $enteredOTP = $_POST["cOtp"];

    // Verify the OTP
    if (verifyOTP($email, $enteredOTP)) {

        if (insertUserDataIntoDatabase($name, $email, $phone, $pass)) {
            // Account created successfully
            echo "<script>alert('Account Created Successfully.');</script>";
            echo '<script>window.location.href="index.php"</script>;';
        } else {
            // Handle error when inserting user data into the database
            echo "<script>alert('Error occurred while creating the account. Please try again later.')</script>";
        }
    } else {
        // Handle error when OTP verification fails
        echo "<script>alert('Invalid or expired OTP code. Please try again.')</script>";
        echo '<script>window.location.href="index.php"</script>';
    }
}


function loginUser($email, $pass) {
    $con = mysqli_connect("localhost", "root", "", "auto_shop");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Use a prepared statement to retrieve user data by email
    $stmt = $con->prepare("SELECT customer_email, customer_pass FROM cust_users WHERE customer_email = ?");
    if (!$stmt) {
        die("Prepare failed: " . $con->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $stmt->close();

    // Check if the user with the given email exists
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($pass, $row['customer_pass'])) {
            // Password is correct, start the session and redirect the user
            session_start();
            $_SESSION['email'] = $email;
            header("Location: index.php");
            exit;
        } else {
            // Password is incorrect
            return "Invalid email or password";
        }
    } else {
        // User with the given email does not exist
        return "Invalid email or password";
    }
}
 

if (isset($_POST['log-btn'])) {
    $email = sanitizeInput($_POST["email"]);
    $pass = $_POST["pass"];

    $loginError = loginUser($email, $pass);

    if ($loginError) {
        echo "<script>alert('$loginError');</script>";
    }
}

function getCPCats(){
    $con = mysqli_connect("localhost", "root", "", "auto_shop");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $get_CPCats = "SELECT * FROM cparts_cat";
    $run_CPCats = mysqli_query($con, $get_CPCats);

    while($row_CPCats=mysqli_fetch_array($run_CPCats)){
        $cpcat_id = $row_CPCats['cat_id'];
        $cpcat_name = $row_CPCats['cat_name'];

        echo "
                <li class='list-group-item fs-4'>
                    <a href='parts.php?cat_id=$cpcat_id'>
                        $cpcat_name
                    </a>
                </li> 
            ";

    }
}


function getCarParts($pageNumber){
    $limit = 6;  // Limit number of parts displayed per page
    list($parts, $numPages) = getPartsPagination($pageNumber, $limit);

    function formatPhilippinePeso($amount_in_centavos) {
        $amount = $amount_in_centavos;
        // Format to 2 decimal places, and return with the ₱ symbol
        return '₱' . number_format($amount, 2);
    }

    foreach ($parts as $part) {
        $image = $part['cpart_img'];
        $formattedPrice = formatPhilippinePeso($part['cpart_price']);
            $card = '
            <div class="col">
                <div class="card" style="width: 25rem; background-color: #F2F3F5; height: 400px;"> <!-- set a fixed height here -->
                    <div class="card-img-container" style="height: 200px; overflow: hidden;">
                        <img src="img/cparts/' . $image . '" class="card-img-top" alt="..." style="max-width: 100%; height: auto;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center fs-2 my-3">' . $part['cpart_name'] . '</h5>
                        <p class="card-text text-end fs-3 me-3">' . $formattedPrice . '</p> <!-- Display the formatted price here -->
                        <p class="card-text text-end fs-3 me-3">In Stock: ' . $part['cpart_stock'] . '</p>
                        <div class="d-flex flex-row bd-highlight mb-3 justify-content-center">
                            <div class="p-2 bd-highlight"><a href="part_details.php?id=' . $part['cpart_id'] . '" type="button"  class="btn btn-primary btn-lg">Check Details</a></div>
                        </div>
                    </div>
                </div>
            </div>';

        echo $card;
    }
}


function getPartsPagination($pageNumber, $limit){
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  $con = mysqli_connect("localhost", "root", "", "auto_shop");
    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }


    $sql = "SELECT COUNT(*) AS total_products FROM car_parts";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $totalProducts = $row['total_products'];

    $numPages = ceil($totalProducts / $limit);

    // Calculate the starting point
    $start = ($pageNumber - 1) * $limit;

    // Get the products for the current page
    $sql = "SELECT * FROM car_parts ORDER BY cpart_name ASC LIMIT $start, $limit";
    $result = mysqli_query($con, $sql);

    // Create an array to store the products
    $products = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }

    // Close the database connection
    mysqli_close($con);

    // Return the products and the number of pages
    return array($products, $numPages);
}

function getPartsByCategory($category = null, $pageNumber = 1) {
    $limit = 6;  // Limit number of parts displayed per page
    $start = ($pageNumber - 1) * $limit;

    $con = mysqli_connect("localhost", "root", "", "auto_shop");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM car_parts";

    if ($category) {
        $sql .= " WHERE cpart_category = ?";
    }

    $sql .= " ORDER BY cpart_name ASC LIMIT ?, ?";
    
    $stmt = $con->prepare($sql);
    if ($category) {
        $stmt->bind_param("sii", $category, $start, $limit);
    } else {
        $stmt->bind_param("ii", $start, $limit);
    }
    
    $stmt->execute();
    $result = $stmt->get_result();

    $parts = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $parts[] = $row;
    }

    mysqli_close($con);

    // Display parts here. You can incorporate your card display logic.
    foreach ($parts as $part) {
        $image = $part['cpart_img'];
        $card = '
            <div class="col">
                <div class="card" style="width: 25rem; background-color: #F2F3F5; height: 400px;"> <!-- set a fixed height here -->
                    <div class="card-img-container" style="height: 200px; overflow: hidden;">
                        <img src="img/cparts/' . $image . '" class="card-img-top" alt="..." style="max-width: 100%; height: auto;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center fs-2 my-3">' . $part['cpart_name'] . '</h5>
                        <p class="card-text text-end fs-3 me-3">Php ' . $part['cpart_price'] . '</p>
                        <p class="card-text text-end fs-3 me-3">In Stock: ' . $part['cpart_stock'] . '</p>
                        <div class="d-flex flex-row bd-highlight mb-3 justify-content-center">
                            <div class="p-2 bd-highlight"><a href="part_details.php?id=' . $part['cpart_id'] . '" type="button" class="btn btn-primary btn-lg">Check Details</a></div>
                            <div class="p-2 bd-highlight"><a href="#" type="button" class="btn btn-secondary btn-lg">Add to Cart</a></div>
                        </div>
                    </div>
                </div>
            </div>';

        echo $card;
    }
}


function getCustomer(){
    // Connecting to the database
    $con = mysqli_connect("localhost", "root", "", "auto_shop");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_SESSION['email'])){
        $user_session = $_SESSION['email'];

        // Using prepared statements
        $stmt = $con->prepare("SELECT customer_id FROM cust_users WHERE customer_email=?");
        $stmt->bind_param("s", $user_session);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $cust_id = $row['customer_id'];
        }
        $stmt->close();

        // Close the connection
        mysqli_close($con);

        return isset($cust_id) ? $cust_id : null;
    }

    // Close the connection in case $_SESSION['email'] is not set.
    mysqli_close($con);
    return null;
}

function items(){
    // Connecting to the database
    $con = mysqli_connect("localhost", "root", "", "auto_shop");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $cust_id = getCustomer();

    // Using prepared statements
    $stmt = $con->prepare("SELECT * FROM cust_cart WHERE cust_id=?");
    $stmt->bind_param("i", $cust_id); 
    $stmt->execute();
    $result = $stmt->get_result();
    $count_items = $result->num_rows;

    echo $count_items;

    $stmt->close();

    // Close the connection
    mysqli_close($con);
}


function displayBookings() {
    $con = mysqli_connect("localhost", "root", "", "auto_shop");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $cust_id = getCustomer();

    $query = "SELECT btrans_code, date_created, serv_name, sched_date, book_status FROM booking WHERE cust_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $cust_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $bookings = $result->fetch_all(MYSQLI_ASSOC);
    
    mysqli_close($con);

    $output = '<tbody>';
    
    foreach ($bookings as $index => $booking) {
        $row_num = $index + 1;  // to display row number starting from 1

        $output .= '<tr>';
        $output .= '<th scope="row">' . $row_num . '</th>';
        $output .= '<td>' . htmlspecialchars($booking['btrans_code']) . '</td>';
        $output .= '<td>' . htmlspecialchars(date('d-m-Y', strtotime($booking['date_created']))) . '</td>';
        $output .= '<td>' . htmlspecialchars($booking['serv_name']) . '</td>';
        $output .= '<td>' . htmlspecialchars(date('d-m-Y', strtotime($booking['sched_date']))) . '</td>';
        $output .= '<td>' . htmlspecialchars($booking['book_status']) . '</td>';
        $output .= '</tr>';
    }
    
    $output .= '</tbody>';
    
    echo $output;
}



?>