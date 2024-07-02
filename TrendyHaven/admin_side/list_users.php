<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">

    <?php
    $get_users="SELECT * from user_table";
    $result=mysqli_query($conn,$get_users);
    $row_count=mysqli_num_rows($result);
    echo " <tr>
    <th style='background-color: #333; color: #fff;'>S1 no</th>
    <th style='background-color: #333; color: #fff;'>User Name</th>
    <th style='background-color: #333; color: #fff;'> User Email</th>
    <th style='background-color: #333; color: #fff;'>User Image </th>
    <th style='background-color: #333; color: #fff;'>User Address</th>
    <th style='background-color: #333; color: #fff;'>User mobile</th>
    
   
</tr>

</thead>
<tbody class='bg-secondary'>";
    if ($row_count==0) {
       echo "<h2 class='bg-danger text-center mt-5'>No users yet</h2>";
    }
    else {
        
        $number=0;
        while ($row_data=mysqli_fetch_assoc($result)) {
            $user_id=$row_data['user_id'];
           $username=$row_data['username'];
           $user_email=$row_data['user_email'];
           $user_image=$row_data['user_image'];
           $user_address=$row_data['user_address'];
           $user_mobile=$row_data['user_mobile'];
          
          $number++;

       
        echo " <tr>
        <td>$number</td>
        <td>$username</td>
        <td>$user_email</td>
        <td><img src='../user_side/user_images/$user_image' alt='$username' class='product_img'/></td>
        <td>$user_address</td>
        <td>$user_mobile</td>
       
        
    </tr>";
        }
    }
    
    
    ?>
       
   
      
    </tbody>
</table>
