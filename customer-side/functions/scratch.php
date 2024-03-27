



// if (isset($_POST['reg-btn'])) {
// 		$name = $_POST['username'];
// 		$email = $_POST['email'];
// 		$phone = $_POST['phone'];
// 		$pass = $_POST['password'];
// 		$cpass = $_POST['cpassword'];
// 		$time = (time() + (1000 * 10));

// 		$errors = validateFormData($name, $email, $phone, $pass, $cpass);

// 		if (empty($errors)) {


// 		}

// }
	//save
	// if(count($errors) == 0){

	// 	$arr['username'] = $data['username'];
	// 	$arr['email'] = $data['email'];
	// 	$arr['phone'] = $data['phone'];
	// 	$arr['password'] = hash('sha256',$data['password']);
	// 	$arr['date'] = date("Y-m-d H:i:s");

	// 	$query = "insert into cust_users (customer_name,customer_email,customer_pass,created_at) values 
	// 	(:username,:email,:phone,:password,:date)";

	// 	database_run($query,$arr);
	// }
	// return $errors;
// }



// $email_regex = '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,6}$/';
// $phone_number_regex = '/^\+63[0-9]{10,11}$/';

// 	if (isset($_POST['reg-btn'])) {
// 		$name = $_POST['username'];
// 		$email = $_POST['email'];
// 		$phone = $_POST['phone'];
// 		$pass = $_POST['password'];
// 		$cpass = $_POST['cpassword'];
// 		$time = (time() + (1000 * 10));

// 	    if (!preg_match($email_regex, $email)) {
// 	        $errors[] = 'The email address is not valid.';
// 	    }

// 	    if (!preg_match($phone_number_regex, $phone)) {
// 	        $errors[] = 'The phone number is not valid.';
// 	    }

// 	    if ($pass != $cpass) {
// 		    $errors[] = 'The passwords do not match.';
// 		}


// 		if (count($errors) > 0) {
// 			header("Location: ../index.php");
// 		    echo '<script> alert("There were errors with your submission:");';
// 		    foreach ($errors as $error) {
// 		        echo ' alert("' . $error . '");';
// 		    }
// 		    echo '</script>';
		   
// 		} else {
// 		    sendemail_verify("$name", "$email");
// 		    $otp_query = "INSERT INTO verify_otp (otp_code,expire,email) VALUES ('$otp', '$time', $email)";
// 		    $query_run = mysqli_query($con, $otp_query);
// 		    echo '<script> alert("OTP has been sent to your email"); </script>';
// 		    header("Location: ../otpVerify.php");
// 		}


// 	}



// function verify_otp($otp, $email) {
// 	if ($otp == $_POST['otp']) {
// 		return true;
// 	} else {
// 		return false;
// 	}
// }

// if (isset($_POST['reg-btn'])) {
// 	$name = $_POST['username'];
// 	$email = $_POST['email'];
// 	$phone = $_POST['phone']
// 	$pass = $_POST['password'];

// 	$check_email_query - "SELECT email FROM cust_users WHERE email='$email' LIMIT 1";
// 	$check_email_query_run = mysli_query($con, $check_email_query);

// 	if(mysqli_num_rows($check_email_query_run) > 0){
// 		$_SESSION['status'] = "Email ID already exists";
// 		header("Location: ../index.php");
// 	}else{
// 		sendemail_verify("$name", "$email", "$otp");

// 		if (verify_otp($_POST['otp'], $_POST['email'])) {
// 			// The OTP code is valid.
// 			// Proceed with the registration process.
// 		} else {
// 			// The OTP code is invalid.
// 			echo "The OTP code is invalid. Please try again.";
// 		}

// 		$query = "INSERT INTO cust_users (customer_name, customer_email, customer_pass, customer_otp ) VALUES ('$name', '$email', '$pass', $verify_token)";
// 		$query_run = mysqli_query($con, $query);

	

// }










	// 	if($query_run){
	// 		sendemail_verify("$name", "$email", "$verify_token");

	// 		echo '<script>alert("Registration Succesful")</script>';
	// 		header("Location: index.php");
	// 	}esle{
	// 		echo '<script>alert("Registration Succesful")</script>';
	// 		header("Location: index.php");
	// 	}
	// }
// }

