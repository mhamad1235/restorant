<?php

include 'auth/database.php';

$message = "";

if (!empty($_POST)) {
	$output = "";
	$category_name = mysqli_real_escape_string($connect, $_POST['category_name']);
	$status = $_POST['status'];

	$query = "INSERT INTO category(category_name, status) VALUES('$category_name', '$status')";
	$message = "پۆڵێنەکە بەسەرکەوتوویی زیادکرا";

	if (mysqli_query($connect, $query)) {

		$output .= "
				<div class='alert alert-success alert-dismissible fade show w-100' role='alert'>
					<strong>" . $message . "</strong>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				    	<span aria-hidden='true'>&times;</span>
				  	</button>
				</div>
			";
		$select_query = "SELECT * FROM category ORDER BY id DESC";
		$result = mysqli_query($connect, $select_query);
		$output .= "
				<table class='table table-striped' id='category_table'>
					<thead class='thead-dark'>
				    	<tr>
				      		<th scope='col'>Id</th>
				      		<th scope='col'>Category Name</th>
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
					      		<td> " . $data['category_name'] . "</td>
					      		<td><span class='active-status'>" . $data['status'] . "</span></td>
					      		<td>
					      			<div class='row'>
					      				<button type='submit' name='edit' id='" . $data['id'] . "' class='btn btn-sm btn-primary mL-2 edit_data'>دەسکاری</button>
					      				<a href='delete_category.php?id=" . $data['id'] . "' name='cancel' class='btn btn-sm btn-danger delete_data'>Delete</a>
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
					      		<td> " . $data['category_name'] . "</td>
					      		<td><span class='inactive-status'>" . $data['status'] . "</span></td>
					      		<td>
					      			<div class='row'>
					      				<button type='submit' name='edit' id='" . $data['id'] . "' class='btn btn-sm btn-primary ml-2 edit_data'>دەسکاری</button>
					      				<a href='delete_category.php?id=" . $data['id'] . "' name='cancel' class='btn btn-sm btn-danger delete_data'>ڕەشکردنەوە</a>
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

</body>

</html>