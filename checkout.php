<?php

include "auth/database.php";
$table_id = $_GET['table_id'];
$discount = $_GET['discount'];

$queryyyyy = "select now() as date from bill_id limit 1;";
$ress = mysqli_query($connect, $queryyyyy);
$created_at = "";

while ($bill = mysqli_fetch_array($ress)) {
  $created_at = $bill['date'];
}

$query = "select * from temporary_order join add_product on temporary_order.product_id=add_product.id where table_id=$table_id";
$result = mysqli_query($connect, $query);
$queee = "select * from bill_id";
$ressss = mysqli_query($connect, $queee);
$id_bill = (int)mysqli_num_rows($ressss) + 1;
if (isset($_POST['save'])) {
  $que = "select * from bill_id";
  $res = mysqli_query($connect, $que);
  $bill_id = (int)mysqli_num_rows($res) + 1;
  $make_result = "";

  while ($data = mysqli_fetch_array($result)) {
    $product_id = $data['product_id'];
    $table_id = $data['table_id'];
    $quantity = $data['quantity'];
    $make_result .= "insert into orders(bill_id,product_id,table_id,quantity) values($bill_id,$product_id,$table_id,$quantity);";
  }
  $make_result .= "insert into bill_id(discount) values($discount);";
  $make_result .= "delete from temporary_order where table_id=$table_id;";
  $make_result .= "delete from notification where table_id=$table_id;";
  $resu = mysqli_multi_query($connect, $make_result);


  header("location:prepare_order.php");
}
?>


<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Webpage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="https://kit.fontawesome.com/d455f30832.js" crossorigin="anonymous"></script>

</head>

<body>

  <div class="container">

    <div class=" table-responsive " style="border-radius:6px;" id="bill_table_div">

      <table class="table  table-bordered table-hover table-striped rounded my-5 text-center">

        <thead>
          <tr class="bg-primary text-white">
            <th>#</th>
            <th>بەرهەم</th>
            <th>دانە</th>
            <th>نرخی بەرهەم</th>
            <th>نرخی سەرجەم</th>

          </tr>
        </thead>
        <?php
        $counter = 1;
        $all_total = 0;
        while ($data = mysqli_fetch_array($result)) {
        ?>
          <tr>
            <td><?php echo $counter ?></td>
            <td><?php echo $data['name'] ?></td>
            <td><?php echo $data['quantity'] ?></td>
            <td><?php echo $data['price'] ?></td>
            <td><?php $all_total += (float)$data['price'] * (float)$data['quantity'];
                echo (float)$data['price'] * (float)$data['quantity']; ?> IQD</td>
          </tr>

        <?php
          $counter++;
        }

        ?>
        <tr>
          <td colspan="3" class="text-left"> </td>
          <td colspan="1" class="text-left"> کۆدی وەسڵ: <?php echo $id_bill; ?> </td>
          <td colspan="1" class="text-left"> بەرواری زیادکردن <?php echo $created_at; ?> </td>
        </tr>
        <tr>
          <td colspan="3" class="text-left"> </td>
          <td colspan="1" class="text-left"> ڕێژەی داشکاندن: <?php echo $discount; ?> % </td>
          <td colspan="1" class="text-left"> ژمارەی مێز: <?php echo $table_id; ?> </td>
        </tr>
        <tr>
          <td colspan="3"></td>
          <td colspan="1"> نرخی سەرجەم بەرهەمەکان بەبێ داشکاندن: <?php echo $all_total; ?> IQD</td>
          <td colspan="1"> نرخی سەرجەم بەرهەمەکان بە داشکاندن: <?php echo $all_total - $all_total * ((float)$discount / 100); ?> IQD</td>
        </tr>
      </table>
    </div>


    <div class="me-5 w-100 text-end">
      <form method="post"><button class="btn btn-outline-primary p-2" name="save">خەزنکردن <i class="mx-2 fa-solid fa-floppy-disk"></i></button></form>
    </div>

  </div>
  </div>
</body>

</html>