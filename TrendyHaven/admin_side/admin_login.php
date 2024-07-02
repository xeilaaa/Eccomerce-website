<?php
include("../includes/connect.php");
include('../functions/common_function.php');
@session_start();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
     <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
     rel="stylesheet" 
     integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <!-- font awesome link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
   integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
       crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- css file -->
      <link rel="stylesheet" href="../styles.css">
      <style>
        body{
            overflow: hidden;
        }
      </style>
      
</head>
<body>
    <div class="container-fluid m-3">
    <h2 class="text-center mb-5">
        Admin Login
    </h2>
    <div class="row d-flex justify-content-center ">
        <div class="col-lg-6 col-xl-5 ">
            <img src="../images/login.png" alt="Admin Login" class="img-fluid">
        </div>
        <div class="col-lg-6  col-xl-4">
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="admin_username" class="form-label">Username</label>
                    <input type="text" id="admin_username" name="admin_username" placeholder="Enter your user name"
                    required="required" class="form-control">
                </div>
                
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="admin_password" placeholder="Enter your password"
                    required="required" class="form-control">
                </div>
             
                <div>
                    <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login"
                    value="Login">
                    <p class="small fw-bold mt-2 pt-1">Do Not have Account?<a href="admin_registration.php" class="link-danger">Register</a></p>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>
<?php
 if (isset($_POST['admin_login'])) {
    $admin_name=$_POST['admin_username'];
    $password=$_POST['admin_password'];
    $select_query="SELECT * from admin_table  where admin_name='$admin_name'";
    $result=mysqli_query($conn, $select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $_SESSION['admin_username']=$admin_name;
if(password_verify($password,$row_data['admin_password'])){
    $_SESSION['admin_username']=$admin_name;
   echo "<script>alert('login sucessfull')</script>";
  echo "<script>window.open('main.php','_self')</script>";
   } else {
    echo "<script>alert('invalid credentials')</script>";
}
}