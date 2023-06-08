<?php

include 'auth/database.php';

session_start();

$email = $_SESSION['email'];

if (!isset($email)) {
	header('Location: login.php');
}


?>

<?php
$result1 = mysqli_query($connect, "SELECT * FROM book_table");
$number_of_results = mysqli_num_rows($result1);
?>


<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/d455f30832.js" crossorigin="anonymous"></script>


	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


	<link rel="preconnect" href="https://fonts.gstatic.com">


	<link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
	<title>Document</title>
	<style>
		* {
			padding: 0;
			margin: 0;
		}
	</style>
</head>

<body>

	<div class="container mt-5">
		<button id="back-button" onclick="toDashboard()" class="btn btn-outline-primary "><i class="fa-solid fa-right-to-bracket"></i> گەڕانەوە </button>
		<div class="top-part mb-3">
			<a href="dashboard.php" class="d-inline text-dark mt-2 " style="text-decoration: none; float: left; font-weight: 500;"> داشبۆڕد <i class="fas fa-tachometer-alt"></i></a>
			<h2 class="d-inline">بەڕێوەبردنی داواکارییەکان</h2>

		</div>

		<div class="p-0 bg1 my-5">
			<?php
			$counter = 0;
			while ($data = mysqli_fetch_array($result1)) {

				if ($counter == 0) {
			?>

					<div id="table-box " class="px-5 row">
					<?php
				}
				$counter++; ?>
					<div class="float-start rounded m-2 col single-table" id="<?php echo $data['id']; ?>" onclick="directpage('<?php echo $data['id']; ?>')">
						<div class="table-box bg2 text-center rounded border p-1" style="background-color: rgba(0, 0, 0, 0.1);">
							<div class=" col-sm-1 col-3 float-start text-left">
								<p class="cl mb-1 fs-2 table_No" style="font-size: 200%;"><?php echo $data['id']; ?></p>

								<i class="fa fa-circle mr-2 dot-success float-right text-<?php

																							$table_indicator = mysqli_query($connect, "SELECT * FROM temporary_order where table_id=$data[id]");
																							$number_of_results = mysqli_num_rows($table_indicator);

																							if ($number_of_results > 0) {
																								echo "danger";
																							} else {
																								echo "success";
																							}
																							?>" id="table-indicator" aria-hidden="true" style="font-size: 75%;margin-top: -4px"></i>

							</div>
							<div class="float-right col text-center">
								<img src="file/res_table_image/dinner (3).png" class="mx-auto text-center img-fluid" style="width: 100px;" alt="">
							</div>
						</div>
					</div>

					<?php
					if ($counter == 3) {
					?>

					</div>
			<?php $counter = 0;
					}
				}

			?>


		</div>
	</div>


	<script src="jquery/jquery.min.js"></script>
	<script>
		function directpage(id) {
			window.location.href = "orders.php?id=" + id;
		}
		$(document).ready(function() {


			$(".table-box").hover(function() {
				$(this).css("scale", "1.1");
				$(this).css("box-shadow", "0px 0px 10px 5px rgba(0,0,0,0.3)");
				$(this).css("transition-duration", "700ms");
				$(this).css("cursor", "pointer");
			}, function() {
				$(this).css("scale", "1");
				$(this).css("box-shadow", "none");
				$(".table-box").css("transition-duration", "none");
			});

		})

		function toDashboard() {
			window.location.href = "dashboard.php";
		}

		$("#table");
	</script>

</body>

</html>