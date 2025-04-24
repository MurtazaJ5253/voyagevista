<?php
// include 'connection.inc.php';
$conn = mysqli_connect('localhost','root','','voyagevista');
$country_id =   $_POST['country_data'];

$state = "SELECT * FROM states WHERE country_id = $country_id";

$state_qry = mysqli_query($conn, $state);

$output = '<option value="">Select State</option>';
while ($state_row = mysqli_fetch_assoc($state_qry)) {
    $output .= '<option value="' . $state_row['id'] . '">' . $state_row['name'] . '</option>';
}
echo $output;
