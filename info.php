<?php

include 'auth/database.php';
session_start();

$email = $_SESSION['email'];

$message = "";

if (!isset($email)) {
	header('Location: login.php');
}

$query = "SELECT * FROM info";
$result = mysqli_query($connect, $query);
$count = mysqli_num_rows($result);

if (isset($_POST['update'])) {
	$restaurant_name = mysqli_real_escape_string($connect, $_POST['restaurant_name']);
	$vat = $_POST['vat'];
	$address = mysqli_real_escape_string($connect, $_POST['address']);
	$country = mysqli_real_escape_string($connect, $_POST['country']);
	$description = mysqli_real_escape_string($connect, $_POST['description']);
	$currency = $_POST['currency'];

	if (!empty($restaurant_name) || !empty($vat) || !empty($address) || !empty($phone) || !empty($country) || !empty($description) || !empty($currency)) {
		if ($count == 0) {
			mysqli_query($connect, "INSERT INTO info(restaurant_name, vat, address, country, description, currency) VALUES('$restaurant_name', '$vat', '$address', '$country', '$description', '$currency')");
			$message = "Data Inserted";
		} else {
			mysqli_query($connect, "UPDATE info SET restaurant_name = '$restaurant_name', vat = '$vat', address = '$address', country = '$country', description = '$description', currency = '$currency' ");
			$message = "Data Updated";
		}
	} else {
		$message = "All fields are required";
	}
}

?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Restaurant - info</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/info.css">
</head>

<body>
	<div class="wrapper">

		<!-- Sidebar -->

		<?php include("admin_navigation.php"); ?>

		<!-- Content -->

		<div class="content-wrapper text-right">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<nav class="bar">
							<a href="#" id="toggle"><i class="fas fa-bars ml-3"></i></a>
						</nav>
						<div class="below-toggle-content">
							<div class="col-md-12">
								<div class="top-part mb-3">
									<h2 class="d-inline"> زانیاری ڕێستورانت</h2>

									<a href="dashboard.php" class="d-inline text-dark mt-2 float-left" style="text-decoration: none; float: right; font-weight: 500;"> داشبۆڕد <i class="fas fa-tachometer-alt"></i></a>
								</div>
							</div>
							<div class="row">
								<h5 class="mb-2 ml-4 text-danger"><?php echo $message; ?></h5>
								<form method="POST" class="rounded shadow-lg" action="">
									<div class="form-group">
										<label for="restaurant_name" style="font-weight: 600;">ناوی ڕێستوران</label>
										<input type="text" name="restaurant_name" class="form-control shadow-none" value="" id="restaurant_name" placeholder="ناوی ڕێستورانت بنووسە">
									</div>
									<div class="form-group">
										<label for="vat" style="font-weight: 600;">بڕی باجی خستنەسەر (٪)</label>
										<input type="text" name="vat" class="form-control shadow-none" value="" id="vat" placeholder="بڕی باج بنووسە">
									</div>
									<div class="form-group">
										<label for="address" style="font-weight: 600;">ناونیشان</label>
										<input type="text" name="address" class="form-control shadow-none" value="" id="address" placeholder="ناونیشان بنووسە">
									</div>
									<div class="form-group">
										<label for="country" style="font-weight: 600;">وڵات</label>
										<input type="text" name="country" class="form-control shadow-none" value="" id="country" placeholder="وڵاتەکەی بنووسە">
									</div>
									<div class="form-group shadow-textarea">
										<label for="description" style="font-weight: 600;">باسکردن</label>
										<textarea name="description" class="form-control z-depth-1 shadow-none" value="" id="description" rows="4" placeholder="باسکردنێکی لێرە بنووسە..."></textarea>
									</div>
									<div class="form-group">
										<label for="groups" style="font-weight: 600;">پاڵپشتی دراو</label>
										<select class="form-control shadow-none" name="currency" id="currency">

											<option value="IQD">دیناری ئێراقی</option>
											<option value="USD">دۆلار</option>
											<option value="INR">INR</option>
											<option value="POUND">پاوەند</option>
											<option value="YEN">یێن</option>
										</select>
									</div>
									<button type="submit" name="update" class="btn btn-primary shadow-none mt-3 mb-2">گۆڕانکاریەکان خەزن بکە</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$('#toggle').click(function(e) {
			e.preventDefault();
			$('.wrapper').toggleClass('menuDisplayed');
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$.ajax({
				url: "get_info.php",
				method: "POST",
				dataType: "json",
				success: function(data) {
					$('#restaurant_name').val(data.restaurant_name);
					$('#vat').val(data.vat);
					$('#address').val(data.address);
					$('#country').val(data.country);
					$('#description').val(data.description);
					$('#currency').val(data.currency);
				}
			});
		});
	</script>

</body>

</html>