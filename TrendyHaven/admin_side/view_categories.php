<h3 class="text-center text-success">All categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr  class="text-center" >
        <th style="background-color: #333; color: #fff;">S1no</th>
        <th style="background-color: #333; color: #fff;">Category title</th>
        <th style="background-color: #333; color: #fff;">Edit</th>
        <th style="background-color: #333; color: #fff;">Delete</th>
        </tr>
    </thead>
    <tbody  class="bg-info text-light">
        <?php
        $select_cat="SELECT * from categories";
        $result=mysqli_query($conn,$select_cat);
        $number=0;
        while ($row=mysqli_fetch_assoc($result)) {
           $category_id=$row['category_id'];
           $category_title=$row['category_title'];
           $number++;

        
        
        ?>
        <tr class="text-center">
            <td><?php echo $number ;?></td>
            <td><?php echo $category_title; ?></td>
            <td><a href='main.php?edit_category=<?php  echo $category_id?>' class=''><i class='fa-solid fa-pen-to-square'></i></a></td>
          <td><a href='main.php?delete_category=<?php  echo $category_id?>'type="button" class="btn btn-primary" 
          data-toggle="modal"
           data-target="#exampleModal"> <i class='fa-solid fa-trash'></i></a></td>
        
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
        data-dismiss="modal"><a href='main.php?view_categories=<?php  echo $category_id?>' class='text-light text-decoration-none'>No</a></button>
        <button type="button" class="btn btn-primary">
          <a href='main.php?delete_category=<?php  echo $category_id?>'
          class="text-light text-decoration-none " 
         >Yes</a></button>
      </div>
    </div>
  </div>
</div>