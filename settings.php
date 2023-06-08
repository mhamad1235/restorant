<?php

include 'auth/database.php';

session_start();

$message = "";
$email = $_SESSION['email'];

if (!isset($email)) {
	header('Location: login.php');
}

if (isset($_POST['update'])) {
	$oldPassword = $_POST['old_password'];
	$newPassword = $_POST['new_password'];
	$confirmPassword = $_POST['confirm_password'];

	$query = "SELECT * from users WHERE email = '$email'";
	$result = mysqli_query($connect, $query);
	$count = mysqli_num_rows($result);

	if ($count > 0) {
		while ($data = mysqli_fetch_assoc($result)) {
			if ($data['password'] == sha1(md5($oldPassword))) {
				if ($newPassword === $confirmPassword) {
					$hashedpassword = sha1(md5($newPassword));
					mysqli_query($connect, "UPDATE users SET password = '$hashedpassword' WHERE email = '$email'");
					$message = "Password Updated.";
					header("refresh:1;url=login.php");
				} else {
					$message = "Both password fields must be same.";
				}
			} else {
				$message = "Current password is incorrect.";
			}
		}
	}
}

?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Restaurant - settings</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/settings.css">
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

									<h2 class="d-inline ml-2"> ڕێکخستنەکانی بەکارهێنەر</h2>
									<a href="dashboard.php" class="d-inline text-dark mt-2 float-left" style="text-decoration: none; float: right; font-weight: 500;"> داشبۆڕد <i class="fas fa-tachometer-alt"></i></a>
								</div>
								<div class="row">
									<h5 class="ml-3 mb-2 text-danger"><?php echo $message; ?></h5>
									<form method="POST" action="" class="w-100 p-3 shadow-lg rounded">
										<div class="form-group">
											<label for="old-password" style="font-weight: 600;">وشەی نهێنی کۆن</label>
											<input type="password" name="old_password" class="form-control shadow-none" id="old-password" placeholder="وشەی نهێنی کۆن بنووسە">
										</div>
										<div class="form-group">
											<label for="new-password" style="font-weight: 600;">وشەی نهێنی نوێ</label>
											<input type="password" name="new_password" class="form-control shadow-none" id="new-password" placeholder="وشەی نهێنی بنووسە">
										</div>
										<div class="form-group">
											<label for="confirm-password" style="font-weight: 600;">دووبارەکردنەوەی وشەی نهێنی</label>
											<input type="password" name="confirm_password" class="form-control shadow-none" id="confirm-password" placeholder="وشەی نهێنیەکە دووبارە بکەوە">
										</div>
										<button type="submit" name="update" class="btn btn-primary">نوێکردنەوەی وشەی نهێنی</button>
										<button type="button" name="cancel" class="btn btn-danger" onclick="toDashboard()">پاشگەزبوونەوە</button>
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


		function toDashboard() {
			window.location.href = "dashboard.php";
		}
	</script>

</body>

</html>