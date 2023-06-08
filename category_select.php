<?php

include "auth/database.php";

$cat_id = $_POST['category_id'];

$results = mysqli_query($connect, "select id,name from subcat  where cat_id=$cat_id");
?>

<option value="">Select Sub Category</option>

<?php

while ($row = mysqli_fetch_array($results)) {
?>
    <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?></option>
<?php
}

?>