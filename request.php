<?php
include('./includes/db.php');

$request_ref = $_GET["request_ref"];
$query = "SELECT * FROM  appointment WHERE request_ref = '$request_ref' ";
$display_query = mysqli_query($conn, $query);
$customer = mysqli_fetch_object($display_query);
echo json_encode($customer);





?>