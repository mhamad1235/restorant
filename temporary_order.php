<?php

include "auth/database.php";

$product_id = $_POST['product_id'];
$table_id = $_POST['table_id'];

$query = "select * from temporary_order";
$result = mysqli_query($connect, $query);
$count = mysqli_num_rows($result);


$queryy = "select * from temporary_order where product_id=$product_id and table_id=$table_id";
$results = mysqli_query($connect, $queryy);
$count = mysqli_num_rows($results);
if ($count > 0) {
    $queryyy = "update temporary_order
        set quantity=quantity+1
        where product_id=$product_id";
    $resultss = mysqli_query($connect, $queryyy);
    $queryyy = "select * from temporary_order join add_product on temporary_order.product_id=add_product.id where table_id=$table_id";
    $resultsss = mysqli_query($connect, $queryyy);
    while ($data = mysqli_fetch_array($resultsss)) {
?>


<div class="d-flex align-content-center align-items-center justify-content-between">
        <div class="d-flex text-center justify-content-between align-items-center align-content-center my-3 p-1 rounded" style="width: 240px; height: 100px;background-color:#D8D2CB;border: 2px solid #94908B;">
            <div style="width: 90px;height:100%">
                <img class='rounded mx-auto' style="width: 100%!important;height: 100% !important;" src=file/<?php echo $data['image'] ?>>
            </div>
            <div class="d-flex flex-column justify-content-between align-items-center mr-1 mt-4">
                <div>
                    <p> <?php echo $data['name'] ?> </p>
                </div>
                <div class="d-flex">
                    <div>
                        <button class="px-2 text-white addition" style="background-color:#83BD75;border-radius:50%;cursor: pointer;" id="<?php echo $data["id"]; ?>" value='<?php echo $table_id; ?>' onclick="">+</button>
                    </div>
                    <div>
                        <p class="col pt-2"> <?php echo $data['quantity']; ?></p>
                    </div>
                    <div>
                        <button class="px-2 text-white subtraction" value='<?php echo $table_id; ?>' style="background-color:#B73E3E;border-radius:50%;cursor: pointer;" id="<?php echo $data["id"]; ?>" onclick="">-</button>
                    </div>

                </div>
            </div>
            <div>
                <p class="col "> <?php echo $data['price'] . " IQD" ?> </p>
            </div>


        </div>
        <div id="<?php echo $data['id']; ?>" class="remove-btn"><i role="button" class="fa-sharp fa-solid fa-xmark shadow-lg  bg-danger text-light pointer rounded p-2 px-2"></i></div>
</div>


    <?php
    }
} else {
    $queryy = "insert into temporary_order(product_id,table_id,quantity) values($product_id,$table_id,1)";
    $resultss = mysqli_query($connect, $queryy);
    $queryyy = "select * from temporary_order join add_product on temporary_order.product_id=add_product.id and table_id=$table_id";
    $resultsss = mysqli_query($connect, $queryyy);
    $count = mysqli_num_rows($resultsss);
    while ($data = mysqli_fetch_array($resultsss)) {

    ?>
<div class="d-flex align-content-center align-items-center justify-content-between">
        <div class="d-flex text-center justify-content-between align-items-center align-content-center my-3 p-1 rounded" style="width: 240px; height: 100px;background-color:#D8D2CB;border: 2px solid #94908B;">
            <div style="width: 90px;height:100%">
                <img class='rounded mx-auto' style="width: 100%!important;height: 100% !important;" src=file/<?php echo $data['image'] ?>>
            </div>
            <div class="d-flex flex-column justify-content-between align-items-center mr-1 mt-4">
                <div>
                    <p> <?php echo $data['name'] ?> </p>
                </div>
                <div class="d-flex">
                    <div>
                        <button class="px-2 text-white addition" style="background-color:#83BD75;border-radius:50%;cursor: pointer;" id="<?php echo $data["id"]; ?>" value='<?php echo $table_id; ?>' onclick="">+</button>
                    </div>
                    <div>
                        <p class="col pt-2"> <?php echo $data['quantity']; ?></p>
                    </div>
                    <div>
                        <button class="px-2 text-white subtraction" value='<?php echo $table_id; ?>' style="background-color:#B73E3E;border-radius:50%;cursor: pointer;" id="<?php echo $data["id"]; ?>" onclick="">-</button>
                    </div>
             

                </div>
            </div>
            <div>
                <p class="col "> <?php echo $data['price'] . " IQD" ?> </p>
            </div>

        </div>      
         <div id="<?php echo $data['id']; ?>" class="remove-btn"><i role="button" class="fa-sharp fa-solid fa-xmark shadow-lg  bg-danger text-light pointer rounded p-2 px-2"></i></div>
    </div>
<?php
    }
}






?>