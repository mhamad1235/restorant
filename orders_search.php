<?php

include 'auth/database.php';

$search = $_GET['search'];
$var = $_GET['table_id'];

$result = mysqli_query($connect, "SELECT * FROM add_product join subcat on add_product.subcat_id=subcat.id join category on subcat.cat_id=category.id WHERE add_product.name like ('%$search%') OR subcat.name like ('%$search%') or price like ('%$search%') OR category_name like ('%$search%') OR add_product.status like ('%$search%') ORDER BY add_product.id DESC ");

?>


<?php while ($data = mysqli_fetch_array($result)) {
?>
	<div class="p-2 float-left " onclick="getProduct(<?php echo $data[0]; ?>,<?php echo $var; ?>)">
		<div class="bg2 text-center mx-auto mt-2 p-2 rounded d-flex justify-content-around align-content-center align-items-center product-item" style="width: 240px;height:100px;background-color:#D8D2CB;border: 2px solid #94908B;">
			<div class="" style="width: 90px!important;height: 100% !important;">
				<img src="file/<?php echo $data[1]; ?>" style="width: 100%;height:100%;" alt="img" class="rounded  mx-auto">
			</div>

			<div class="mt-3 ">
				<p class="cl mb-0  text-center" style="height: 45px;overflow-y: hidden;">
					<?php echo $data[2]; ?>
				</p>
				<p class="cl "> <?php echo $data['price'] . " IQD"; ?></p>
			</div>

		</div>
	</div>

<?php

}

?>