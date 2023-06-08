<?php

include 'auth/database.php';

session_start();
$msg = "";


if (isset($_SESSION['admin'])) {
	header('Location: dashboard.php');
}
if (isset($_SESSION['captain'])) {
	header('Location: captain_dashboard.php');
}

if (isset($_POST['type']) && $_POST['type'] == 'admin') {
	if (isset($_POST['login'])) {

		$email           = $connect->real_escape_string($_POST['email']);
		$password        = $connect->real_escape_string($_POST['password']);

		$query = mysqli_query($connect, "SELECT * FROM users WHERE email = '$email'");
		if ($query->num_rows > 0) {
			$data = $query->fetch_array();
			if (sha1(md5($_POST['password'])) == $data['password']) {
				if (!empty($_POST['remember'])) {
					setcookie('email', $email, time() + (365 * 24 * 60 * 60));
					setcookie('password', $password, time() + (365 * 24 * 60 * 60));
				} else {
					if (isset($_COOKIE['email']) or isset($_COOKIE['password'])) {
						setcookie('email', '');
						setcookie('password', '');
					}
				}
				session_start();
				$_SESSION['email'] = $email;
				$_SESSION['admin'] = "admin";
				header('Location: dashboard.php');
				exit();
			}
		}
	}
}

if (isset($_POST['type']) && $_POST['type'] == 'captain') {
	if (isset($_POST['login'])) {
		$email = $connect->real_escape_string($_POST['email']);
		$password = $connect->real_escape_string($_POST['password']);

		$query = mysqli_query($connect, "SELECT * FROM add_user WHERE email = '$email'");
		if ($query->num_rows > 0) {

			$data = $query->fetch_array();
			if (sha1(md5($_POST['password'])) == $data['passwordd']) {
				echo "twana";
				if (!empty($_POST['remember'])) {
					setcookie('email', $email, time() + (365 * 24 * 60 * 60));
					setcookie('password', $password, time() + (365 * 24 * 60 * 60));
				} else {
					if (isset($_COOKIE['email']) or isset($_COOKIE['password'])) {
						setcookie('email', '');
						setcookie('password', '');
					}
				}
				session_start();
				$_SESSION['email'] = $email;
				$_SESSION['captain'] = "captain";
				header('Location: captain_dashboard.php');
				exit();
			}
		}
	}
}



?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
	<meta charset="utf-8">
	<title>Restaurant - login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> -->
	<script src="https://kit.fontawesome.com/d455f30832.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<style>
		* {
			font-family: 'Rabar_013';
			font-size: 1rem;
		}
	</style>

</head>

<body>
	<div class="container-fluid p-0">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 8px 50px;">
			<div class="d-flex align-content-center align-items-center">
				<div style="width:60px;height:60px;">
					<img src="img/logo.jpeg" class="img-fluid rounded" style="box-shadow:0px 0px 10px 1px whitesmoke;" alt="">
				</div>
				<a class="navbar-brand ml-5" href="#">The <span style="color:#D5AC81;font-size:1.8rem;">Bloom</span> Restaurant</a>

			</div>

		</nav>
		<div class="col-md-8 mx-auto mt-5">
			<h2 class="text-center text-inverse mb-4 ">چوونە ژوورەوە</h2>
		</div>
		<div class="text-center text-success mb-4">
			<h5><?php echo $msg; ?></h5>
		</div>
		<div class="col-md-6 mx-auto">
			<form method="POST" action="" class="needs-validation text-right" novalidate>
				<div class="form-row">
					<div class="col-md-12 mb-3">
						<label for="validationCustom03">ئیمەیڵ</label>
						<input type="email" name="email" class="form-control" id="validationCustom03" placeholder="Email" required>
						<div class="invalid-feedback">
							تکایە ئیمەیڵێکی ڕاستەقینە بنووسە
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="validationCustom04">وشەی نهێنی</label>
						<input type="password" name="password" class="form-control" id="validationCustom04" placeholder="وشەی نهێنی" required>
						<div class="invalid-feedback">
							تکایە وشەی نهێنی تەواو بنووسە
						</div>
					</div>
				</div>
				<div class="row ">
					<div class="container mx-auto text-center my-3 ">
						<div class="col my-2 text-primary">
							جۆری بەکارهێنەر:
						</div>
						<div class="col">
							<div class="form-check form-check-inline"> <label class="form-check-label" for="inlineRadio1">ئەدمین</label>
								<input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="admin">

							</div>
							<div class="form-check form-check-inline"> <label class="form-check-label" for="inlineRadio2">کاپتن</label>
								<input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="captain">
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<input class="form-input" name="remember" type="checkbox"> منت بیربێت
				</div>
				<div class="text-center">
					<button class="btn btn-primary w-50 p-2" name="login" type="submit"><i class="fa-solid fa-right-to-bracket ml-1"></i>چوونە ژوورەوە </button>
				</div>
			</form>
		</div>
	</div>

	<script>
		(function() {
			'use strict';
			window.addEventListener('load', function() {

				var forms = document.getElementsByClassName('needs-validation');
				var validation = Array.prototype.filter.call(forms, function(form) {
					form.addEventListener('submit', function(event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add('was-validated');
					}, false);
				});
			}, false);
		})();
	</script>

</body>

</html>