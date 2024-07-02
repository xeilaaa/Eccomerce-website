<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website cart details</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
     rel="stylesheet" 
     integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous">
      <!-- font awesome link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
   integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
       crossorigin="anonymous" referrerpolicy="no-referrer" />
       <!-- css file -->
       <link rel="stylesheet" href="styles.css">
       <style>
       .cart_img{
    width: 80px;
    height: 80px;
    object-fit: contain;
}
        </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <img src="./images/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="main.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <?php
        if(isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link'href='./user_side/profile.php'>My Account</a>
      </li>";
        }
        else {
          echo "<li class='nav-item'>
        <a class='nav-link'href='./user_side/user_registration.php'>Register</a>
      </li>";
        }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
            <?Php
            cart_item();
            ?>
          </sup></i></a>
        </li>
      
        
      </ul>
    
    </div>
  </div>
</nav>
<!-- calling cart function  -->
<?php
cart();
?>
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
    
        <?php
        if(!isset($_SESSION['username'])){
          echo  " <li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li> ";
        }
        else {
        echo "<li class='nav-item'>
        <a class='nav-link'href='#'>Welcome ".$_SESSION['username']." </a>
        </li>";
        }
        if(!isset($_SESSION['username'])){
               echo "<li class='nav-item'>
               <a class='nav-link'href='./user_side/user_login.php'>Login</a>
             </li>";
        }
        else {
          echo "<li class='nav-item'>
          <a class='nav-link'href='logout.php'>Logout</a>
        </li>";
        }
        ?>

    </ul>
</nav>
<!-- third child -->
<div class="bg-light">
    <h3 class="text-center">TrendyHaven</h3>
    <p class="text-center"> At TrendyHaven, we make shopping simple, and satisfaction is our guarantee.</p>

</div>
<!-- fourth side -->
<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            
                <!-- php code  -->
                <?php
                  global $conn;
                  $get_ip_address = getIPAddress();
                  $total_price=0;
                  $cart_query="SELECT * FROM cart_details where ip_address= '$get_ip_address'";
                  $result=mysqli_query($conn,$cart_query);
                  $result_count= mysqli_num_rows($result);
                  if($result_count>0){
                    echo " <thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th> Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th colspan='2'>Operations</th>
                    </tr>
                </thead>
                <tbody>";
               while ($row=mysqli_fetch_array($result)) {
                  $product_id=$row['product_id'];
                  $select_products="SELECT * FROM products where product_id= '$product_id'";
                  $result_products=mysqli_query($conn,$select_products);
                  while ($row_product_price=mysqli_fetch_array($result_products)) {
                      $product_price=array( $row_product_price['product_price']);
                      $price_table=$row_product_price['product_price'];
                      $product_title=$row_product_price['product_title'];
                      $product_image1=$row_product_price['product_image1'];
                      $product_values=array_sum( $product_price);
                      $total_price+=$product_values;
               
                
                
                ?>
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                    <td><input type="text " name="qty"  class="form-input w-50"></td>
                    <?php
                      $get_ip_address = getIPAddress();
                      if (isset($_POST['update_cart'])) {
                       $quantities=$_POST['qty'];
                       $update_cart="UPDATE cart_details set quantity=$quantities where ip_address='$get_ip_address'";
                       $result_products_quantity=mysqli_query($conn,$update_cart);
                       $total_price=$total_price*$quantities;
                      }
                    
                    ?>
                    <td > N$ <?php echo  $price_table ?></td>
                   
                    <td><input type="checkbox" name= "removeitem[]"   value="<?php echo $product_id ?> " ></td>
                    <td>
                        <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                        <input type="submit" value="Update cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                        <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                        <input type="submit" value="Remove cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                    </td>
                </tr>
                <?php }
               }
              }
              else{
                echo "<h2 class='text-center text-danger'>Cart is empty<h2>";
              }
                ?>
            </tbody>
        </table>
        <!-- subtotal -->
        <div class="d-flex mb-5">
          <?php
           global $conn;
           $get_ip_address = getIPAddress();
           $cart_query="SELECT * FROM cart_details where ip_address= '$get_ip_address'";
           $result=mysqli_query($conn,$cart_query);
           $result_count= mysqli_num_rows($result);
           if($result_count>0){
            echo  "    <h4 class='px-3'>Subtotal: <strong class='text-info'>N$ $total_price </strong></h4>
            <input type='submit' value='Continue shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
          <button class='bg-secondary p-3 py-2 border-0 text-light'><a href='./user_side/checkout.php' class='text-light  text-decoration-none'> Checkout </a></button> ";
           } else {
            echo "  <input type='submit' value='Continue shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'> ";
           }
           if (isset($_POST['continue_shopping'])) {
            echo "<script>window.open('main.php','_self')</script>";
           }
          ?>
          
        </div>
    </div>
</div>
</form>
<!-- function to remove items  -->
<?php
function remove_cart_item() {
  global $conn;
  if (isset($_POST['remove_cart']) && isset($_POST['removeitem']) && is_array($_POST['removeitem'])) {
    foreach ($_POST['removeitem'] as $remove_id) {
      $remove_id = intval($remove_id); // Ensure it's an integer to prevent SQL injection.
      $delete_query = "DELETE FROM cart_details where product_id = $remove_id";
      $run_delete = mysqli_query($conn, $delete_query);
      if ($run_delete) {
        echo "<script>window.open('cart.php', '_self')</script>";
      }
    }
  }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  remove_cart_item();
}

// ... the rest of your code
?>



<!-- last child -->
<!-- iclude footer -->
<?php
include('./includes/footer.php')

?>

    </div>
    <!-- js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
crossorigin="anonymous"></script>
</body>
</html>