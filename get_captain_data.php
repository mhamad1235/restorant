<?php

include 'auth/database.php';

session_start();
$email = $_SESSION['email'];

$query = "SELECT * FROM add_user where email='$email'";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_assoc($result);
echo json_encode($data);

?>