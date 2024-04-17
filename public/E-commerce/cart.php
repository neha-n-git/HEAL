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
      <title>Cart Details</title>
      <!-- bootstrap-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <!--fontawesome(?)-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!--style-->
      <link rel="stylesheet" href="css/style.css" />
      <style>
        .cart_img{
            width:100px;
            height:100px;
        }
        footer {
            background-color: #000000;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
      </style>
  </head>
  <body>
    <!--navigation-->
    <div class="containe'.r-fluid p-0">
      <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="..\Home\homepage.php"> <!--link to home-->
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
                    <a class="nav-link" href="..\Counselling\counsellor.php">COUNSELLING</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="..\Listing\list.php">PRODUCT LISTING</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="..\AboutUs\about.php">ABOUT US</a>
                  </li>
                </ul>
              <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
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
    <!-- cart table -->
    <div class="container">
        <div class="row">
        <?php
            global $con;
            $ip = getIPAddress();
            $cart_query = "SELECT * FROM cart_details where ip_address='$ip'";
            $result_query = mysqli_query($con, $cart_query);

            if (mysqli_num_rows($result_query) > 0) { // Check if there are items in the cart
            ?>
            <form action="" method="post">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <!-- PHP to fetch cart data -->
                        <?php
                        global $con;
                        $ip = getIPAddress();
                        $total = 0;
                        $cart_query = "SELECT * FROM cart_details where ip_address='$ip'";
                        $result_query = mysqli_query($con, $cart_query);
                        while ($row = mysqli_fetch_array($result_query)) {
                            $product_id = $row["product_id"];
                            $select_products = "SELECT * from products WHERE product_id= '$product_id' ";
                            $result_products = mysqli_query($con, $select_products);
                            while ($row_product_price = mysqli_fetch_array($result_products)) {
                                $product_price = $row_product_price['product_price'];
                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 =  $row_product_price['product_image1'];
                                $quantity = $row['quantity'];
                                $total += ($product_price * $quantity);
                        ?>
                                <tr>
                                    <td><?php echo $product_title; ?></td>
                                    <td><img src="img/<?php echo $product_image1; ?>" alt="" class="cart_img"></td>
                                    <td><input type="text" class="form-input w-50 rounded" name="qty[<?php echo $product_id; ?>]" value="<?php echo $quantity; ?>"></td>
                                    <td><?php echo $product_price * $quantity; ?></td>
                                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>"> Remove</td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <!-- Subtotal -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="px-3">Subtotal: <strong class="text-info"><?php echo $total; ?></strong></h3>
                    <div>
                        <input type="submit" value="Remove" class="btn btn-outline-danger px-3 b-0 mx-3" name="remove_cart">
                        <input type="submit" value="Update" class="btn btn-outline-dark px-3 b-0 mx-4" name="update_cart">
                    </div>
                    <button class="btn btn-outline-dark py-2 px-5 b-0"><a style="text-decoration:none; color:green;" href="..\users_area\checkout.php">Checkout</a></button>
                </div>
            </form>
            <div class="d-flex justify-content-center mb-4">
                <a href="shop.php"><button class="btn btn-dark px-5 b-0 mx-4">Continue Shopping</button></a>
            </div>
        </div>
    </div>

    <!-- Function to remove item -->
    <?php
    if (isset($_POST['remove_cart'])) {
        foreach ($_POST['removeitem'] as $remove_id) {
            $delete_query = "DELETE FROM `cart_details` WHERE product_id='$remove_id'";
            $run_delete = mysqli_query($con, $delete_query);
            if (!$run_delete) {
                echo "Error: " . mysqli_error($con); // Output any MySQL errors for debugging
            }
        }
        echo "<script>window.open('cart.php','_self')</script>";
    }

    if (isset($_POST['update_cart'])) {
        foreach ($_POST['qty'] as $product_id => $quantity) {
            $update_cart = "UPDATE `cart_details` SET quantity='$quantity' WHERE product_id='$product_id'";
            $result = mysqli_query($con, $update_cart);
            if (!$result) {
                echo "Error: " . mysqli_error($con); // Output any MySQL errors for debugging
            }
        }
        echo "<script>window.open('cart.php','_self')</script>";
    }
    ?>
     <?php
            } else {
                // Display "Cart is empty" message
                echo "<div class='text-center m-5' style='color:red;'><h2>Your cart is empty</h2></div>
                <div class='d-flex justify-content-center mb-4></div>
                <div class='px-5 b-0 mx-4'>
                <button class='btn btn-dark px-5 b-0 mx-4' style='background-color: black; border-color: black;'><a href=shop.php style='text-decoration: none; color: white;'>Continue Shopping</a></button>
            </div>"
                ;
            }
            ?>

    <!-- Footer -->
    <footer>
    <iframe src="..\includes\footer.html" width="100%" height="500" frameborder="0" title="Footer"></iframe> 
    <footer>
            <!-- Bootstrap JS link -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>