<?php
extract($_POST);
// Start a new session or resume the existing session
session_start();

// Extract variables from the POST array


// Establish a connection to the MySQL database
$conn = mysqli_connect("localhost", "root", "", "voyagevista");

// Check the database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sanitize user inputs to prevent SQL injection
$email = mysqli_real_escape_string($conn, $email);
$pass = mysqli_real_escape_string($conn, $pass);

// Query to check admin credentials
$query = "SELECT admin_name, admin_pass FROM admin_cred WHERE admin_name = '$email' AND admin_pass = '$pass'";
$result = mysqli_query($conn, $query);

// Get the referrer URL
$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

// Get the number of rows returned by the query
$numRows = mysqli_num_rows($result);

// Check if admin credentials are valid
if ($numRows > 0) {
    // Set session variable for admin login
    $_SESSION['Adminlogin'] = $email;
    $Email = "";
    $Password = "";
    // Redirect to the admin dashboard
    header("location: admin/dashboard.php");
} else {
    // Display an error message using SweetAlert2
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>';
    echo '<script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: "error",
                title: "Invalid Admin Credentials",
                text: "The entered admin credentials are invalid. Please try again.",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
            }).then(function(result) {
                if (result.isConfirmed) {
                    window.location.href = "' . $referrer . '";
                }
            });
        });
    </script>';
    
    // Redirect back to the referrer after 5 seconds
    if (!empty($referrer)) {
        header("refresh:5;url=$referrer");
    }
}

// Close the database connection
mysqli_close($conn);
?>
