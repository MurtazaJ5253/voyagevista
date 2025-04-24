<?php
session_start();
?>
<?php
include 'connection.inc.php';

$country = "SELECT * FROM countries";
$county_qry = mysqli_query($conn, $country);
?>
<!-- links -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
<link rel="stylesheet" href="css/style.css">
<!-- end links -->

<!DOCTYPE html>
<html>

<head>
    <title>Plan Your Journey</title>
</head>

<body>
    <?php include 'inc/header.php' ?>

    <div class="d-flex justify-content-center align-items-center" style="height:77vh;">
        <div class="container my-5">
            <h1 class="text-center my-5">Select Place</h1>
            <center>
                <form action="explorePlace.php" method="POST">
                    <div class="card" style=" width:60%;">
                        <div class="card-body" style="background-color:#caf0f8;">
                            <div class="input-group mb-3">
                                <select class="form-select" id="country" name="country">
                                    <option selected disabled>Select Country</option>
                                    <?php while ($row = mysqli_fetch_assoc($county_qry)) : ?>
                                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <select class="form-select" id="state" name='state'>
                                    <option selected disabled>Select State</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <select class="form-select" id="city" name="city">
                                    <option selected disabled>Select City</option>
                                </select>
                            </div>
                            <button class="bt" type="submit" name="submit1" style="width:100%; background-color:#00b4d8;">Submit</button>
                        </div>
                    </div>
                </form>
            </center>
        </div>
    </div>

    <script>
        $('#country').on('change', function () {
            var country_id = this.value;
            $.ajax({
                url: 'ajax/state.php',
                type: "POST",
                data: {
                    country_data: country_id
                },
                success: function (result) {
                    $('#state').html(result);
                }
            })
        });

        $('#state').on('change', function () {
            var state_id = this.value;
            $.ajax({
                url: 'ajax/city.php',
                type: "POST",
                data: {
                    state_data: state_id
                },
                success: function (data) {
                    $('#city').html(data);
                }
            })
        });

        function viewDetailsClicked() {
            var isUserLoggedIn = <?php echo isset($_SESSION['userlogin']) ? 'true' : 'false'; ?>;
            if (!isUserLoggedIn) {
                Swal.fire({
                    icon: "info",
                    title: "Not Logged In",
                    text: "You need to be logged in to view details.",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                });
                return false; 
            }
            return true;
        }
    </script>

    <?php

    if (isset($_POST['submit1'])) {
        include 'connection.inc.php';

        $cid = $_POST['city'];

        $destination_query = "SELECT * FROM destination WHERE city_id = $cid";
        $result = mysqli_query($conn, $destination_query);

        if (!$result) {
            die('Query failed: ' . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            echo '<div class="row">';
            while ($city_row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="' . $city_row['desimg'] . '" class="card-img-top" alt="Destination Image" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">' . $city_row['name'] . '</h5>
                            <a href="destination.php?id=' . $city_row['des_id'] . '" class="btn btn-primary" onclick="return viewDetailsClicked()">View Details</a>
                        </div>
                    </div>
                  </div>';
            }
            echo '</div>';
        } else {
            echo '<script type="text/javascript">
      Swal.fire({
          icon: "info",
          title: "No Destinations Found",
          text: "No destinations found for this city.",
          confirmButtonColor: "#3085d6",
          confirmButtonText: "OK"
      });
    </script>';
        }
    }

    include 'inc/footer.php';
    ?>

</body>

</html>
