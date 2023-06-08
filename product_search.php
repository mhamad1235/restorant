<?php

include 'auth/database.php';

$search = $_GET['search'];

$result = mysqli_query($connect, "SELECT * FROM add_product join subcat on add_product.subcat_id=subcat.id join category on subcat.cat_id=category.id WHERE add_product.name like ('%$search%') OR price like ('%$search%') OR category_name like ('%$search%') OR add_product.status like ('%$search%') ORDER BY add_product.id DESC ");
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

	<table class='table table-hover' id="product">
		<tbody id="display">
			<?php
			if ($query_results > 0) {
				while ($data = mysqli_fetch_array($result)) {
			?>
					<tr>
						<td>
							<img src="file/<?php echo $data['image']; ?>" width="100px" height="80px" alt="img" style="border-radius: 25%;">
						</td>
						<td><?php echo $data[2]; ?></td>
						<td><?php echo $data['price']; ?></td>
						<td><?php echo $data['category_name']; ?></td>
						<?php
						if ($data[6] == 'yes') {
						?>
							<td><span class="active-status bg-success"><?php echo $data[6]; ?></span></td>
							<td>
								<div class="row">
									<button type="submit" name="edit" id="<?php echo $data[0]; ?>" class="btn btn-sm btn-primary ml-2 edit_data">دەسکاری</button>
									<a href="delete_product.php?id=<?php echo $data[0]; ?>" class="btn btn-sm btn-danger">ڕەشکردنەوە</a>
								</div>
							</td>
						<?php
						} else {
						?>
							<td><span class="inactive-status bg-danger"><?php echo $data[6]; ?></span></td>
							<td>
								<div class="row">
									<button type="submit" name="edit" id="<?php echo $data[0]; ?>" class="btn btn-sm btn-primary ml-2 edit_data">دەسکاری</button>
									<a href="delete_product.php?id=<?php echo $data[0]; ?>" class="btn btn-sm btn-danger">ڕەشکردنەوە</a>
								</div>
							</td>
					<?php
						}
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
					</tr>



		</tbody>
	</table>
</body>

</html>