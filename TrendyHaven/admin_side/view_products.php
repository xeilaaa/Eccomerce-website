
    <h3 class="text-center text-success">All Products</h3>
    <table class="table table-bordered mt-5" style="margin-bottom: 100px;">
    <thead >
        <tr class="text-center">
            <th style="background-color: #333; color: #fff;">Product ID</th>
            <th style="background-color: #333; color: #fff;">Product Title</th>
            <th style="background-color: #333; color: #fff;">Product Image</th>
            <th style="background-color: #333; color: #fff;">Product Price</th>
            <th style="background-color: #333; color: #fff;">Total Sold</th>
            <th style="background-color: #333; color: #fff;">Status</th>
            <th style="background-color: #333; color: #fff;">Edit</th>
            <th style="background-color: #333; color: #fff;">Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_products="SELECT *from products";
        $result= mysqli_query($conn,$get_products);
        $number=0;
        while ($row=mysqli_fetch_assoc($result)) {
           $product_id=$row['product_id'];
           $product_title=$row['product_title'];
           $product_image1=$row['product_image1'];
           $product_price=$row['product_price'];
           $status=$row['status'];
           $number++;
           ?>
           <tr class='text-center'>
          <td><?php echo $number;?></td>
          <td><?php echo $product_title;?></td>
          <td><img src='./product_images/<?php echo $product_image1?>' class='product_img'/></td>
          <td>N$ <?php echo $product_price;?></td>
          <td><?php 
          $get_count= "SELECT * from orders_pending where product_id=$product_id";
          $result_count= mysqli_query($conn,$get_count);
          $rows_count=mysqli_num_rows($result_count);
          echo $rows_count;
          ?></td>
          <td><?php echo $status; ?></td>
          <td><a href='main.php?edit_products=
          <?php  echo $product_id;?>'class=''><i class='fa-solid fa-pen-to-square'></i></a></td>
          <td><a href='main.php?delete_product=
          <?php  echo $product_id;?>'type="button" class="btn btn-primary" 
          data-toggle="modal"
           data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
        
      </tr>
      <?php
        }
        
        
        ?>
       
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" 
        data-dismiss="modal"><a href='main.php?view_products=<?php  echo $product_id?>' class='text-light text-decoration-none'>No</a></button>
        <button type="button" class="btn btn-primary">
          <a href='main.php?delete_product=
          <?php  echo $product_id;?>'  class="text-light text-decoration-none "
        
         >Yes</a></button>
      </div>
    </div>
  </div>
</div>