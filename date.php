<?php

include "auth/database.php";

if (isset($_POST['date'])) {
  $date = $_POST['date'];
  if ($date == "week") {
    $query = "select * from bill_id where created_at > now() - interval 1 week order by created_at desc;";
  } else if ($date == "month") {
    $query = "select * from bill_id where created_at > now() - interval 1 month order by created_at desc;";
  } else if ($date == "year") {
    $query = "select * from bill_id where created_at > now() - interval 1 year order by created_at desc;";
  } else {
    $query = "select * from bill_id order by created_at desc;";
  }
  $result = mysqli_query($connect, $query);
  $count_orders = mysqli_num_rows($result);
}


?>

<div class=" select-opt mx-auto w-100 text-center my-4"> تێکڕای داواکاریەکان: <?php echo $count_orders; ?></div>


<div class=" select-opt mx-auto w-100 text-center my-4">
  <select id="date" name="date" class="form-select col-4 w-25 mx-auto" aria-label="Default select example">
    <option value="week" <?php if ($_POST['date'] == 'week') echo "selected"; ?>>هەفتە</option>
    <option value="month" <?php if ($_POST['date'] == 'month') echo "selected"; ?>>مانگ</option>
    <option value="year" <?php if ($_POST['date'] == 'year') echo "selected"; ?>>ساڵ</option>
    <option value="all" <?php if ($_POST['date'] == 'all') echo "selected"; ?>>گشتی</option>
  </select>
</div>


<?php

while ($id = mysqli_fetch_array($result)) {
?>
  <div class="container my-3">




    <div class=" table-responsive " style="border-radius:6px;" id="bill_table_div">

      <table class="table  table-bordered table-hover table-striped rounded my-5 text-center" dir="rtl" id="<?php echo $id['id']; ?>">

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

        $que = "select * from orders left join add_product on orders.product_id=add_product.id where orders.bill_id=$id[id]";
        $res = mysqli_query($connect, $que);
        $counter = 1;
        $all_total = 0.0;
        while ($data = mysqli_fetch_array($res)) {
        ?>

          <tr>


            <td><?php echo $counter; ?></td>
            <td><?php echo $data['name']; ?></td>
            <td><?php echo $data['quantity']; ?></td>
            <td><?php echo $data['price']; ?> IQD</td>
            <td><?php $all_total += (float)$data['price'] * (float)$data['quantity'];
                echo (float)$data['price'] * (float)$data['quantity']; ?> IQD</td>


          </tr>

        <?php $counter++;
          $table_id = $data['table_id'];
        }
        ?>

        <tr>
          <td colspan="3" class="text-left"> </td>
          <td colspan="1" class="text-left"> کۆدی وەسڵ: <?php echo $id['id']; ?> </td>
          <td colspan="1" class="text-left"> بەرواری زیادکردن: <?php echo $id['created_at']; ?> </td>
        </tr>

        <tr>
          <td colspan="3" class="text-left"> </td>
          <td colspan="1" class="text-left"> ڕێژەی داشکاندن: <?php echo $id['discount']; ?> % </td>
          <td colspan="1" class="text-left"> ژمارەی مێز: <?php echo $table_id; ?> </td>

        </tr>

        <tr>
          <td colspan="3"></td>
          <td colspan="1"> نرخی سەرجەم بەرهەمەکان بەبێ داشکاندن: <?php echo $all_total; ?> IQD</td>
          <td colspan="1"> نرخی سەرجەم بەرهەمەکان: <?php echo $all_total - $all_total * ((float)$id['discount'] / 100); ?> IQD</td>
        </tr>
      </table>

    </div>


    <div onclick="print(<?php echo $id['id']; ?>)" class="me-5 w-100 text-end "><button class="btn btn-outline-primary p-2">چاپکردنی وەسڵ<i class="px-2 bi bi-printer-fill"></i></button>
    
    </div>

    <!-- while loop should end here -->

  </div>



<?php
}

?>