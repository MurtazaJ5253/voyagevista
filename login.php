<?php
    extract($_POST);
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "voyagevista");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = mysqli_real_escape_string($conn, $email);
    $pass = mysqli_real_escape_string($conn, $pass);

    $qq = "SELECT admin_name, admin_pass FROM admin_cred WHERE admin_name = '$email' AND admin_pass = '$pass'";
    $rr = mysqli_query($conn, $qq);

    $nor = mysqli_num_rows($rr);

    if ($nor > 0) {
        $_SESSION['Adminlogin'] = $email;
        header("location: admin/dashboard.php");
    } else {
        $q1 = "SELECT email, password FROM user_cred WHERE email = '$email' AND password = '$pass'";
        $r1 = mysqli_query($conn, $q1);

        $noor = mysqli_num_rows($r1);
        $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

        if ($noor == 1) {
            $_SESSION['userlogin'] = $email;
            if (!empty($referrer)) {
                header("Location: $referrer");
            } else {
                header("Location: Homepage.php");
            }
        } else {
            echo "<script>alert('Invalid email and password')</script>";

            if (!empty($referrer)) {
                header("Location: $referrer");
            } else {
                header("Location: Homepage.php");
            }
        }
    }

    mysqli_close($conn);
?>
