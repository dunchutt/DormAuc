<?php
include "includes/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['place_bid'])) {
    // Get bid amount, product ID, and customer ID from the form
    $bid_amount = $_POST['bid_amount'];
    $product_id = $_POST['product_id'];
    $customer_id = 1; // Replace with the actual customer ID; this is just a placeholder

    // Retrieve customer ID from the database based on your application logic
    // Replace 'your_username_column' and 'your_users_table' with your actual column and table names
    #$username = $_SESSION["customer_name"]; // Assuming you store the username in the session
    #$customer_id = getCustomerIdByUsername($username, $conn);

    // Check if the bid amount is greater than the current product price
    $current_price = getCurrentProductPrice($product_id, $conn);
    $redirect_url = "http://localhost/dormauc/viewdetail.php?id=" . urlencode($product_id) . "&category=";
    if ($bid_amount > $current_price) {
        // Insert the bid into the bid table
        $insertBid = $conn->prepare("INSERT INTO bid (product_id, customer_id, bid_amount) VALUES (?, ?, ?)");

        if ($insertBid === false) {
            // Handle the case where the prepare fails
            die('Error during prepare: ' . $conn->error);
        }

        // Assuming product_id, customer_id, and bid_amount are integers
        $insertBid->bind_param("iii", $product_id, $customer_id, $bid_amount);

        // Execute the prepared statement
        $insertBidResult = $insertBid->execute();

        if ($insertBidResult) {
            // Bid was successful, update the product price in the products table
            updateProductPrice($product_id, $bid_amount, $conn);

            
           

            // Redirect to the dynamic URL
            header("Location: $redirect_url");
            exit();
        } else {
            // Handle the case where the bid insertion failed
            die('Error during execution: ' . $conn->error);
        }

        // Close the prepared statement
        $insertBid->close();
    } else {
        // Bid amount is not greater than the current product price
        echo "Bid amount must be greater than the current price.";
    }
} else {

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['place_bid'])) {
    $product_id = $_POST['product_id'];

    


    // Build the dynamic URL
    $redirect_url = "http://localhost/dormauc/viewdetail.php?id=" . urlencode($product_id) . "&category=";

    // Redirect to the dynamic URL
    header("Location: $redirect_url");
    exit();
    }
    
}
function getCurrentProductPrice($product_id, $conn) {
    // Implement logic to retrieve the current product price from the database
    // using the provided $product_id and $conn parameters.

    // Example: Retrieve the product price from the 'products' table
    $query = $conn->prepare("SELECT product_price FROM products WHERE product_id = ?");
    $query->bind_param("i", $product_id);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['product_price'];
    } else {
        // Handle the case where the product price is not found
        return 0;
    }
} 



function updateProductPrice($product_id, $new_price, $conn) {
    // Implement logic to update the product price in the database
    // using the provided $product_id, $new_price, and $conn parameters.

    // Example: Update the product price in the 'products' table
    
    $update = $conn->prepare("UPDATE products SET product_price = ? WHERE product_id = ?");
    $update->bind_param("ii", $new_price, $product_id);

    if ($update->execute()) {
        // The product price was successfully updated
        return true;
    } else {
        // Handle the case where the update fails
        return false;
    }
}
function getCustomerIdByUsername($username, $conn)
{
    $stmt = $conn->prepare("SELECT customer_id FROM customer WHERE customer_fname = $username");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($customer_id);
    $stmt->fetch();
    $stmt->close();
    
    return $customer_id;
}
?>