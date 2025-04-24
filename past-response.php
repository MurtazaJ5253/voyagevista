<?php
require('inc/esseentials.php');

include 'connection.inc.php';


$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);
$contacts = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $contacts[] = $row;
    }
}
?>


