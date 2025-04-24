<?php
session_start();

if (isset($_SESSION['userlogin'])) {
    include 'connection.inc.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $contact = mysqli_real_escape_string($conn, $_POST["testimonial"]);

        $insertQuery = "INSERT INTO testimonial (username, testimonial) VALUES ('$username', '$contact')";

        if (mysqli_query($conn, $insertQuery)) {
            echo "Testimonial added successfully";
        } else {
            echo "Error adding testimonial. Please try again.";
        }

        mysqli_close($conn);
    }
}
?>
