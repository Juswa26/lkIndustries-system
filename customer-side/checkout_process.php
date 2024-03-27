<?php

include("includes/db.php");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$cust_id = $_POST['cust_id'];
    $transactionDate = date('Y-m-d H:i:s'); // Gets the current date and time
    $amount = $_POST['amount'];
    $deliveryMethod = $_POST['fulfillment'];
    $paymentMethod = $_POST['payment'];
    $status = "Order In Process"; // or whatever the default status is

    $transactionID = generateCPTransID(); // You'll need to define this function as mentioned before

    $stmt = $con->prepare("INSERT INTO user_transactions (cust_id, trans_code, trans_date, amount, deliv_method, pay_method, trans_status) VALUES (?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Prepare failed: " . $con->error);
    }

    $stmt->bind_param("ississs", $cust_id, $transactionID, $transactionDate, $amount, $deliveryMethod, $paymentMethod, $status);

    if ($stmt->execute()) {
        // If successful, clear the cart
        $stmt2 = $con->prepare("DELETE FROM cust_cart WHERE cust_id = ?");
        $stmt2->bind_param("i", $cust_id);
        $stmt2->execute();

        echo "Order confirmed!";
        header("Location: user-transactions.php");
    } else {
        echo "Error processing the transaction.";
    }

    $stmt->close();
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['book'])) {
    // Retrieve the posted data
    $custName = $_POST['c_name'];
    $custEmail = $_POST['c_email'];
    $custContact = $_POST['c_contact'];
    $carMake = $_POST['c_make'];
    $carModel = $_POST['c_model'];
    $carYear = $_POST['c_year'];
    $carVin = $_POST['c_vin'];
    $carOdo = $_POST['c_odo'];
    $carLicense = $_POST['c_plate'];
    $servName = $_POST['service'];
    $bookDesc = $_POST['c_desc'];
    $schedDate = $_POST['c_dnt'];
    $status = "For Initial inspection";
    $dateCreated = date('Y-m-d H:i:s'); // Current date and time

    // TODO: You need to fetch the custId based on the logged-in user.
    $custId = $_POST['cust_id'];

    $query = "INSERT INTO booking (btrans_code, cust_id, cust_name, cust_email, cust_contact, car_make, car_model, car_year, car_vin, car_odo, car_license, serv_name, book_desc, book_status, sched_date, date_created) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $con->prepare($query);
    if (!$stmt) {
        die("Prepare failed: " . $con->error);
    }

    $btransCode = generateBTransID();  // Assuming you have a function that generates unique transaction codes

    $stmt->bind_param("sisssssisissssss", $btransCode, $custId, $custName, $custEmail, $custContact, $carMake, $carModel, $carYear, $carVin, $carOdo, $carLicense, $servName, $bookDesc, $status, $schedDate, $dateCreated);

    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    }

    echo "Booking successfully created!";
    // Redirect to the user-transactions.php
    header("Location: user-transactions.php");
}

$con->close();

function generateBTransID() {
    // Prefix
    $prefix = "SB";

    // Last 5 digits of the current timestamp
    $timestampPart = substr(time(), -5);

    // Random 3-digit number
    $randomPart = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);

    // Combine all parts
    $transactionId = $prefix . $timestampPart . $randomPart;

    return $transactionId;

}


function generateCPTransID() {
    // Prefix
    $prefix = "CP";

    // Last 5 digits of the current timestamp
    $timestampPart = substr(time(), -5);

    // Random 3-digit number
    $randomPart = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);

    // Combine all parts
    $transactionId = $prefix . $timestampPart . $randomPart;

    return $transactionId;
}


?>