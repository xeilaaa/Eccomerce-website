<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "onlinestore"; 
$conn = mysqli_connect("localhost","root","","onlinestore");

if(!$conn){
   die("Connection failed: " . mysqli_connect_error());
  

}
  



?>