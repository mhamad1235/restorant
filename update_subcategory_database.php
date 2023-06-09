<?php

include 'auth/database.php';

$message = "";

if (!empty($_POST)) {
	$output = "";
	$category_name_update = mysqli_real_escape_string($connect, $_POST['subcategory_name_update']);
	$status_update = $_POST['status_update'];
	$category_id = $_POST['subcategory_id'];

	$query = "UPDATE subcat SET name = '$category_name_update', status = '$status_update' WHERE id = '" . $category_id . "'";
	$message = "پۆڵێنی لاوەکی بەسەرکەوتوویی نوێکرایەوە";

	if (mysqli_query($connect, $query)) {

		$output .= "
				<div class='alert alert-success alert-dismissible fade show w-100' role='alert'>
					<strong>" . $message . "</strong>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				    	<span aria-hidden='true'>&times;</span>
				  	</button>
				</div>
			";
		$select_query = "SELECT * FROM subcat ORDER BY id DESC";
		$result = mysqli_query($connect, $select_query);
		$output .= "
				<table class='table table-striped' id='category_table'>
					<thead class='thead-dark'>
				    	<tr>
				      		<th scope='col'>Id</th>
				      		<th scope='col'>Subategory Name</th>
				      		<th scope='col'>Status</th>
				      		<th scope='col'>Action</th>
				    	</tr>
				  	</thead>
			";


		while ($data = mysqli_fetch_array($result)) {
			if ($data['status'] == 'active') {
				$output .= "
				    	<tbody
					    	<tr>
					      		<td> " . $data['id'] . "</td>
					      		<td> " . $data['name'] . "</td>
					      		<td><span class='active-status'>" . $data['status'] . "</span></td>
					      		<td>
					      			<div class='row'>
					      				<button type='submit' name='edit' id='" . $data['id'] . "' class='btn btn-sm btn-primary ml-2 edit_data'>دەسکاری</button>
					      				<a href='delete_subcategory.php?id=" . $data['id'] . "' name='cancel' class='btn btn-sm btn-danger delete_data'>ڕەشکردنەوە</a>
					      			</div>
					      		</td>
					    	</tr>
					    </tbody>
	    			";
			} else {
				$output .= "
				    	<tbody
					    	<tr>
					      		<td> " . $data['id'] . "</td>
					      		<td> " . $data['name'] . "</td>
					      		<td><span class='inactive-status'>" . $data['status'] . "</span></td>
					      		<td>
					      			<div class='row'>
					      				<button type='submit' name='edit' id='" . $data['id'] . "' class='btn btn-sm btn-primary ml-2 edit_data'>دەسکاری</button>
					      				<a href='delete_subcategory.php?id=" . $data['id'] . "' name='cancel' class='btn btn-sm btn-danger delete_data'>ڕەشکردنەوە</a>
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

<!DOCTYPE html>
<html>

<head>
	<title></title>
	<style type="text/css">
		.active-status,
		.available {
			background-color: #28a745 !important;
			font-size: 14px;
			color: white;
			padding: 1.5px 5px;
			border-radius: 2px;
		}

		.inactive-status,
		.unavailable {
			background-color: #dc3545 !important;
			font-size: 14px;
			color: white;
			padding: 1.5px 5px;
			border-radius: 2px;
		}

		.unavailable {
			background-color: #ffc107 !important;
		}
	</style>
</head>

<body>
</body>

</html>