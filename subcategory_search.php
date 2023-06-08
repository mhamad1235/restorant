<?php

include 'auth/database.php';

$search = $_GET['search'];

$result = mysqli_query($connect, "SELECT * FROM subcat WHERE name like ('%$search%') OR status like ('%$search%') OR id like ('%$search%') ");
$query_results = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>

<head>
	<title>
		<style type="text/css">
			.active-status {
				background-color: #28a745 !important;
				font-size: 14px;
				color: white;
				padding: 1.5px 5px;
				border-radius: 2px;
			}

			.inactive-status {
				background-color: #dc3545 !important;
				font-size: 14px;
				color: white;
				padding: 1.5px 5px;
				border-radius: 2px;
			}
		</style>
	</title>
</head>

<body>

	<table class='table table-striped'>
		<tbody>
			<?php
			if ($query_results > 0) {
				while ($data = mysqli_fetch_assoc($result)) {
			?>
					<tr>
						<td><?php echo $data['id']; ?></td>
						<td><?php echo $data['name']; ?></td>
						<?php
						if ($data['status'] == 'active') {
						?>
							<td><span class="active-status bg-success"><?php echo $data['status']; ?></span></td>
						<?php
						} else {
						?>
							<td><span class="inactive-status bg-danger"><?php echo $data['status']; ?></span></td>
						<?php
						}
						?>
						<td>
							<div class="row">
								<button type="submit" name="edit" class="btn btn-sm btn-primary ml-2 edit_data">دەسکاری</button>
								<a href="delete_subcategory.php?id=<?php echo $data['id']; ?>" name="cancel" class="btn btn-sm btn-danger">ڕەشکردنەوە</a>
							</div>
						</td>
					</tr>

				<?php
				}
			} else {
				?>
				<style>
					thead {
						border: none;
						display: none;
					}
				</style>
				<div class='alert alert-danger fade show w-100' role='alert'>
					<strong>هیچ تۆمارێك نەدۆزرایەوە!!</strong>
				</div>
			<?php
			}
			?>

		</tbody>
	</table>
</body>

</html>