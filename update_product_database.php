<?php

include 'auth/database.php';

$message = "";

if (isset($_POST['product_name']) && isset($_POST['price']) && isset($_POST['status']) && isset($_POST['product_id'])) {
	$output = "";
	$product_name = mysqli_real_escape_string($connect, $_POST['product_name']);
	$price = mysqli_real_escape_string($connect, $_POST['price']);
	$status = $_POST['status'];
	$product_id = $_POST['product_id'];

	$query = "UPDATE add_product SET name = '$product_name', price = '$price', status = '$status' WHERE id = '" . $product_id . "'";
	$message = "بەرهەمەکە بەسەرکەوتوویی نوێکرایەوە"; ?>

	<!DOCTYPE html>
	<html>

	<head>
		<title></title>
		<style type="text/css">
			.active-status {
				background-color: #28a745 !important;
				font-size: 14px;
				color: white;
				padding: 1.5px 5px;
				border-radius: 2px;
			}

			.inactive-status {
				background-color: #dc3545 !important;
				font-size: 14px;
				color: white;
				padding: 1.5px 5px;
				border-radius: 2px;
			}
		</style>
	</head>

	<body>

	<?php

	if (mysqli_query($connect, $query)) {

		$output .= "
		<div class='alert alert-success alert-dismissible fade show w-100' role='alert'>
			<strong>" . $message . "</strong>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
			  </button>
		</div>
	";
		$select_query = "SELECT * FROM add_product join subcat on add_product.subcat_id=subcat.id join category on subcat.cat_id=category.id ORDER BY add_product.id DESC";
		$result = mysqli_query($connect, $select_query);
		$output .= '
		<table class="table table-hover" id="product">
			<thead class="thead-dark">
				<tr>
					  <th scope="col">وێنە</th>
					  <th scope="col">ناوی بەرهەم</th>
					  <th scope="col">نرخ</th>
					  <th scope="col">پۆڵێن</th>
					  <th scope="col">چاڵاکی</th>
					  <th scope="col">کردار</th>
				</tr>
			  </thead>
	';


		while ($data = mysqli_fetch_array($result)) {
			if ($data[6] == 'yes') {
				$output .= "
				<tbody
					<tr>
						  <td>
							  <img src='file/" . $data['image'] . "' width='70px' height='70px' alt='img' class='img-fluid' style='border-radius: 50%;'>
						  </td>
						  <td>" . $data[2] . "</td>
						  <td>" . $data['price'] . "</td>
						  <td>" . $data['category_name'] . "</td>
						  <td><span class='active-status bg-success'>" . $data[6] . "</span></td>
						  <td>
							  <div class='row'>
								  <button type='submit' id='" . $data[0] . "' name='edit' class='btn btn-sm btn-primary ml-2 edit_data'>دەسکاری</button>
								  <a href='delete_product.php?id=" . $data[0] . "' class='btn btn-sm btn-danger'>ڕەشکردنەوە</a>
							  </div>
						  </td>
					</tr>
				</tbody>
			";
			} else {
				$output .= "
				<tbody
					<tr>
						  <td>
							  <img src='file/" . $data['image'] . "' width='70px' height='70px' alt='img' class='img-fluid' style='border-radius: 50%;'>
						  </td>
						  <td>" . $data[2] . "</td>
						  <td>" . $data['price'] . "</td>
						  <td>" . $data['category_name'] . "</td>
						  <td><span class='inactive-status bg-danger'>" . $data[6] . "</span></td>
						  <td>
							  <div class='row'>
								  <button type='submit' id='" . $data[2] . "' name='edit' class='btn btn-sm btn-primary ml-2 edit_data'>دەسکاری</button>
								  <a href='delete_product.php?id=" . $data[2] . "' class='btn btn-sm btn-danger'>ڕەشکردنەوە</a>
							  </div>
						  </td>
					</tr>
				</tbody>
			";
			}
		}

		$output .= "</table>";
	}
	echo $output;
}

	?>


	</body>

	</html>