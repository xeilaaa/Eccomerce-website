<?php
include('../includes/connect.php');

if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brands_title'];

    // Prepare the SQL statement with a placeholder to check if the category exists
    $select_query = "SELECT * FROM brands WHERE brand_title = ?";
    $stmt_select = $conn->prepare($select_query);
    $stmt_select->bind_param("s", $brand_title);
    $stmt_select->execute();
    $result_select = $stmt_select->get_result();

    if ($result_select->num_rows > 0) {
        echo "<script>alert('This Brand is already present in the database')</script>";
    } else {
        // Prepare the SQL statement with a placeholder to insert the category
        $insert_query = "INSERT INTO brands (brand_title) VALUES (?)";
        $stmt_insert = $conn->prepare($insert_query);
        $stmt_insert->bind_param("s", $brand_title);

        if ($stmt_insert->execute()) {
            echo "<script>alert('Brand has been inserted successfully')</script>";
        } else {
            echo "Error executing the query: " . $stmt_insert->error;
        }
    }
}
?>
<h2 class="text-center">Insert Brands</h2>

<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" placeholder="Insert Brands" name="brands_title" 
  aria-label="Brands"
   aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
<input type="submit" class=" bg-info border-0 p-2 "  name="insert_brand" value="Insert brands" >

</div>
</form>