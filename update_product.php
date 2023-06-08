<?php

include 'auth/database.php';

if (isset($_POST['product_id'])) {
	$product_id = $_POST['product_id'];

	$query = "SELECT add_product.name,price,category_name,add_product.status,add_product.id FROM add_product join subcat on add_product.subcat_id=subcat.id join category on subcat.cat_id=category.id WHERE add_product.id = '$product_id'";
	$result = mysqli_query($connect, $query);
	$data = mysqli_fetch_assoc($result);
	echo json_encode($data);
}
