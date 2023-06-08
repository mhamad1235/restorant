<?php

include "auth/database.php";

$product_id = $_POST['product_id'];
$result = mysqli_query($connect, "select price from add_product  where id=$product_id");

?>

<?php

while ($row = mysqli_fetch_array($result)) {
    echo $row['price'];
}
?>