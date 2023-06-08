<?php

include "auth/database.php";
$table_id = $_POST['table_id'];

$query = "select * from temporary_order join add_product on temporary_order.product_id=add_product.id where table_id=$table_id";
$result = mysqli_query($connect, $query);

$queryyyyy = "select *  from bill_id join orders on orders.bill_id=bill_id.id where table_id=$table_id;";
$ress = mysqli_query($connect, $queryyyyy);
$created_at = "";

while ($bill = mysqli_fetch_array($ress)) {
    $created_at = $bill['created_at'];
}

$queryy = "select bill_id.id as id  from bill_id join orders on orders.bill_id=bill_id.id where table_id=$table_id;";
$res = mysqli_query($connect, $queryy);
if($res){
    echo '<script>alert("message success")</script>';
}else{
    echo '<script>alert("not success no rowsss")</script>';
}
if(mysqli_num_rows($res)>0){
    echo '<script>alert("rows came here")</script>';
}
$bills_id = "";

echo '<script>alert("Welcome to Geeks for Geeks")</script>';
while ($bills = mysqli_fetch_array($res)) {
    $bills_id = $bills['id'];
    echo "bills id = ".$bills_id;
    echo '<script>alert("Welcome to Geeks for Geeks")</script>';
}
?>



<div class="container">
    <div id="bill-template" dir="rtl" class="mx-auto d-none" style="width:500px;">
        <h1 class="" style="text-align:center;"> Bloom Rest</h1>

        <div class="" style="display:flex;flex-direction: column;">
            <div style="display:inline-block;">

              <span>ژمارەی پسوولە: <?php echo $bills_id; echo "zana"; ?></span>
            </div>
            <div style="display:flex;flex-direction:column;">
                <span style="font-size:4rem;"> کات و بەروار: <?php echo $created_at; echo "twana"; ?></span>
            </div>
            <div style="text-align:center;margin:20px;">
                <span></span><span>ژمارەی مێز:<?php echo $table_id ?></span>
            </div>
            <table style="text-align:center;border: 1px solid black;" dir="rtl">
                <tr style="border: 1px solid black;">
                    <th style="border: 1px solid black;">#</th>
                    <th style="border: 1px solid black;">ناوی بەرهەم</th>
                    <th style="border: 1px solid black;">بڕ</th>
                    <th style="border: 1px solid black;">نرخ</th>
                    <th style="border: 1px solid black;">گشتی(سەرجەم)</th>
                </tr>
                <?php
                $counter = 1;
                $all_total = 0;
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr style="border: 1px solid black;">
                        <td style="border: 1px solid black;"><?php echo $counter ?></td>
                        <td style="border: 1px solid black;"><?php echo $data['name'] ?></td>
                        <td style="border: 1px solid black;"><?php echo $data['quantity'] ?></td>
                        <td style="border: 1px solid black;"><?php echo $data['price'] ?></td>
                        <td style="border: 1px solid black;"><?php $all_total += (float)$data['price'] * (float)$data['quantity'];
                                                                echo (float)$data['price'] * (float)$data['quantity']; ?> IQD</td>
                    </tr>

                <?php
                    $counter++;
                }

                ?>

            </table>
            <p style="text-align:center;margin:20px;">
                <span> کۆی گشتی:</span> <span><?php echo $all_total; ?></span>
            </p>
        </div>
        <h1></h1>
    </div>

</div>