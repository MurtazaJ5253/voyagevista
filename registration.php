<?php
    $con = mysqli_connect("localhost", "root", "", "voyagevista");
    if (isset($_POST['submit'])) {
        $username = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $pno = trim($_POST["number"]);
        $pic = trim($_POST["pic"]);
        $password = trim($_POST["pass"]);

        if (!$con) {
            die('Connection Failed : ' . mysqli_connect_error());
        } else {
            $stmt = mysqli_prepare($con, "INSERT INTO user_cred (name, email, phonenum, profile, password) VALUES (?, ?, ?, ?, ?)");
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $pno, $pic, $password);
                if (mysqli_stmt_execute($stmt)) {
                    echo "Registration successfully";
                } else {
                    echo "Error: " . mysqli_error($con);
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "Error preparing statement: " . mysqli_error($con);
            }
            mysqli_close($con);
        }
    } else {
        echo "Password does not match";
    }
?>
