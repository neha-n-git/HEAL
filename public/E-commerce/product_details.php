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
      <title>Shop</title>
      <!-- bootstrap-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <!--fontawesome(?)-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!--style-->
      <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <!--navigation-->
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <!--link to home-->
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
                    <a class="nav-link" href="shop.php">SHOP</a>
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
              <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                </li>
                <li class="nav-item" style="margin-right:10px">
                    <a class="nav-link" href="#">Total Price:<?php total_cart_price()?></a>
                </li>
                <li class="nav-item">
                  <form class="d-flex" action="search_product.php" method="get" role="search">
                      <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search" name="search_data">
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

<nav class="navbar navbar-expand-lg" style="background-color:#ffffff;">
    <ul class="navbar-nav mb-2 mb-lg-0 ml-auto">
        <?php
          if(isset($_SESSION['username'])){ //user signed in - session active
            user_handle();
          }else{ //user not signed in
            echo "<li class='nav-item'>
            <img class='mt-2'style='max-width: 75px; border-radius: 100%;' src='..\users_area\img\user.png' alt='Profile Picture' width='25' height='25'></li>
            <li><a class='nav-link' href='..\users_area\img\user.png'>Guest</a>
        </li>";
          }
        ?>
        
    </ul>

    <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
    <?php
      if(isset($_SESSION['username'])){ //user signed in - session active
        echo "<li class='nav-item mx-3'>
        <a class='navlink' href='..\users_area\logout.php' style='color:red; text-decoration:none'>Logout</a>";
      }else{ //user not signed in
        echo "<li class='nav-item mx-3'>
        <a class='navlink' href='..\users_area\signin.php' style='color:green ; text-decoration:none'>Sign In</a>";
      }

      ?>
    </ul>
</nav>

    <div class="row p-3">
      <div class="col-md-10">
        <!--products-->
        <div class="row">
          <?php
            view_details();
            get_unique_category();
            get_unique_brand();
          ?>
          <!-- row end -->
        </div>
        <!-- column end -->
      </div> 
      <div class="col-md-2 bg-transparent text-body p-0">
        <!--brands-->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item" style="background-color:#B9DCA9;">
            <a href="#" class="nav-link"><h5>Delivery Brands</h5></a>
          </li>
          <?php
            displaybrands();
          ?>
        </ul>
        <!--categories-->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item" style="background-color:#B9DCA9;">
            <a href="#" class="nav-link"><h5>Categories</h5></a>
          </li>
          <?php
            displaycategories();
          ?>
        </ul>
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