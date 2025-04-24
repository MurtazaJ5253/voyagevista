<?php

session_start();
include 'connection.inc.php';

if (isset($_SESSION['userlogin'])) {
    $userEmail = $_SESSION['userlogin'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userName = mysqli_real_escape_string($conn, $_POST['userName']);
        $userPhone = mysqli_real_escape_string($conn, $_POST['userPhone']);
        $newPassword = isset($_POST['userPassword']) ? mysqli_real_escape_string($conn, $_POST['userPassword']) : null;
        $confirmPassword = isset($_POST['confirmPassword']) ? mysqli_real_escape_string($conn, $_POST['confirmPassword']) : null;
        if (!empty($_FILES['pic']['name'])) {
            $targetDir = "/xampp/htdocs/VoyageVista/img/img/";
            $fileName = basename($_FILES['pic']['name']);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $allowedTypes = array('jpg', 'jpeg', 'png', 'webp');
            if (in_array($fileType, $allowedTypes)) {
                if (move_uploaded_file($_FILES['pic']['tmp_name'], $targetFilePath)) {
                    $updateImageQuery = "UPDATE user_cred SET profile = '$fileName' WHERE email = '$userEmail'";
                    mysqli_query($conn, $updateImageQuery);
                }
            }
        }
        if (!empty($newPassword) && !empty($confirmPassword) && ($newPassword == $confirmPassword)) {
            $updateQuery = "UPDATE user_cred SET name = '$userName', phonenum = '$userPhone', password = '$newPassword' WHERE email = '$userEmail'";
        } else {
            $updateQuery = "UPDATE user_cred SET name = '$userName', phonenum = '$userPhone' WHERE email = '$userEmail'";
        }

        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>';
            echo '<script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "success",
                        title: "Profile Updated",
                        text: "Your profile has been updated successfully.",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";
                        }
                    });
                });
            </script>';
        } else {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>';
            echo '<script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "error",
                        title: "Update Failed",
                        text: "Sorry, an error occurred. Please try again later.",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";
                        }
                    });
                });
            </script>';
        }
    }
}
?>
