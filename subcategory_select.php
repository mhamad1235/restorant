<?php

include "auth/database.php";

$cat_id = $_POST['category_id'];
$result = mysqli_query($connect, "select id,name from add_product where subcat_id=$cat_id");
?>

<option value="">Select Sub Category</option>

<?php

while ($row = mysqli_fetch_array($result)) {
?>
    <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?></option>
<?php
}

?>