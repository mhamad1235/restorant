<?php

include "auth/database.php";


$table_id = $_POST['table_id'];
$total = 0;

$sql = "select price,quantity from temporary_order join add_product on product_id=add_product.id where table_id=$table_id";
$resul = mysqli_query($connect, $sql);
while ($data = mysqli_fetch_array($resul)) {
	$quantity = (float) $data['quantity'];
	$price = (float) $data['price'];
	$total += $quantity * $price;
}
echo $total, " IQD";
