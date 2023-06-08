<?php

include 'auth/database.php';

session_start();

$email = $_SESSION['email'];

if (!isset($email)) {
	header('Location: login.php');
}

?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Restaurant - profile</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/profile.css">
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
						<nav>
							<a href="#" id="toggle"><i class="fas fa-bars ml-3"></i></a>
						</nav>
						<div class="below-toggle-content">
							<div class="col-md-12">
								<div class="top-part mb-3">
									<a href="dashboard.php" class="d-inline text-dark mt-2" style="text-decoration: none; float: left; font-weight: 500;"> داشبۆڕد <i class="fas fa-tachometer-alt"></i></a>

									<h2 class="d-inline">پڕۆفایلی ئەدمین</h2>


								</div>
								<div class="row " id="user_info">
									<form method="POST" action="" class="w-100 p-3 shadow-lg rounded" id="update_form">
										<div class="form-group">
											<label for="userid" style="font-weight: 600;">#</label>
											<input type="text" name="userid" class="form-control shadow-none" id="userid" value="" disabled="true">
										</div>
										<div class="form-group">
											<label for="first_name" style="font-weight: 600;">ناوی یەکەم</label>
											<input type="text" name="first_name" class="form-control shadow-none" id="first_name" placeholder="ناوی یەکەم بنووسە" value="">
										</div>
										<div class="form-group">
											<label for="last_name" style="font-weight: 600;">ناوی دوایین</label>
											<input type="text" name="last_name" class="form-control shadow-none" id="last_name" placeholder="ناوی دووەم بنووسە" value="">
										</div>
										<div class="form-group">
											<label for="email" style="font-weight: 600;">ئیمەیڵ</label>
											<input type="email" name="email" class="form-control shadow-none" id="email" placeholder="ئیمەیڵەکە بنووسە" value="">
										</div>
										<button type="submit" name="update" class="btn btn-primary" id="update">نوێکردنەوەی وردەکارییەکان</button>
									</form>
								</div>
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
		/* Getting Data as json */

		$(document).ready(function() {
			$.ajax({
				url: "get_admin_data.php",
				method: "POST",
				dataType: "json",
				success: function(data) {
					$('#first_name').val(data.first_name);
					$('#last_name').val(data.last_name);
					$('#email').val(data.email);
					$('#userid').val(data.id);
				}
			});
		});

		/* Updating Data at backend */

		$('#update_form').on('submit', function(e) {
			var userid = $('#userid').val();
			var first_name = $('#first_name').val();
			var last_name = $('#last_name').val();
			var email = $('#email').val();
			e.preventDefault();
			if ($('#first_name').val() == "") {
				alert('ناوی یەکەم داواکراوە');
			} else if ($('#last_name').val() == "") {
				alert('ناوی دووەم داواکراوە');
			} else if ($('#email').val() == "") {
				alert('ئیمەیڵ داواکراوە');
			} else {
				$.ajax({
					url: "update_users_database.php",
					method: "POST",
					data: {
						first_name: first_name,
						last_name: last_name,
						email: email,
						userid: userid
					},
					success: function(data) {
						$('#user_info').html(data);
						setTimeout(function() {
							location.reload();
						}, 1500);
					}
				});
			}
		});
	</script>

</body>

</html>