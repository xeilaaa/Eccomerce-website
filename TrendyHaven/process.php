<?php

if (isset($_POST['btn-send'])) {
  $userName=$_POST['username'];
  $userEmail=$_POST['email'];
  $subject=$_POST['subject'];
  $message=$_POST['msg'];
  if (empty($userName) || empty($userEmail) || empty($subject) || empty($message)) {
   header('location:contact_us.php?error');
  }else {

    $to = "ttrendyhaven@gmail.com";
    $headers = "From: $userEmail";
    
    
    if (mail($to, $subject, $message, $headers)) {
        header("location:contact_us.php?success");
    } 
}
}
  
else {
    header("location:contact_us.php");
}
  


?>