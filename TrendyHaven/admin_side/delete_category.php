<?php

if (isset($_GET['delete_category'])) {
   $delete_category=$_GET['delete_category'];
   $delete_query="DELETE from categories where category_id=$delete_category";
   $result=mysqli_query($conn,$delete_query);
   if ($result) {
    echo "<script>alert('category deleted sucessfully')</script>";
    echo "<script>window.open('./main.php?view_categories.php','_self')</script>";
   }
}
?>