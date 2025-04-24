<?php
session_start();
include 'connection.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
    <!-- Custom CSS -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #caf0f8;
        }

        table, th, td {
            border: 1px solid black;
            font-weight: bold;
            font-size: 16px;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #caf0f8;
            font-size: 20px;
        }
    </style>
</head>
<body>

<?php
include 'inc/header.php';

if (isset($_SESSION['userlogin'])) {
    // Assuming you have an 'email' session variable set
    $userlogin = $_SESSION['userlogin'];

    $sql = "SELECT * FROM journeydetail where email = '$userlogin'";
    $result = $conn->query($sql);
    $journeydetails = array();

    // Check if there are journey details in the result
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $journeydetails[] = $row;
        }
    }

    echo "<br><center><h1>Your Plan History</h1></center><br>";
    echo "<table class='table table-bordered'>
            <tr>
                <th>Name</th>
                <th>Mobile Number</th>
                <th>Destination</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Number of Travelers</th>
                <th>Hotel Name</th>
                <th>Room Type</th>
                <th>Room Number</th>
            </tr>";

    foreach ($journeydetails as $journeydetail) {
        echo "<tr>
                <td>{$journeydetail['name']}</td>
                <td>{$journeydetail['mobilenum']}</td>
                <td>{$journeydetail['destination']}</td>
                <td>{$journeydetail['start_date']}</td>
                <td>{$journeydetail['end_date']}</td>
                <td>{$journeydetail['travelers']}</td>
                <td>{$journeydetail['hotel_name']}</td>
                <td>{$journeydetail['room_type']}</td>
                <td>{$journeydetail['room_number']}</td>
              </tr>";
    }

    echo "</table>";
}
?>

</body>
</html>
