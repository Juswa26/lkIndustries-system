<?php  

include("includes/db.php");


if (isset($_GET['cart_id'])) {
    $cart_id = $_GET['cart_id'];

    // Prepare the DELETE statement
    $stmt = $con->prepare("DELETE FROM cust_cart WHERE cart_id = ?");
    
    // Check if prepare was successful
    if (!$stmt) {
        die("Prepare failed: " . $con->error);
    }

    // Bind the cart_id parameter
    $stmt->bind_param("i", $cart_id);
    
    // Execute the delete
    if ($stmt->execute()) {
        echo "Item deleted successfully!";
        header("Location: cart.php");  // Redirect back to the cart page
    } else {
        echo "Error deleting item: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo "Invalid request!";
}

?>
