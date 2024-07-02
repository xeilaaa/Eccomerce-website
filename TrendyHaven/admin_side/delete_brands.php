<?php

if (isset($_GET['delete_brands'])) {
   $delete_brand=$_GET['delete_brands'];
   $delete_query="DELETE from brands where brand_id=$delete_brand";
   $result=mysqli_query($conn,$delete_query);
   if ($result) {
    echo "<script>alert('brand deleted sucessfully')</script>";
    echo "<script>window.open('./main.php?view_brands','_self')</script>";
   }
}
?>