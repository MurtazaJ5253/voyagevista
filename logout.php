<?php 



session_start();

if (isset($_SESSION['userlogin'])) {
    unset($_SESSION['userlogin']);
} elseif (isset($_SESSION['Adminlogin'])) {
    unset($_SESSION['Adminlogin']);
}

session_destroy();
$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

if (!empty($referrer)) {
    header("Location: $referrer");
} else {
    header("Location: Homepage.php");
}
exit();


?>
