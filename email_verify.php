<?php
include 'connection.inc.php';

date_default_timezone_set("Asia/Kolkata");

if (isset($_POST['verify'])) {
    if (isset($_GET['code'])) {
        $activation_code = $_GET['code'];
        $otp = $_POST['otp'];

        $sqlSelect = "SELECT * FROM user_cred WHERE activation_code = '".$activation_code."'";
        $resultSelect = mysqli_query($conn, $sqlSelect);

        if ($resultSelect) {
            if (mysqli_num_rows($resultSelect) > 0) {
                $rowSelect = mysqli_fetch_assoc($resultSelect);

                $rowOtp = $rowSelect['otp'];
                $rowSignupTime = $rowSelect['signup_time'];

                $signupTime = date('d-m-Y H:i:s', strtotime($rowSignupTime));
                $signupTime = date_create($signupTime);
                date_modify($signupTime, "+1 minutes");
                $timeUp = date_format($signupTime, 'd-m-Y H:i:s');

                if ($rowOtp !== $otp) {
                    echo '<script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    icon: "error",
                    title: "Please provide correct OTP..!",
                });
            });
          </script>';
                } else {
                    if (date('d-m-Y H:i:s') >= $timeUp) {
                        echo '<script>
                document.addEventListener("DOMContentLoaded", function () {
                    Swal.fire({
                        icon: "error",
                        title: "Your time is up..try it again..!",
                    }).then(() => {
                        setTimeout(function(){ 
                            window.location.href = "Homepage.php";
                        }, 3000); // 3 seconds delay
                    });
                });
              </script>';
                       
                    }else{
						$sqlUpdate = "UPDATE user_cred SET otp = '$rowOtp', status_a = 'active' WHERE otp = '".$otp."' AND activation_code = '".$activation_code."'";
						$resultUpdate = mysqli_query($conn, $sqlUpdate);
						
						
                }
            } 
        } else {
            echo "Error: " . mysqli_error($conn);
			header("Location: Homepage.php");
			
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
    <title>PHP Signup with OTP Email Verification System</title>
    <link rel="stylesheet" type="text/css" href="css/styleotp.css">
</head>
<body>
    <div class="wrapper">
        <div class="otp">
            <h2>OTP Verify</h2>
            <hr>        
            <form action="" method="POST">
                <div class="form-group">
                    <label>OTP</label>
                    <input type="text" name="otp" placeholder="Enter OTP to verify email" autocomplete="off">
                </div>
                <div class="form-group">
                    <label></label>
                    <input type="submit" name="verify" value="Verify">
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php
        if (isset($resultUpdate) && $resultUpdate) {
            echo 'Swal.fire({
                    icon: "success",
                    title: "Your account successfully activated",
                }).then(() => {
                    window.location.href = "Homepage.php";
                });';
        } elseif (isset($resultUpdate)) {
            echo 'Swal.fire({
                    icon: "error",
                    title: "Opss..Your account not activated",
                    text: "' . mysqli_error($conn) . '"
                });';
        }
        ?>
    });
</script>







<script type="text/javascript" src="js/jquery.min.3-4-1.js"></script>
</html>
