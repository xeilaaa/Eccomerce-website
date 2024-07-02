<?php
// connect to database
//include('./includes/connect.php');
//getting products
function getproducts(){
    global $conn;
     // condition to check isset or not
     if (!isset($_GET['category'])) { 
        if (!isset($_GET['brand'])) {
    $select_query="SELECT * FROM products order by rand() limit 0,6";
    $result_query= mysqli_query($conn,$select_query);
    
    
    while ($row=mysqli_fetch_assoc($result_query)) {
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      $product_image1=$row['product_image1'];
      echo " <div class='col-md-4 mb-2'>
      <div class='card'>
   <img src='./admin_side/product_images/$product_image1' class='card-img-top' alt='$product_title'>
 <div class='card-body'>
   <h5 class='card-title'> $product_title</h5>
<p class='card-text'> $product_description</p>
<p class='card-text'> N$: $product_price</p>
<a href='main.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
<a href='product_details.php?product_id=$product_id' 
class='btn btn-secondary'>view more</a>
</div>
</div>
</div>";
}
}
}
}
//getting all products
function get_all_products(){

    global $conn;
    // condition to check isset or not
    if (!isset($_GET['category'])) { 
       if (!isset($_GET['brand'])) {
   $select_query="SELECT * FROM products order by rand() ";
   $result_query= mysqli_query($conn,$select_query);
  
   while ($row=mysqli_fetch_assoc($result_query)) {
     $product_id=$row['product_id'];
     $product_title=$row['product_title'];
     $product_description=$row['product_description'];
     $product_price= $row['product_price'];
     $category_id=$row['category_id'];
     $brand_id=$row['brand_id'];
     $product_image1=$row['product_image1'];
     echo " <div class='col-md-4 mb-2'>
     <div class='card'>
  <img src='./admin_side/product_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
  <h5 class='card-title'> $product_title</h5>
<p class='card-text'>$product_description</p>
<p class='card-text'> N$:$product_price</p>
<a href='main.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
</div>
</div>
</div>";
}
}
}

}
// getting unique categories
function get_unique_categories(){
    global $conn;
    // condition to check isset or not
    if (isset($_GET['category'])) {
        $category_id=$_GET['category'];
    $select_query="SELECT * FROM products Where category_id=$category_id";
    $result_query= mysqli_query($conn,$select_query);
    $num_of_rows= mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>There are no products in  this Category </h2>";
    }

   
    
    
    while ($row=mysqli_fetch_assoc($result_query)) {
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      $product_image1=$row['product_image1'];
      echo " <div class='col-md-4 mb-2'>
      <div class='card'>
   <img src='./admin_side/product_images/$product_image1' class='card-img-top' alt='$product_title'>
 <div class='card-body'>
   <h5 class='card-title'> $product_title</h5>
<p class='card-text'> $product_description</p>
<p class='card-text'> N$: $product_price</p>
<a href='main.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
</div>
</div>
</div>";
}
}
}

//get unique brands
function get_unique_brand(){

global $conn;
// condition to check isset or not
if (isset($_GET['brand'])) {
    $brand_id=$_GET['brand'];
$select_query="SELECT * FROM products Where brand_id=$brand_id";
$result_query= mysqli_query($conn,$select_query);
$num_of_rows= mysqli_num_rows($result_query);
if($num_of_rows==0){
    echo "<h2 class='text-center text-danger'>This brand is not available for service </h2>";
}


while ($row=mysqli_fetch_assoc($result_query)) {
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_price=$row['product_price'];
  $category_id=$row['category_id'];
  $brand_id=$row['brand_id'];
  $product_image1=$row['product_image1'];
  echo " <div class='col-md-4 mb-2'>
  <div class='card'>
<img src='./admin_side/product_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
<h5 class='card-title'> $product_title</h5>
<p class='card-text'> $product_description</p>
<p class='card-text'> N$: $product_price</p>
<a href='main.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
</div>
</div>
</div>";
}
}
}

//displaying brands
function display_all_brands(){
    global $conn;
   
    $select_brands= "SELECT * FROM brands";
    $result_brands= mysqli_query($conn,$select_brands);
  //$row_data= mysqli_fetch_assoc($result_brands);
  // echo $row_data['brand_title']
    while($row_data=mysqli_fetch_assoc($result_brands)) {
      $brand_title=$row_data['brand_title'];
      $brand_id=$row_data['brand_id'];
      echo "<li class='nav-item '>
      <a href='main.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
  </li>";
    }
}

