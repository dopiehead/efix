<?php
// Assuming you have a database connection established
require 'configure.php'; // Adjust as per your database connection method

// Retrieve and sanitize input
$status = isset($_POST['status']) ? intval($_POST['status']) : 0; // Ensure $status is integer (1 or 0)

// Update database query
$sql = "UPDATE vendor_profile SET status = $status"; // Adjust table and condition as per your schema

if (mysqli_query($conn, $sql)) {
    echo "Status updated successfully";
} else {
    echo "Error updating status: " . mysqli_error($conn);
}

mysqli_close($conn); // Close database connection
?>