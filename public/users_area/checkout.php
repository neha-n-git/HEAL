<?php
include('../includes/connect.php');

@session_start();
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Checkout</title>
      <!-- bootstrap-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <!--fontawesome(?)-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!--style-->
      <link rel="stylesheet" href="css/style.css" />
      <style>
        body{
          overflow-x:hidden;
        }
      </style>
  </head>
  <body>
    <!--navigation-->
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg"  style="background-color:#ffffff;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img src="img/Logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
              HEAL
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="..\Home\homepage.php">HOME</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="..\E-commerce\shop.php">SHOP</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">COUNSELLING</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="..\Listing\list.php">PRODUCT LISTING</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">ABOUT US</a>
                  </li>
                </ul>
            </div>
        </div>
      </nav>
    </div>

<!--second navbar-->
    <!-- <hr> -->
    <nav class="navbar navbar-expand-lg" style="background-color:#ffffff;">
    <ul class="navbar-nav mb-2 mb-lg-0 ml-auto">
        <?php
          if(isset($_SESSION['username'])){ //user signed in - session active
            global $con;

            if(isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $select_query = "SELECT * FROM `user_table` WHERE username = '$username'";
                $result = mysqli_query($con, $select_query);

                if($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result); 
                    $user_username = $row['username'];
                    $user_image = $row['user_image'];
                    echo "<li class='nav-item mx-3'>
                    <a class='nav-link' href='profile.php'>
                        <img style='max-width: 75px; border-radius: 100%;' src='user_images/$user_image' alt='Profile Picture' width='25' height='25'>
                    </a>
                      </li>
                      <li class='nav-item'>
                          <a class='nav-link' href='profile.php'>$user_username</a>
                          
                      </li>";
          }}}else{ //user not signed in
            echo "<li class='nav-item'>
            <img class='mt-2'style='max-width: 75px; border-radius: 100%;' src='img\user.png' alt='Profile Picture' width='25' height='25'></li>
            <li><a class='nav-link' href='..\users_area\img\user.png'>Guest</a>
        </li>";
          }
        ?>
        
    </ul>
    <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
      <?php
      if(isset($_SESSION['username'])){ //user signed in - session active
        echo "<li class='nav-item mx-3'>
        <a class='navlink' href='logout.php' style='color:red; text-decoration:none'>Logout</a>";
      }else{ //user not signed in
        echo "<li class='nav-item mx-3'>
        <a class='navlink' href='signin.php' style='color:green ; text-decoration:none'>Sign In</a>";
      }

      ?>
        
    </ul>
</nav>

 <div class="row px-1">
    <div class="col-md-12">
        <div class="row">
            <?php
            if(!isset($_SESSION['username'])){
                include('../users_area/signin.php');
           
            }else{
                include('payment.php');

            }

            ?>
        </div>
    </div>
 </div>

    <!--footer-->   
    <div style="background-color:#edf4fc;">
    <iframe src="..\includes\footer.html" width="100%" height="400" frameborder="0" title="Footer"></iframe> 
    <div>
    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>