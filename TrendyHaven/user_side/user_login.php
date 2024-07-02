<?php
include("../includes/connect.php");
include('../functions/common_function.php');
@session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h, initial-scale=1.0">
    <title>User Login</title>
     <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
     rel="stylesheet" 
     integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous">
      <style>

        body{
            overflow-x: hidden;
        }
      </style>
     
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center mb-5">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-6 col-xl-5 ">
            <img src="../images/login.png" alt="user Login" class="img-fluid">
        </div>
            <div class="lg-12 col-xl-6">
                <form action=""  method="post" >
              
                <div class="form-outline mb-4">
                    <!-- username field -->
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter your username"
                     autocomplete="on" required="required" name="user_username">
                </div>
                <div class="form-outline  mb-4">
                    <!-- password field -->
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password"
                     autocomplete="off" required="required" name="user_password">

                </div>
                
                <div class="mt-4 pt-2">
                    <input type="submit" value="Login" class="bg-info py-2 px-3 border-0"  name="user_login">
                    <p class="small fw-bold mt-2 pt-1">Do not have an account?<a href="user_registration.php"> Register </a> </p>
                </div>
                </form>
            </div>
        </div>
    </div>

    
</body>
</html>
<?php
 if (isset($_POST['user_login'])) {
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $select_query="SELECT * from user_table  where username='$user_username'";
    $result=mysqli_query($conn, $select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip= getIPAddress();

    //cart item 
    $select_query_cart="SELECT * from cart_details where ip_address='$user_ip'";
    $select_cart=mysqli_query($conn,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
    if($row_count>0){
        $_SESSION['username']=$user_username;

if(password_verify($user_password,$row_data['user_password'])){
    //echo "<script>alert('login sucessfull')</script>";
   if ($row_count==1 and $row_count_cart==0) {
    $_SESSION['username']=$user_username;
    echo "<script>alert('login sucessfull')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
   } else {
    $_SESSION['username']=$user_username;
    echo "<script>alert('login sucessfull')</script>";
    echo "<script>window.open('payment.php','_self')</script>";
   }
    }
    else {
        echo "<script>alert('invalid credentials')</script>";
    }
}
    else {
        echo "<script>alert('invalid credentials')</script>";
    }




 }
 


?>