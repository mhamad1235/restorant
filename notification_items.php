<?php

session_start();
include "auth/database.php";

if (!isset($_SESSION['admin'])) {
    header("location:login.php");
}


$table_id = $_POST['table_id'];
$query = "select * from temporary_order join add_product on temporary_order.product_id=add_product.id where temporary_order.table_id=$table_id";
$result = mysqli_query($connect, $query);
$count = mysqli_num_rows($result);

while ($data = mysqli_fetch_array($result)) {
?>

<div class="d-flex justify-content-center align-content-center align-items-center text-center bg-info text-white rounded py-2 m-2">
      <div class="d-flex justify-content-center align-content-center align-items-center"> 
        <img src="file/res_table_image/products-wine.svg" style="width:40px;" alt="">
      <h4 class="mx-3"><?php echo $data['name']; ?> </h4>
      
      </div>
    <h4 class="mx-3 text-warning"><?php echo $data['quantity']; ?></h3>
</div>

 

<?php } ?>