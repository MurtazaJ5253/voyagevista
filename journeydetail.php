<?php
session_start();
include 'connection.inc.php';
if (isset($_SESSION['userlogin'])) {

    if (isset($_POST['planjourney'])) {
        $name = $_POST["name"];
        $mobile = $_POST["mobile"];
        $email = $_POST["email"];
        $startDate = $_POST["start_date"];
        $endDate = $_POST["end_date"];
        $travelers = $_POST["travelers"];

    }


        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $destination_id = $_GET['id'];
            $destination_query = "SELECT * FROM destination WHERE des_id = $destination_id";
            $destination_result = mysqli_query($conn, $destination_query);

            if ($destination_result && mysqli_num_rows($destination_result) > 0) {
                $destination_data = mysqli_fetch_assoc($destination_result);
                $destination_name = $destination_data['name'];
                $destination_address = $destination_data['address'];
            } else {
                $destination_name = "Unknown Destination";
                $destination_address = "Unknown Address";
            }
            if (isset($_POST['planjourney'])) {
                $sql = "INSERT INTO journeydetail (name, mobilenum, email, destination, destination_address, start_date, end_date, travelers)
                VALUES ('$name', '$mobile', '$email', '$destination_name', '$destination_address', '$startDate', '$endDate', '$travelers')";

                if (mysqli_query($conn, $sql)) {
                    echo "Journey details saved successfully!";
                } else {
                    echo "Error saving journey details: " . mysqli_error($conn);
                }
            }
        }


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Your Journey</title>
    <!-- links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- end links -->
    <style>
        .form1 {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            margin-bottom: 10px;
        }

        .btn-primary {
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            color: #fff;
            padding: 10px 20px;
        }
    </style>
</head>

<body>

    <?php include 'inc/header.php'; ?>

    <div class="container form1">
        <h1>Enter Your Details</h1>
        <form method="POST" action="journeydetail.php">
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Mobile Number:</label>
                <input type="tel" name="mobile" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Selected Destination:</label>
                <input type="text" name="destination" class="form-control"
                    value="<?php echo $destination_name; ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Start Date:</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">End Date:</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Number of Travelers:</label>
                <input type="number" name="travelers" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary" name="planjourney">Plan Journey</button>
        </form>
    </div>



    <!-- hotel section -->
    <!-- <div class="container mt-4">
        <h2 class="text-center mb-4">Accommodation Options</h2>
        <div class="row">
            <?php
            $hotel_query = "SELECT * FROM hotel WHERE destination_id = $destination_id";
            $hotel_result = mysqli_query($conn, $hotel_query);
            if ($hotel_result && mysqli_num_rows($hotel_result) > 0) {
                while ($hotel_data = mysqli_fetch_assoc($hotel_result)) {
                    echo '<div class="col-md-6 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="' . $hotel_data['image_url'] . '" class="card-img-top" alt="Hotel Image">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $hotel_data['name'] . '</h5>';
                    echo '<p class="card-text">' . $hotel_data['description'] . '</p>';
                    echo '<a href="#" class="btn btn-primary">Book Now</a>';
                    echo '</div></div></div>';
                }
            } else {
                echo '<p class="text-center">No accommodation options available for this destination.</p>';
            }
            ?>
        </div>
    </div> -->


    <!-- Restaurant -->
    <!-- <div class="container mt-4">
        <h2 class="text-center mb-4">Restaurant Options</h2>
        <div class="row">
            <?php
            $restaurant_query = "SELECT * FROM restaurant WHERE destination_id = $destination_id";
            $restaurant_result = mysqli_query($conn, $restaurant_query);
            if ($restaurant_result && mysqli_num_rows($restaurant_result) > 0) {
                while ($restaurant_data = mysqli_fetch_assoc($restaurant_result)) {
                    echo '<div class="col-md-6 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="' . $restaurant_data['image_url'] . '" class="card-img-top" alt="Restaurant Image">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $restaurant_data['name'] . '</h5>';
                    echo '<p class="card-text">' . $restaurant_data['description'] . '</p>';
                    echo '<a href="#" class="btn btn-primary">Visit Now</a>';
                    echo '</div></div></div>';
                }
            } else {
                echo '<p class="text-center">No restaurant options available for this destination.</p>';
            }
            ?>
        </div>
    </div> -->



    <?php include 'inc/footer.php'; ?>
</body>

</html>
