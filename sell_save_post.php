<?php
include "includes/config.php";

// Initialize error variable
$error = false;

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Check if an image file was uploaded
    if (isset($_FILES['prod-img'])) {
        $file_name = $_FILES['prod-img']['name'];
        $file_size = $_FILES['prod-img']['size'];
        $file_tmp = $_FILES['prod-img']['tmp_name'];
        $file_type = $_FILES['prod-img']['type'];
        $tmp = explode('.', $file_name);
        $file_ext = strtolower(end($tmp));
        $allowed_extensions = array("jpeg", "jpg", "png");

        // Check if the file extension is allowed
        if (!in_array($file_ext, $allowed_extensions)) {
            echo "This extension isn't allowed, please choose a jpg, jpeg, or png file.";
            $error = true;
        } elseif ($file_size >= 2097152) { // Check file size (2MB limit)
            echo "File size must be less than 2MB.";
            $error = true;
        } else {
            // If everything is okay, move the file to the upload directory
            move_uploaded_file($file_tmp, "admin/upload/" . $file_name);
        }
    } else {
        echo "No image file uploaded.";
        $error = true;
    }
}

// If there are no errors, proceed to save data to the database
if (!$error) {
    session_start();
    $today_date = date("j,n,Y");
    $author = $_SESSION['customer_name'];

    // Prepare and execute the SQL query
    $sql = "INSERT INTO products 
            (product_catag, product_title, product_price, product_desc, product_date, product_img, product_left, product_author,deadline)
            VALUES (
                '{$_POST['prod-category']}',
                '{$_POST['prod-title']}',
                '{$_POST['prod-price']}',
                '{$_POST['prod-desc']}',
                '{$today_date}',
                '{$file_name}',
                '{$_POST['noofitem']}',
                '{$author}',
                '{$_POST['prod-deadline']}'
            )";

    if ($conn->query($sql) === true) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
    
    // Redirect to a success page or wherever you want after successful insertion
    header("Location: sell.php?success");
    exit();
}
?>
