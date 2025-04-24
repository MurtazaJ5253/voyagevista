<?php
// Establish a database connection
$con = new mysqli("localhost", "root", "", "voyagevista");

if (isset($_POST['selectedRegion']) && !empty($_POST['selectedRegion'])) {
    $selectedRegion = $_POST['selectedRegion'];

    // Use PHP to fetch states from your database based on the selected region
    $query = "SELECT * FROM states WHERE region = '$selectedRegion'";
    $result = $con->query($query);

    // Populate the state dropdown options
    echo "<option value=''>Select State</option>";
    while ($row = $result->fetch_assoc()) {
        echo "<option value='{$row['state']}'>{$row['state']}</option>";
    }
}

// Close the database connection
$con->close();
?>
