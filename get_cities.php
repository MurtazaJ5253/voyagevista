<?php
// Establish a database connection
$con = new mysqli("localhost", "root", "", "voyagevista");

if (isset($_POST['selectedState']) && !empty($_POST['selectedState'])) {
    $selectedState = $_POST['selectedState'];

    // Use PHP to fetch cities from your database based on the selected state
    $query = "SELECT * FROM city WHERE state = '$selectedState'";
    $result = $con->query($query);

    // Populate the city dropdown options
    echo "<option value=''>Select City</option>";
    while ($row = $result->fetch_assoc()) {
        echo "<option value='{$row['city']}'>{$row['city']}</option>";
    }
}

// Close the database connection
$con->close();
?>