// display categories 
function display_all_categories(){
    global $conn;
    $select_categories= "SELECT * FROM categories";
$result_categories= mysqli_query($conn,$select_categories);
//$row_data= mysqli_fetch_assoc($result_brands);
// echo $row_data['brand_title']
while($row_data=mysqli_fetch_assoc($result_categories)) {
  $category_title=$row_data['category_title'];
  $category_id=$row_data['category_id'];
  echo "<li class='nav-item '>
  <a href='main.php?category=$category_id' class='nav-link text-light'>$category_title</a>
</li>";
}
}
//get search products
function search_product(){
    global $conn;
   if (isset($_GET['search_data_product'])) {
    $search_data_value=$_GET['search_data'];
   $search_query="SELECT * FROM products Where products_keywords like '%$search_data_value%' ";
   $result_query= mysqli_query($conn,$search_query);
   $num_of_rows= mysqli_num_rows($result_query);
   if($num_of_rows==0){
       echo "<h2 class='text-center text-danger'>No match found  </h2>";
   }
   
   while ($row=mysqli_fetch_assoc($result_query)) {
     $product_id=$row['product_id'];
     $product_title=$row['product_title'];
     $product_description=$row['product_description'];
     $product_price=$row['product_price'];
     $category_id=$row['category_id'];
     $brand_id=$row['brand_id'];
     $product_image1=$row['product_image1'];
     echo " <div class='col-md-4 mb-2'>
     <div class='card'>
  <img src='./admin_side/product_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
  <h5 class='card-title'> $product_title</h5>
<p class='card-text'> $product_description</p>
<p class='card-text'>N$: $product_price</p>
<a href='main.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
</div>
</div>
</div>";
}
}
}
// view details functin
function view_details(){
    global $conn;
    // condition to check isset or not
    if (isset($_GET['product_id'])) {
    if (!isset($_GET['category'])) { 
       if (!isset($_GET['brand'])) {
        $product_id=$_GET['product_id'];
   $select_query="SELECT * FROM products WHERE product_id=$product_id";
   $result_query= mysqli_query($conn,$select_query);
   
   
   while ($row=mysqli_fetch_assoc($result_query)) {
     $product_id=$row['product_id'];
     $product_title=$row['product_title'];
     $product_description=$row['product_description'];
     $product_price=$row['product_price'];
     $category_id=$row['category_id'];
     $brand_id=$row['brand_id'];
     $product_image1=$row['product_image1'];
     $product_image2=$row['product_image2'];
     $product_image3=$row['product_image3'];
     echo " <div class='col-md-4 mb-2'>
     <div class='card'>
  <img src='./admin_side/product_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
  <h5 class='card-title'> $product_title</h5>
<p class='card-text'> $product_description</p>
<p class='card-text'> N$: $product_price</p>
<a href='main.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
<a href='main.php'class='btn btn-secondary'>Go home</a>
</div>
</div>
</div>

<div class='col-md-8'>
        <!-- related images-->
     <div class='row'>
        <div class='col-md-12'>
            <h4 class='text-center text-info mb-5'>Related products</h4>
        </div>
        <div class='col-md-6'>
        <img src='./admin_side/product_images/$product_image2' class='card-img-top' alt='$product_title'>
        </div>
        <div class='col-md-6'>
        <img src='./admin_side/product_images/$product_image3' class='card-img-top' alt='$product_title'>
        </div>
    </div>
";
}
}
}
}

}
// get ip address function
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;


//cart function 
function cart(){
if (isset($_GET['add_to_cart'])) {
    global $conn;
$get_ip_address = getIPAddress();
$get_product_id=$_GET['add_to_cart'];
$select_query= "SELECT * FROM cart_details  where ip_address='$get_ip_address' and product_id=$get_product_id";
$result_query= mysqli_query($conn,$select_query);
$num_of_rows= mysqli_num_rows($result_query);
if($num_of_rows>0){
    echo "<script>alert ('This item is already inside cart')</script>";
    echo "<script>window.open('main.php','_self')</script>";

}
else {
    $insert_query="INSERT INTO cart_details (product_id, ip_address, quantity) values ($get_product_id,'$get_ip_address',0)";
    $result_query= mysqli_query($conn,$insert_query);
   echo  "<script>alert ('Item is added to cart ')</script>";
    echo "<script>window.open('main.php','_self')</script>";

}
}
}    
//function to get cart item numbers
function cart_item(){
    if (isset($_GET['add_to_cart'])) {
        global $conn;
    $get_ip_address = getIPAddress();
   
    $select_query= "SELECT * FROM cart_details  where ip_address='$get_ip_address' ";
    $result_query= mysqli_query($conn,$select_query);
    $count_cart_items= mysqli_num_rows($result_query);
    }
    else {
        global $conn;
        $get_ip_address = getIPAddress();
       
        $select_query= "SELECT * FROM cart_details  where ip_address='$get_ip_address' ";
        $result_query= mysqli_query($conn,$select_query);
        $count_cart_items= mysqli_num_rows($result_query);
        }
        echo $count_cart_items;
    }
    //total price function
    function total_cart_price(){
        global $conn;
        $get_ip_address = getIPAddress();
        $total_price=0;
        $cart_query="SELECT * FROM cart_details where ip_address= '$get_ip_address'";
        $result=mysqli_query($conn,$cart_query);
     while ($row=mysqli_fetch_array($result)) {
        $product_id=$row['product_id'];
        $select_products="SELECT * FROM products where product_id= '$product_id'";
        $result_products=mysqli_query($conn,$select_products);
        while ($row_product_price=mysqli_fetch_array($result_products)) {
            $product_price=array( $row_product_price['product_price']);
            $product_values=array_sum( $product_price);
            $total_price+=$product_values;
     }
    }
    echo $total_price;
}
    
// get user order details
function get_user_order_details(){
  global $conn;
  $username=$_SESSION['username'];
  $get_details= "SELECT * from user_table where username='$username' ";
  $result_query=mysqli_query($conn,$get_details);
  while ($row_query=mysqli_fetch_array($result_query)) {
    $user_id=$row_query['user_id'];
    if (!isset($_GET['edit_account'])) {
    if (!isset($_GET['my_orders'])) {
      if (!isset($_GET['delete_account'])) {
      $get_order="SELECT * from  user_orders where user_id=$user_id and order_status='pending'";
      $result_orders_query=mysqli_query($conn,$get_order);
      $row_count=mysqli_num_rows($result_orders_query);
      if($row_count>0){
        echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span 
        class='text-danger'>$row_count </span>pending
         orders</h3>
         <p class='text-center'> <a href='profile.php?my_orders' class='text-dark'>Order Details</a><p>";
      }else{
        echo "<h3 class='text-center text-success mt-5 mb-2'>You have 0 pending
         orders</h3>
         <p class='text-center'> <a href='../main.php'class='text-dark'>Explore products</a><p>";
      }
    }
  }


}
  }
}

    ?>
   
