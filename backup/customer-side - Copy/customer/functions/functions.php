<?php 
$con = mysqli_connect("localhost", "root", "", "auto_shop");
session_start();

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
	global $con;

    $otp_query = "INSERT INTO verify_otp (otp_code, otp_expire, user_email) VALUES ('$otpCode', '$otpExpiration', '$email')";
    $run_otp_query = mysqli_query($con, $otp_query);

    if ($run_otp_query) {
        return true;
    } else {
        return false;
    }
}

function verifyOTP($email, $enteredOTP) {
	global $con;

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
    global $con;

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
            echo "<script>alert('Account Created Cuccessfully. Please proceed to login');</script>";
            echo '<script>window.location.href="index.php"</script>;';
        } else {
            // Handle error when inserting user data into the database
            echo "<script>alert('Error occurred while creating the account. Please try again later.')</script>";
            echo '<script>window.location.href="index.php"</script>';
        }
    } else {
        // Handle error when OTP verification fails
        echo "<script>alert('Invalid or expired OTP code. Please try again.')</script>";
        echo '<script>window.location.href="index.php"</script>';
    }
}


function loginUser($email, $pass) {
    global $con;

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
            header("Location: customer/index.php");
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
    global $con;

    $get_CPCats = "SELECT * FROM cparts_cat";
    $run_CPCats = mysqli_query($con, $get_CPCats);

    while($row_CPCats=mysqli_fetch_array($run_CPCats)){
        $cpcat_id = $row_CPCats['cat_id'];
        $cpcat_name = $row_CPCats['cat_name'];

        echo "
                <li>
                    <a href='parts.php?cat_id=$cpcat_id'>
                        $cpcat_name
                    </a>
                </li> 
            ";

    }
}

 
?>