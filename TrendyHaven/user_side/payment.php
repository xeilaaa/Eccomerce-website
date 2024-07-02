<?php
include("../includes/connect.php");
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h, initial-scale=1.0">
    <title>Payment page</title>
     <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
     rel="stylesheet" 
     integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous">
      
</head>
<style>
.payment_img{
    width: 80%;
    margin: auto;
    display: block;
}
</style>
<body>

<!-- php code t acess user id  -->
<?php
   $user_ip=getIPAddress(); 
   $get_user= "SELECT * from user_table where user_ip='$user_ip'";
  $result=mysqli_query($conn,$get_user);
$run_query= mysqli_fetch_array($result);
$user_id=$run_query['user_id'];





?>
    <div class="container">
        <h2 class="text-center text-info justify-content-center align-items-center mx-1 my-1"> Payment options

        </h2>
        <div class="row d-flex">
            <div class="col-md-6">
            <a href="https://www.paypal.com"><img src="../images/payment.jpeg" alt="" class="payment_img"></a>
</div>
            <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id   ?>"><h2 class="text-center"> offline</h2></a>
          
    </div>
        </div>
        </div>
    
</body>
</html>