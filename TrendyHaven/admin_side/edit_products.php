<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="SELECT * from products where product_id= $edit_id ";
   $result=mysqli_query($conn,$get_data);
   
   $row=mysqli_fetch_assoc($result);
   $product_title=$row['product_title'];
   $product_description=$row['product_description'];
   $product_keywords=$row['products_keywords'];
   $category_id=$row['category_id'];
   $brand_id=$row['brand_id'];
   $product_image1=$row['product_image1'];
   $product_image2=$row['product_image2'];
   $product_image3=$row['product_image3'];
   $product_price=$row['product_price'];

  // fetching category name
$select_category = "SELECT * from categories where category_id = $category_id";
$result_category = mysqli_query($conn, $select_category);

if ($result_category) {
    $row_category = mysqli_fetch_assoc($result_category);
    if ($row_category) {
        $category_title = $row_category['category_title'];
    } else {
        // Handle the case where the category doesn't exist
        $category_title = 'Category not found';
    }
} else {
    // Handle the case where the query fails
    $category_title = 'Error fetching category';
}
// fetching brandsname
$select_brand="SELECT * from brands where brand_id=$brand_id";
$result_brand=mysqli_query($conn,$select_brand);
$row_brand=mysqli_fetch_assoc($result_brand);
$brand_title=$row_brand['brand_title'];


}

?>




<body class="bg-light">
    <div class="container mt-3 w-50 m-auto">
        <h1 class="text-center">Edit product </h1>
        <!-- create form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4">
                <label for="product_title" class="form-label">
                    Product title
                </label>
                <input type="text" name="product_title" id="product_title" value="<?php echo $product_title  ?>" class="form-control" 
                 required="required">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 ">
                <label for="description" class="form-label">
                    Product description
                </label>
                <input type="text" name="product_desc" id="product_desc"  value="<?php echo $product_description  ?>" class="form-control" 
                required="required">
            </div>
            <!-- keywords -->
            <div class="form-outline mb-4">
                <label for="product_keywords" class="form-label">
                    Product keyword
                </label>
                <input type="text" name="product_keywords" id="product_keywords"  value="<?php echo $product_keywords  ?>" class="form-control" 
                 required="required">
            </div>
            <div class="form-outline mb-4">
            <label for="product_categories" class="form-label"> Product Categories</label>
               <select name="product_category" class="form-select">
                <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
                <?php
                $select_category_all="SELECT * from categories ";
                $result_category_all=mysqli_query($conn,$select_category_all);
               while( $row_category_all=mysqli_fetch_assoc($result_category_all)){
                $category_title=$row_category_all['category_title']; 
                $category_id=$row_category_all['category_id'];
                echo " <option value='$category_id' >$category_title</option>";
               }
                
                ?>
               
                
               </select>
            </div>
            <div class="form-outline mb-4">
            <label for="product_categories" class="form-label"> Product brands</label>
               <select name="product_brands" class="form-select">
                <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
                 <?php
                $select_brand_all="SELECT * from brands ";
                $result_brand_all=mysqli_query($conn,$select_brand_all);
               while( $row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                $brand_title=$row_brand_all['brand_title']; 
                $brand_id=$row_brand_all['brand_id'];
                echo " <option value='$brand_id' >$brand_title</option>";
               }


                 ?>
                
               </select>
            </div>
            <div class="form-outline mb-4">
                <label for="product_image1" class="form-label">
                    Product Image1
                </label>
                <div class="d-flex">
                <input type="file" name="product_image1" id="product_image1" 
                class="form-control w-90 m-auto" 
                 required="required">
                 <img src="./product_images/<?php  echo $product_image1?>" alt="" class="product_img">
            </div>
            </div>
            <div class="form-outline mb-4">
                <label for="product_image2" class="form-label">
                product_image2
                </label>
                <div class="d-flex">
                <input type="file" name="product_image2" id="product_image2" 
                class="form-control w-90 m-auto" 
                 required="required">
                 <img src="./product_images/<?php  echo $product_image2?>" alt="" class="product_img">
            </div>
            </div>
            <div class="form-outline mb-4">
                <label for="product_image3" class="form-label">
                product_image3
                </label>
                <div class="d-flex">
                <input type="file" name="product_image3" id="product_image3" 
                class="form-control w-90 m-auto" 
                 required="required">
                 <img src="./product_images/<?php  echo $product_image3?>" alt="" class="product_img">
            </div>
            </div>
            <div class="form-outline mb-4">
                <label for="product_price" class="form-label">
                    Product price
                </label>
                <input type="text" name="product_price" id="product_price" value= " <?php  echo $product_price?>" class="form-control" 
                 required="required">
            </div>
            <div class="w-30 m-auto">
                <input type="submit" name="edit_product" value="Update product"
                class="btn btn-info px-3 mb-3">
                
            </div>

           
        </form>
    </div>
    <!-- editing products -->
    <?php
    
    if (isset($_POST['edit_product'])) {
       $product_title=$_POST['product_title'];
       $product_desc=$_POST['product_desc'];
       $product_keywords=$_POST['product_keywords'];
       $product_category=$_POST['product_category'];
       $product_brand=$_POST['product_brands'];
       $product_image1=$_FILES['product_image1'];
       $product_image2=$_FILES['product_image2'];
       $product_image3=$_FILES['product_image3'];
       $product_price=$_POST['product_price'];

       $product_image1=$_FILES['product_image1']['name'];
       $product_image2=$_FILES['product_image2']['name'];
       $product_image3=$_FILES['product_image3']['name'];

       $temp_image1=$_FILES['product_image1']['tmp_name'];
       $temp_image2=$_FILES['product_image2']['tmp_name'];
       $temp_image3=$_FILES['product_image3']['tmp_name'];

       move_uploaded_file($temp_image1,"./product_images/$product_image1");
       move_uploaded_file($temp_image2,"./product_images/$product_image2");
       move_uploaded_file($temp_image3,"./product_images/$product_image3");
    // update products
    $update_product = "UPDATE products SET product_title='$product_title', product_description='$product_desc',
    products_keywords='$product_keywords', category_id='$product_category', brand_id='$product_brand',
    product_image1='$product_image1', product_image2='$product_image2', product_image3='$product_image3',
    product_price='$product_price', date=NOW() WHERE product_id=$edit_id";
    

      $result_update=mysqli_query($conn,$update_product); 
      if ($result_update) {
        echo "<script>alert('Product updated successfully')</script>";
        echo "<script>window.open('./insert_product.php', '_self')</script>";
    } else {
        echo "<script>alert('Failed to update product')</script>";
    }
   
    if (!$result_update) {
        die("Error in SQL query: " . mysqli_error($conn));
    }
    }
    
    
    ?>
</body>
</table>