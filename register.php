<?php

include 'auth/database.php';

$msg = "";

if (isset($_POST['signup'])) {

	$firstName       = $connect->real_escape_string($_POST['firstName']);
	$lastName        = $connect->real_escape_string($_POST['lastName']);
	$email           = $connect->real_escape_string($_POST['email']);
	$password        = $connect->real_escape_string($_POST['password']);
	$confirmPassword = $connect->real_escape_string($_POST['confirmPassword']);

	if ($password === $confirmPassword) {
		$hashedpassword = sha1(md5($password));
		$query = "INSERT INTO users(first_name, last_name, email, password) VALUES('$firstName', '$lastName', '$email', '$hashedpassword')";
		$success = mysqli_query($connect, $query);
		if ($success) {
			$msg = "بەسەرکەوتوویی تۆمارکرا، ئاڕاستە دەکرێیت بۆ پەڕی دواتر...";
			header("refresh:3;url=login.php");
		} else {
			$msg = "هەندێك کێشە هەیە، دووبارە هەوڵبدەرەوە";
		}
	} else {
		$msg = "هەردوو وشە نهێنیەکە پێویستە یەکسان بن";
	}
}

?>

<!DOCTYPE html>
<html dir="RTL" lang="ar">

<head>
	<meta charset="utf-8">
	<title>Restaurant - register</title>
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
			<a class="navbar-brand" href="#">The Bloom Cafe</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="#">ماڵەوە <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">لیستەی خواردن</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">گەلەری</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">پەیوەندی</a>
					</li>
				</ul>
				<form class="form-inline mr-auto">
					<a href="login.php" class="text-white" style="text-decoration: none;"><span class="fa fa-user"></span> چوونە ژوورەوە</a>
				</form>
			</div>
		</nav>
		<div class="col-md-8 mx-auto">
			<h2 class="text-center text-inverse mb-4 mt-4">دروستکردنی هەژمار</h2>
		</div>
		<div class="text-center text-success mb-4">
			<h5><?php echo $msg; ?></h5>
		</div>
		<div class="col-md-7 mx-auto">
			<form method="POST" action="" class="needs-validation text-right" novalidate>
				<div class="form-row">
					<div class="col-md-6 mb-3">
						<label for="validationCustom01">ناوی یەکەم</label>
						<input type="text" name="firstName" class="form-control" id="validationCustom01" placeholder="ناوی یەکەمت بنووسە" required>
						<div class="invalid-feedback">
							!تکایە ناوی یەکەمت بنووسە
						</div>
					</div>
					<div class="col-md-6 mb-3">
						<label for="validationCustom02">ناوی دووەم</label>
						<input type="text" name="lastName" class="form-control" id="validationCustom02" placeholder="ناوی دووەمت بنووسە" required>
						<div class="invalid-feedback">
							!تکایە ناوی دووەمت بنووسە
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12 mb-3">
						<label for="validationCustom03">ئیمەیڵ</label>
						<input type="email" name="email" class="form-control" id="validationCustom03" placeholder="ئیمەیڵ" required>
						<div class="invalid-feedback">
							تکایە ئیمەیڵێکی ڕاستەقینەت بنووسە
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="validationCustom04">وشەی نهێنی</label>
						<input type="password" name="password" class="form-control" id="validationCustom04" placeholder="وشەی نهێنی" required>
						<div class="invalid-feedback">
							تکایە وشەی نهێنی ڕاستەقینە داخڵ بکە
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="validationCustom05">دووپاتکردنەوەی وشەی نهێنی</label>
						<input type="password" name="confirmPassword" class="form-control" id="validationCustom05" placeholder="دووپاتکردنەوەی وشەی نهێنی" required>
						<div class="invalid-feedback">
							تکایە هەمان وشەی نهێنی بنووسەوە
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-check">

						<label class="form-check-label" for="invalidCheck">
							ڕازیبوون بەمەرجەکان
						</label> &nbsp;<input class="form-check-input" name="checkbox" type="checkbox" value="" id="invalidCheck" required>
						<div class="invalid-feedback">
							پێویستە ڕازی ببیت پێش دووپاتکردن
						</div>
					</div>
				</div>
				<div class="text-center">
					<button class="btn btn-primary w-50 p-2" name="signup" type="submit"><i class="fa-solid fa-right-to-bracket ml-2"></i>دروستکردنی هەژمار</button>
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