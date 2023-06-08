<?php

include 'auth/database.php';

if (isset($_POST['subcategory_id'])) {
	$category_id = $_POST['subcategory_id'];
	$query = "SELECT * FROM subcat WHERE id='$category_id'";
	$result = mysqli_query($connect, $query);
	$data = mysqli_fetch_assoc($result);
	echo json_encode($data);
}
