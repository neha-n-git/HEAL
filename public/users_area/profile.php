<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?php  echo $_SESSION ['username']."'s Profile"; ?></title>
      <!-- bootstrap-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <!--fontawesome(?)-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!--style-->
      <style>
        body{
            overflow-x: hidden;
        }
      </style>
  </head>
  <body>
    <!--navigation-->
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img src="..\assets\Logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
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
                    <a class="nav-link" href="..\Counselling\counsellor.php">COUNSELLING</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="..\Listing\list.php">PRODUCT LISTING</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">ABOUT US</a>
                  </li>
                </ul>
              <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../E-commerce/cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                </li>
                <li class="nav-item" style="margin-right:10px">
                    <a class="nav-link" href="#">Total Price:<?php total_cart_price()?></a>
                </li>
                <li class="nav-item">
                  <form class="d-flex" action="../E-commerce/search_product.php" method="get" role="search">
                      <input class="form-control me-2 " type="search" placeholder="Search Products" aria-label="Search" name="search_data">
                      <input type=submit value="Search" class="btn btn-outline-success" name="search_data_product">
                  </form>
                
        </li>
              </ul>
            </div>
        </div>
      </nav>
    </div>
    <!-- calling cart function -->
    <?php
    cart();
    ?>
    <!--second navbar-->

    <br>
    
    <!-- profile content -->

        <div class="row">
            <div class="col-md-2 p-0" style="border: 1px solid #eee;">
                <ul class="navbar-nav text-center" style="height:100vh">
                    <li class="nav-item bg-success-subtle">
                        <a class="nav-link" style="color:#333;" href="#"><h4>Your Profile</h4></a>
                    </li>

                    <?php
                          if(isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];
                            $select_query = "SELECT * FROM `user_table` WHERE username = '$username'";
                            $result = mysqli_query($con, $select_query);
                    
                            if($result && mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result); 
                                $user_image = $row['user_image'];
                                echo "<li class='nav-item'>
                                <img src='../users_area/user_images/$user_image' class='profile_img mt-2' style='border-radius:100%; height:100px;' alt='profile image'>
                            </li>";
                            }
                        }
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" style="color:color: #333;" href="profile.php?edit_account">Edit Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:color: #333;" href="profile.php">Pending Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:color: #333;" href="profile.php?my_orders">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:color: #333;" href="profile.php?delete_account">Delete Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:color: #333;" href="..\users_area\logout.php">Logout</a>
                    </li>

                </ul>
            </div>
            <div class="col-md-10">
                <?php get_user_order_details();
                if(isset ($_GET['edit_account'])){
                    include('edit_account.php');
                }
                if(isset ($_GET['my_orders'])){
                    include('user_orders.php');
                }
                if(isset ($_GET['delete_account'])){
                    include('delete_account.php');
                }
                ?>
            </div>
    
        </div>
    <!--footer-->   
    <div style="background-color:white;">
    <iframe src="..\includes\footer.html" width="100%" height="400" frameborder="0" title="Footer"></iframe> 
    <div>

    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>