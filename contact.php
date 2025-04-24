<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $con = mysqli_connect("localhost","root","","voyagevista") or die("Error ");
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
        if($result = mysqli_query($con,$sql)){
            echo "Message sent successfully";
        }
        else{
            echo "Can't send Message";
        }

    }
?>
