<?php

include 'auth/database.php';

session_start();

$email = $_SESSION['email'];

if (!isset($email)) {
	header('Location: login.php');
}

$query = "SELECT * FROM make_group ORDER BY id DESC";
$result = mysqli_query($connect, $query);
$count = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="ar" dir="RTL">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Restaurant - group</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/manage_group.css">
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
									<a href="dashboard.php" class="d-inline text-dark mt-2" style="text-decoration: none; float: left; font-weight: 500;"> داشبۆڕد <i class="fas fa-tachometer-alt"></i></a>
									<h2 class="d-inline">بەڕێوەبردنی گروپەکان</h2>


								</div>
								<div class="row">

									<!-- Add Group Button -->

									<div class="col-md-4">
										<button class="btn btn-primary add-group shadow-none mb-4" data-toggle="modal" data-target="#AddModal">زیادکردنی گروپ</button>
									</div>

								</div>

								<div class="row pl-3 pr-3">

									<!-- Table -->

									<table class="table table-hover table-striped" id="group_table">
										<thead class="thead-dark">
											<tr>
												<th scope="col">Id</th>
												<th scope="col">گروپ</th>
												<th scope="col">دۆخ</th>
												<th scope="col">کردار</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if ($count > 0) {
												while ($data = mysqli_fetch_assoc($result)) {
											?>
													<tr>
														<td><?php echo $data['id'] ?></td>
														<td><?php echo $data['group_name'] ?></td>
														<?php
														if ($data['status'] == 'active') {
														?>
															<td><span class="active-status bg-success"><?php echo $data['status'] ?></span></td>
															<td>
																<div class="row">
																	<button type="submit" id="<?php echo $data['id'] ?>" name="edit" class="btn btn-sm btn-primary ml-2 edit_data">دەسکاری</button>
																	<a href='delete_group.php?id="<?php echo $data['id']; ?>"' name='cancel' class='btn btn-sm btn-danger delete_data'>ڕەشکردنەوە</a>
																</div>
															</td>
														<?php
														} else {
														?>
															<td><span class="inactive-status bg-danger"><?php echo $data['status'] ?></span></td>
															<td>
																<div class="row">
																	<button type="submit" id="<?php echo $data['id'] ?>" name="edit" class="btn btn-sm btn-primary ml-2 edit_data">دەسکاری</button>
																	<a href='delete_group.php?id="<?php echo $data['id']; ?>"' name='cancel' class='btn btn-sm btn-danger delete_data'>ڕەشکردنەوە</a>
																</div>
															</td>
														<?php
														}
														?>
													</tr>
											<?php
												}
											} else {
												echo "<h5 class='text-danger mb-3'>هیچ زانیاریەك نەدۆزرایەوە<h5>";
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Add Group Modal -->

	<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content text-right">
				<div class="modal-header mx-auto">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title text-center text-info" id="exampleModalCenterTitle">زیادکردنی گروپ</h4>

				</div>
				<div class="modal-body">
					<form method="POST" action="" id="add_form">
						<div class="form-group">
							<label for="group_name">ناوی گروپ</label>
							<input type="text" name="group_name" class="form-control shadow-none" id="group_name" aria-describedby="emailHelp" placeholder="ناوی گروپەکە بنووسە">
						</div>
						<div class="form-group">
							<label for="status">دۆخەکەی هەڵبژێرە</label>
							<select name="status" class="form-control shadow-none" id="status">
								<option value="active">چاڵاك</option>
								<option value="inactive">ناچاڵاك</option>
							</select>
						</div>
						<button type="submit" name="add" id="add" class="btn btn-primary shadow-none">زیادکردنی گروپ</button>
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

	<script type="text/javascript">
		$(document).ready(function() {
			$('#add_form').on('submit', function(e) {
				e.preventDefault();
				if ($('#group_name').val() == "") {
					alert('ناوی گروپ داخڵبکە');
				} else {
					$.ajax({
						url: "insert_group.php",
						method: "POST",
						data: $('#add_form').serialize(),
						success: function(data) {
							$('#add_form')[0].reset();
							$('#AddModal').modal('hide');
							$('#group_table').html(data);
						}
					});
				}
			});
		});
	</script>

</body>

</html>