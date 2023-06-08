<?php
session_start();


if (!isset($_GET['id'])) {
	header("location: dashboard.php");
}
$var = $_GET['id'];
// echo $var;
include "auth/database.php";


$result = mysqli_query($connect, "SELECT * FROM add_product");
$number_of_results = mysqli_num_rows($result);

$result2 = mysqli_query($connect, "SELECT * FROM category");
$number_of_results2 = mysqli_num_rows($result2);
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<script src="https://kit.fontawesome.com/d455f30832.js" crossorigin="anonymous"></script>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">



	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<!-- this cdn used for notification icon -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
	<div class="wrapper">



		<?php if (isset($_SESSION['admin'])) {
			include("admin_navigation.php");
		} else if (isset($_SESSION['captain'])) {
			include("captain_navigation.php");
		} ?>


		<div class="content-wrapper">
			<div class="row text-right">
				<nav>
					<a href="#" id="toggle"><i class="fas fa-bars mr-3 fa-xl"></i></a>
				</nav>
			</div>

			<div class="container-fluid px-2">
				<div class="row m-0">


					<div class="p-2 bg2" style="height: 100vh;width: 320px;">
						<p class="ml-1 font-weight-bold cl text-right" style="font-size: 130%">بەڕێوەبردن</p>
						<div id="cart-box">
							<div id="cart-item" class="pl-2 my-2" style="height: calc(100vh - 300px);width: 100%;overflow-y:scroll ">
								<?php

								$queryyy = "select * from temporary_order join add_product on temporary_order.product_id=add_product.id where table_id=$var";
								$resultsss = mysqli_query($connect, $queryyy);
								$count = mysqli_num_rows($resultsss);
								while ($data = mysqli_fetch_array($resultsss)) {
								?>


									<div class="d-flex align-content-center align-items-center justify-content-between">
										<div class="d-flex text-center justify-content-between align-items-center align-content-center my-3 p-1 rounded ordered-product" style="width: 240px; height: 100px;background-color:#D8D2CB;border: 2px solid #94908B;">
											<div style="width: 90px;height:100%;">

												<img class='rounded mx-auto' style="width: 100%!important;height: 100% !important;" src=file/<?php echo $data['image']; ?>>
											</div>
											<div class="d-flex flex-column justify-content-between align-items-center mr-1 mt-3">
												<div>
													<p> <?php echo $data['name']; ?> </p>
												</div>
												<div class="d-flex mb-2">
													<div>
														<button class="px-2 text-white addition" style="background-color:#83BD75;border-radius:50%;cursor: pointer;" id="<?php echo $data["id"]; ?>" value='<?php echo $var; ?>' onclick="">+</button>
													</div>
													<div>
														<p class="col pt-2"> <?php echo $data['quantity']; ?></p>
													</div>
													<div>
														<button class="px-2 text-white subtraction" value='<?php echo $var; ?>' style="background-color:#B73E3E;border-radius:50%;cursor: pointer;" id="<?php echo $data["id"]; ?>" onclick="">-</button>
													</div>
												</div>
											</div>
											<div>
												<p class="col "> <?php echo $data['price'];   ?> IQD</p>
											</div>
										</div>
										<div id="<?php echo $data['id']; ?>" class="remove-btn"><i role="button" class="fa-sharp fa-solid fa-xmark shadow-lg  bg-danger text-light pointer rounded p-2 px-2"></i></div>
									</div>
								<?php
								}
								?>
							</div>
							<div style="width: 100%;height: 160px" dir="rtl">
								<div id="voucher-box" onclick="" class="float-left bg3 text-center cl" style="width: 20px;height: 20px;font-size: 85%">
									<i id="add-button" class="fa fa-plus" aria-hidden="true"></i>
									<i id="submit-button" class="fa fa-check" aria-hidden="true" style="display: none;"></i>
								</div>
								<p id="voucher-text" class="cl float-right mb-1">ئۆفەر</p>
								<input id="input-code" type="" name="" class="float-right" style="border:0;outline:none;display: none;">


								<div id="voucher-ok" class="float-right text-center cl" style="display: none;">
									<p id="text-number" class="mb-0 float-left" style="display: none;">0</p>
									<p id="icon-money" class="mb-0 float-left" style="display: none;"> IQD</p>
								</div>
								<div style="clear: both;"></div>
								<p class="cl float-right mb-1">داشکاندن</p>
								<p class="cl float-left mb-1">%</p>

								<div class="form-group">
									<input type="number" min="0" max="100" value="0" id="discount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
								</div>
								<p class="cl float-right mb-1" style="font-size: 130%">کۆی گشتی</p>


								<?php
								$total = 0;

								$sql = "select price,quantity from temporary_order join add_product on product_id=add_product.id where table_id=$var";
								$resul = mysqli_query($connect, $sql);
								while ($data = mysqli_fetch_array($resul)) {
									$quantity = (float) $data['quantity'];
									$price = (float) $data['price'];
									$total += $quantity * $price;
								}
								?>
								<p id="total-text" class="cl float-left mb-1"><span class="float-left"><?php echo $total; ?></span> <span class="float-right ml-2"> IQD</span> </p>
								<div style="clear: both;"></div>
								<div class="d-flex text-center justify-content-center align-items-center align-content-center mt-1">
									<div class="btn btn-outline-danger  rounded ml-2 notification" id="" onclick="play()" style="width: 100%;"> ئاگادارکردنەوە <i class="fa-solid fa-bell pr-2"></i></div>
									<audio id="audio" src="file/audio/sound.mp3"></audio>

									<div class="btn btn-primary text-white rounded" style="width: 100%;" onclick="checkout()"> حسابکردن <i class="px-2 fa-solid fa-money-bill"></i></div>


									</button> 
								</div>

							</div>
						</div>

					</div>



					<div class="p-0 bg1 " style="height: 100vh;width: calc(100% - 320px)">
						<div class="p-3">

							<div class="d-flex justify-content-between">

								<div class="form-group has-search w-25 p-0 m-0 float-right">
									<span class="fa fa-search form-control-feedback d-md-block d-none"></span>
									<input type="text" name="search" id="search" onkeyup="SearchField();" class="form-control d-md-block d-none" placeholder="گەڕان">

								</div>
								<div class="d-flex align-content-center align-items-center justify-content-between" style="width:220px;">
									<div style="padding-top:10px;" class=" ">
										<p style="width:100px;"> <span class="m-2 ">ژمارەی مێز:</span> <span class="text-danger"> <?php echo $var ?></span></p>
									</div>

									<button id="back-button" onclick="toPrepareOrder()" class="btn btn-outline-primary "><i class="fa-solid fa-right-to-bracket"></i> گەڕانەوە </button>

								</div>
							</div>

							<div class="row">
								<button class="btn btn-outline-primary col-sm-6 col-md-6 col-lg-1 col-xl-1" id="allProduct">گشتی</button>
								<?php
								while ($data = mysqli_fetch_array($result2)) {
									$result3 = mysqli_query($connect, "SELECT * FROM subcat where cat_id=$data[id]");
									if (mysqli_num_rows($result3) <= 0) {
										continue;
									}
								?><select class="custom-select my-1 mr-sm-2 col-sm-5 col-md-4 col-lg-3 col-xl-2 subcat" aria-label="Default select example" id="<?php echo $data['id']; ?>">
										<option selected disabled><?php echo $data['category_name'] ?></option><?php
																												while ($data2 = mysqli_fetch_array($result3)) {
																												?>

											<option value="<?php echo $data2['id']; ?>"><?php echo $data2['name']; ?></option>
									<?php
																												}
																												echo "</select>";
																											}
									?>
							</div>
							<div style="clear: both;"></div>
						</div>
						<div class="container pl-0 pl-md-5" style="height: calc(100vh - 190px);overflow-y:scroll">
							<div id="product-box" class="px-0 pl-md-5 h-100 pl-0 pl-md-2">


								<?php while ($data = mysqli_fetch_array($result)) {
								?>
									<div class="p-2 float-left " onclick="getProduct(<?php echo $data['id']; ?>,<?php echo $var; ?>)">
										<div class="bg2 text-center mx-auto mt-2 p-1 rounded d-flex justify-content-around align-content-center align-items-center product-item" style="width: 240px;height:100px;background-color:#D8D2CB;border: 2px solid #94908B;">
											<div class="" style="width: 90px!important;height: 100% !important;">
												<img src="file/<?php echo $data['image']; ?>" style="width: 100%;height:100%;" alt="img" class="rounded  mx-auto">
											</div>

											<div class="mt-3 ">
												<p class="cl mb-1  text-center" style="height: 45px;overflow-y: hidden;">
													<?php echo $data['name']; ?>
												</p>
												<p class="cl ">IQD <?php echo $data['price']; ?></p>
											</div>

										</div>
									</div>

								<?php

								}

								?>
							</div>

						</div>
					</div>
				</div>




			</div>
		</div>



	</div>
	</div>

	<script>
		$(document).on('click', '.remove-btn', function() {
			alert('hi')
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "delete_individual_order.php?product_id=" + $(this).attr('id') + "&table_id=<?php echo $var; ?>", false);
			xmlhttp.send(null);
			document.getElementById('cart-item').innerHTML = xmlhttp.responseText;
		});

		function SearchField() {
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "orders_search.php?search=" + document.getElementById('search').value + "&table_id=<?php echo $var; ?>", false);
			xmlhttp.send(null);

			document.getElementById('product-box').innerHTML = xmlhttp.responseText;
		}
			function play() {
			
        var audio = document.getElementById("audio");
        audio.play();
      }
		$(document).on('click', '.notification', function() {

			$.ajax({
				url: "notification.php",
				method: "GET",
				data: {
					table_id: <?php echo $var; ?>
				},
				cache: false,
				success: function($result) {
					alert($result);
					window.location.href = "prepare_order.php";
				}
			})
		})

		$(document).on('change', 'select', function() {
			var subcat_id = $(this).find(":selected").val();
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "orders_search_by_subcat.php?subcat_id=" + subcat_id + "&table_id=<?php echo $var; ?>", false);
			xmlhttp.send(null);

			document.getElementById('product-box').innerHTML = xmlhttp.responseText;
		});

		$(document).on('click', '#allProduct', function() {
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "orders_all_product.php?table_id=<?php echo $var; ?>", false);
			xmlhttp.send(null);

			document.getElementById('product-box').innerHTML = xmlhttp.responseText;
		})

		$(document).on('click', '.addition', function() {
			var table_id = $(this).val();
			var product_id = $(this).attr('id');

			$.when(
				$.ajax({
					url: "addition.php",
					method: "POST",
					data: {
						product_id: product_id,
						table_id: table_id
					},
					cache: false,
					success: function($result) {
						$("#cart-item").html($result);
					}
				})



			).then(function() {
				$.ajax({
					url: "total_amount.php",
					method: "POST",
					data: {
						table_id: table_id
					},
					cache: false,
					success: function($result) {
						$("#total-text").html($result);
					}
				})
			});
		});



		$(document).on('click', '.subtraction', function() {

			var table_id = $(this).val();
			var product_id = $(this).attr('id');
			$.when(
				$.ajax({
					url: "subtraction.php",
					method: "POST",
					data: {
						product_id: product_id,
						table_id: table_id
					},
					cache: false,
					success: function($result) {
						$("#cart-item").html($result);
					}
				})
			).then(function() {
				$.ajax({
					url: "total_amount.php",
					method: "POST",
					data: {
						table_id: table_id
					},
					cache: false,
					success: function($result) {
						$("#total-text").html($result);
					}
				})
			});
		});

		function getProduct(product_id, table_id) {

			$.when(
				$.ajax({
					url: "temporary_order.php",
					method: "POST",
					data: {
						product_id: product_id,
						table_id: table_id
					},
					cache: false,
					success: function($result) {
						$("#cart-item").html($result);
					}
				})

			).then(function() {

				$.ajax({
					url: "total_amount.php",
					method: "POST",
					data: {
						product_id: product_id,
						table_id: table_id
					},
					cache: false,
					success: function($result) {
						$("#total-text").html($result);
					}
				});
			});
		}


		function checkout() {
			window.location.href = "checkout.php?table_id=<?php echo $var ?>&discount=" + $("#discount").val();
		}

		function toPrepareOrder() {
			window.location.href = "prepare_order.php";
		}




		$('#toggle').click(function(e) {
			e.preventDefault();
			$('.wrapper').toggleClass('menuDisplayed');
		});



		$(".product-item,.ordered-product").hover(function() {
			$(this).css("scale", "1.1");

		}, function() {
			$(this).css("scale", "1");
		});

		$(".ordered-product").hover(function() {
			$(this).css("scale", "1.02");
		}, function() {
			$(this).css("scale", "1");
		});

		$(".product-item,.ordered-product").hover(function() {
			$(this).css("box-shadow", "0px 0px 5px 3px #B3AEA8");
			$(this).css("transition-duration", "650ms");
			$(this).css("cursor", "pointer");
		}, function() {
			$(this).css("box-shadow", "none");
			$(".product-item,.ordered-product").css("transition-duration", "none");
		});
	</script>
</body>

</html>