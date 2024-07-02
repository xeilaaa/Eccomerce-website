<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us </title>
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
       
</head>
<body>
    <div class="container">
        <div class="row">
       <div class="row col-lg-6 m-auto">
        <div class="card mt-5">
            <div class="card-title">
                <h2 class="text-center py-2">Contact Us</h2>
                <hr>
                <?php
                $Msg= "";
                if (isset($_GET['error'])) {
                   $Msg="Please fill in the Blanks";
                   echo  " <div class='alert alert-danger'>$Msg</div>";
                }
                if (isset($_GET['success'])) {
                    $Msg="Your message has been sent";
                    echo  " <div class='alert alert-sucess'>$Msg</div>";
                 }
                
                ?>
            </div>
            <div class="card-body">
                <form action="process.php" method="post">
                    <input type="text" name="username" placeholder="User Name" 
                    class="form-control mb-2">
                    <input type="text" name="email" placeholder="Email" 
                    class="form-control mb-2">
                    <input type="text" name="subject" placeholder="Subject" 
                    class="form-control mb-2">
                    <textarea name="msg" class="form-control mb-2"></textarea>
                    <button class="btn btn-success" name="btn-send"> Send </button>
                </form>
            </div>
        </div>
       
       </div>
    </div>
    </div>
</body>
</html>

