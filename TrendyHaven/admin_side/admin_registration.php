<?php
include("../includes/connect.php");
include('../functions/common_function.php')
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration </title>
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
        Admin Registration
    </h2>
    <div class="row d-flex justify-content-center ">
        <div class="col-lg-6 col-xl-5 ">
            <img src="../images/internet_1.png" alt="Admin Registration" class="img-fluid">
        </div>
        <div class="col-lg-6  col-xl-4">
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="admin_name"
                     placeholder="Enter your user name"
                    required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="admin_email"
                     placeholder="Enter your email"
                    required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="admin_password"
                     placeholder="Enter your password"
                    required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="conf_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_password" name="conf_password"
                     placeholder="Confirm your password"
                    required="required" class="form-control">
                </div>
                <div>
                    <input type="submit" class="bg-info py-2 px-3 border-0" 
                    id="admin_register" name="admin_register"
                    value="Register">
                    <p class="small fw-bold mt-2 pt-1">Already have an Account?<a href="admin_login.php"
                     class="link-danger">Login</a></p>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>
<!-- php code -->
<?php

if (isset($_POST['admin_register'])) {
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $conf_admin_password = $_POST['conf_password']; 
    $select_admin_query= "SELECT * FROM admin_table WHERE 
    admin_name='$admin_name' or admin_email='$admin_email'";
    $result_admin = mysqli_query($conn,$select_admin_query);
    $row_count_admin=mysqli_num_rows($result_admin);
    if($row_count_admin>0){
        echo "<script>alert('username or email already exist ')</script>";

    }
    else if ($admin_password !== $conf_admin_password) {
        echo "<script>alert('Passwords do not match')</script>";
    }
    
    
    else{ 
    // insert data
    $insert_admin_query= "INSERT INTO admin_table (admin_name, admin_email,admin_password)
     VALUES ('$admin_name','$admin_email','$hash_password')";
   
    $sql_execute=mysqli_query($conn,$insert_admin_query);
    if($sql_execute){
        echo "<script>alert('admin registered sucessfully')</script>";
        echo "<script>window.open('admin_login.php','_self')</script>";
    }
    else{
       
        die(mysqli_error($conn));
    }

}
}
?>