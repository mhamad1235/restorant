<?php

include 'auth/database.php';
session_start();

$email = $_SESSION['email'];

if (!isset($email)) {
	header('Location: login.php');
}

$results_per_page = 5;

$result1 = mysqli_query($connect, "SELECT * FROM add_product");
$number_of_results = mysqli_num_rows($result1);

$number_of_pages = ceil($number_of_results / $results_per_page);

if (!isset($_GET['page']))
	$page = 1;
else
	$page = $_GET['page'];


$page_next = $page + 1;
$page_previous = $page - 1;

$this_page_first_result = ($page > 1) ? ($page - 1) * $results_per_page : 0;

$result = mysqli_query($connect, "SELECT * FROM add_product ORDER BY id DESC LIMIT $this_page_first_result, $results_per_page");
$count = mysqli_num_rows($result);

if ($page > $number_of_pages) {
	header('Location: manage_product.php?page=' . $number_of_pages);
}

?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Restaurant - manage-product</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/manage_products.css">


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</head>

<body>
	<div class="wrapper">



		<?php include("admin_navigation.php"); ?>




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
									<p class="d-inline ml-2"></p>
									<h2 class="d-inline"> بەڕێوەبردنی بەرهەمەکان</h2>

									<a href="dashboard.php" class="d-inline text-dark mt-2 float-left" style="text-decoration: none; float: right; font-weight: 500;"> داشبۆڕد <i class="fas fa-tachometer-alt"></i></a>
								</div>
								<div class="row">



									<div class="col-md-4">
										<a href="add_product.php" class="btn btn-primary mt-2 add_product">زیادکردنی بەرهەم</a>
									</div>



									<div class="col-md-4 mt-2 mb-4 ml-auto">
										<div class="input-group">
											<input type="text" name="search" id="search" onkeyup="SearchField();" class="form-control shadow-none" placeholder="گەڕان بەدوای بەرهەمەکان">
											<span class="input-group-btn">
												<button class="btn btn-primary shadow-none" id="search-button">گەڕان</button>
											</span>
										</div>
									</div>

								</div>

								<div class="row">


									<table class="table table-hover table-striped ml-3 mr-3 rounded" id="product">
										<thead class="thead-dark">
											<tr>
												<th scope="col">وێنە</th>
												<th scope="col">ناوی بەرهەم</th>
												<th scope="col">نرخ</th>
												<th scope="col">پۆڵێن</th>
												<th scope="col">چالاکە</th>
												<th scope="col">کردار</th>
											</tr>
										</thead>
										<tbody id="display">
											<?php
											if ($count > 0) {
												while ($data = mysqli_fetch_array($result)) {
											?>
													<tr>
														<td>
															<img src="file/<?php echo $data['image']; ?>" width="100px" height="80px" alt="img" style="border-radius: 25%;">
														</td>
														<td><?php echo $data['name']; ?></td>
														<td><?php echo $data['price']; ?></td>
														<td><?php
															$queryyy = "select category.category_name from add_product 
															join subcat on subcat_id=subcat.id 
															join category on subcat.cat_id=category.id
															where add_product.id=$data[id]";
															$results = mysqli_query($connect, $queryyy);

															while ($category_name = mysqli_fetch_array($results)) {
																echo $category_name['category_name'];
															}
															?></td>
														<?php
														if ($data['status'] == 'yes') {
														?>
															<td><span class="active-status bg-success"><?php echo $data['status']; ?></span></td>
															<td>
																<div class="row">
																	<button type="submit" id="<?php echo $data['id']; ?>" name="edit" class="btn btn-sm btn-primary ml-2 edit_data">دەسکاری</button>
																	<a href="delete_product.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger">ڕەشکردنەوە</a>
																</div>
															</td>
														<?php
														} else {
														?>
															<td><span class="inactive-status bg-danger"><?php echo $data['status']; ?></span></td>
															<td>
																<div class="row">
																	<button type="submit" id="<?php echo $data['id']; ?>" name="edit" class="btn btn-sm btn-primary ml-2 edit_data">دەسکاری</button>
																	<a href="delete_product.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger">ڕەشکردنەوە</a>
																</div>
															</td>
												<?php
														}
													}
												}
												?>
													</tr>
										</tbody>
									</table>

								</div>

								<div class="row">


									<nav aria-label="Page navigation example" style="background-color: transparent;">
										<ul class="pagination justify-content-start">

											<?php if ($page > 1) { ?>

												<li class="page-item"><a href="<?php echo 'manage_product.php?page=' . $page_previous ?>" class="page-link">Previous</a></li>

											<?php } ?>

											<?php
											for ($page = 1; $page <= $number_of_pages; $page++) {
												echo '<li class="page-item"><a href="manage_product.php?page=' . $page . '" class="page-link">' . $page . ' ' . '</a></li>';
											}
											?>

											<?php if ($page >= 1) { ?>

												<li class="page-item "><a href="<?php echo 'manage_product.php?page=' . $page_next ?>" class="page-link">دواتر</a></li>

											<?php } ?>

										</ul>
									</nav>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Update Group Modal -->

	<div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="UpdateModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content text-right">
				<div class="modal-header mx-auto"> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title text-center text-info" id="exampleModalCenterTitle">نوێکردنەوەی بەرهەم</h4>

				</div>
				<div class="modal-body">
					<form method="POST" action="" id="update_form">
						<div class="form-group">
							<label for="product_name">ناوی بەرهەم</label>
							<input type="text" name="product_name" class="form-control shadow-none" id="product_name" placeholder="Enter Product Name">
						</div>
						<div class="form-group">
							<label for="price" style="font-weight: 600;">نرخ</label>
							<input type="text" name="price" class="form-control shadow-none" id="price" placeholder="Enter Price">
						</div>
						<div class="form-group">
							<label for="groups" style="font-weight: 600;">پۆڵێن</label>
							<select class="form-control shadow-none" id="category" name="category">

							</select>
						</div>
						<div class="form-group">
							<label for="status">هەڵبژاردنی دۆخ</label>
							<select class="form-control shadow-none" name="status" id="status">
								<option value="yes">بەڵێ</option>
								<option value="no">نەخێر</option>
							</select>
						</div>
						<button type="hidden" id="product_id" class="d-none"></button>
						<button type="submit" name="update_product" id="update_product" class="btn btn-primary shadow-none">نوێکردنەوەی بەرهەم</button>
						<button type="button" class="btn btn-danger shadow-none" data-dismiss="modal" aria-label="Close">پاشگەزبوونەوە</button>
					</form>
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

	<script>
		function SearchField() {
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "product_search.php?search=" + document.getElementById('search').value, false);
			xmlhttp.send(null);

			document.getElementById('display').innerHTML = xmlhttp.responseText;
		}
	</script>

	<script type="text/javascript">
		/* Getting Data as json */

		$(document).on('click', '.edit_data', function() {
			var product_id = $(this).attr('id');
			$.ajax({
				url: "update_product.php",
				method: "POST",
				data: {
					product_id: product_id
				},
				dataType: "json",
				success: function(data) {

					var formoption = "";
					$('#product_name').val(data.name);
					$('#price').val(data.price);
					formoption += "<option value='" + data.category_name + "'>" + data.category_name + "</option>";
					alert(formoption);
					// TODO
					$('#category').html(formoption);
					$('#status').val(data.status);
					$('#product_id').val(product_id);
					$('#UpdateModal').modal('show');
				}
			});
		});

		/* Updating Data at backend */

		$('#update_form').on('submit', function(e) {
			var product_id = $('#product_id').val();
			var product_name = $('#product_name').val();
			var price = $('#price').val();
			var status = $('#status').val();
			e.preventDefault();
			if ($('#product_name').val() == "" || $('#price').val() == "") {
				alert('ناو یان نرخی بەرهەمەکە بەتاڵە');
			} else {
				$.ajax({
					url: "update_product_database.php",
					method: "POST",
					data: {
						product_name: product_name,
						price: price,
						status: status,
						product_id: product_id
					},
					success: function(data) {
						$('#UpdateModal').modal('hide');
						$('#product').html(data);
					}
				});
			}
		});
	</script>


</body>

</html>