<?php
session_start();
include "auth/database.php";

if (!isset($_SESSION['admin'])) {
	header("location:login.php");
}

$query = "select * from notification order by created_at";
$result = mysqli_query($connect, $query);
$count = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/d455f30832.js" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


	<title>Document</title>
</head>

<body>




	<div class="wrapper">

		<!-- Sidebar -->

		<?php include("admin_navigation.php"); ?>

		<!-- Content -->

		<div class="content-wrapper text-right">


			<nav class="text-right">
				<a href="#" id="toggle"><i class="fas fa-bars ml-3 fa-xl"></i></a>
			</nav>

			<div>
				<div class="container-fluid px-4 mt-3">
					<div class="d-flex justify-content-between align-content-center align-items-center">
					<div class="bg2" style="width: 320px;">
						<p class="ml-1 font-weight-bold cl text-right" style="font-size:2rem">ئاگادارییەکان</p>
					</div>

					<button id="back-button" onclick="toDashboard()" class="btn btn-outline-primary "><i class="fa-solid fa-right-to-bracket"></i> گەڕانەوە </button>
					</div>



				</div>
			</div>

			<div class="container m-5">
				<div class="notify-container row justify-content-between align-items-center align-content-center mt-5 p-3">


					<?php
					if ($count <= 0) {
					?>
						<div> هیچ ئاگادارکردنەوەیەک نیە</div>
					<?php } else {
					?>
						<?php
						while ($data = mysqli_fetch_array($result)) {
						?>
							<div class="notify-item text-center bg-light p-3 rounded mb-2 col-12" data-toggle="collapse" data-target="#collapse-item<?php echo $data['table_id'] ?>" aria-expanded="false" aria-controls="collapseExample" href="#collapse-item<?php echo $data['table_id'] ?>" onclick="notification(<?php echo $data['table_id'] ?>)">


								<?php

								if ($data['weight'] == 0) {

								?>

									<div class="d-flex justify-content-center align-items-center align-content-center">
										<button class="mb-0 btn btn-primary">داواکاری نوێ</button>
										<span class="notify-num mx-4 py-1 px-2" style="border-radius:50%;"> <?php echo $data['table_id'] ?></span>
									</div>

								<?php } else { ?>

									<div class="d-flex justify-content-center align-items-center align-content-center">
										<button class="mb-0 btn btn-primary">داواکاری زیادکراو</button>
										<span class="notify-num mx-4 py-1 px-2" style="border-radius:50%;"> <?php echo $data['table_id'] ?></span>
									</div>

								<?php
								} ?>
								<div class="collapse mt-3" id="collapse-item<?php echo $data['table_id'] ?>">
									<div class="card card-body mb-3 text-center lead">

										...

									</div>
								</div>
							</div> <?php
								}
							} ?>


				</div>
			</div>

			<!-- my code here  -->


		</div>
	</div>






	<script type="text/javascript">
		$('#toggle').click(function(e) {
			e.preventDefault();
			$('.wrapper').toggleClass('menuDisplayed');
		});



		function notification(id) {


			$.ajax({
				url: "notification_items.php",
				method: "POST",
				data: {
					table_id: id
				},
				success: function($resul) {
					$("#collapse-item" + id).html($resul);
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {

					alert("Status: " + textStatus);
					alert("Error: " + errorThrown);
				}

			})

		}

		function toDashboard() {
	window.location.href = "dashboard.php";
}



	</script>

</body>

</html>