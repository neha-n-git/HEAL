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
    <title>List Your Products</title>
    <link rel="stylesheet" href="list.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<header>
<div class="container-fluid p-0" style="background-color:#ffffff;">
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
                    <a class="nav-link" href="">PRODUCT LISTING</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">ABOUT US</a>
                  </li>
                </ul>
              <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="..\E-commerce\cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                </li>
                <li class="nav-item" style="margin-right:10px">
                    <a class="nav-link" href="#">Total Price:<?php total_cart_price()?></a>
                </li>
                <li class="nav-item">
                  <form class="d-flex" action="..\E-commerce\search_product.php" method="get" role="search">
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
</header>
<body style="background-image: url('../assets/lbg.jpg');
">
<pre> </pre>
    <h1 style="color: #ffffff; text-align: center; margin-bottom: 30px; text-decoration-line: bold; background-color: #8c989a;padding: 15px; border-radius: 10px;">LIST YOUR PRODUCTS WITH US</h1>
    <div class="container" style="width:700px;">
        <form action="" method="post" id="productForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="contactName">Name:</label>
                <input type="text" id="contactName" name="contactName" required>
            </div>
            <div class="form-group">
                <label for="contactNumber">Contact Number:</label>
                <input type="text" id="contactNumber" name="contactNumber" required>
            </div>
            <div class="form-group">
                <label for="contactEmail">Email:</label>
                <input type="email" id="contactEmail" name="contactEmail" required>
            </div>
            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="productName" required>
            </div>
            <div class="form-group">
                <label for="productDescription">Product Description:</label>
                <textarea id="productDescription" name="productDescription" required></textarea>
            </div>
            <div class="form-group">
                <label for="productCategory">Product Category:</label>
                <select id="productCategory" name="productCategory" required>
                    <option value="">Select Category</option>
                    <option value="Self Care">Self Care</option>
                    <option value="Counselling">Counselling</option>
                    <option value="Books">Books</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="productImage">Product Image:</label>
                <input type="file" id="productImage" name="productImage" accept="image/*" required>
            </div>
            <button name="list_product" type="submit">Submit</button>
        </form>
    </div>
    <footer>
        <iframe src="..\includes\footer.html" width="100%" height="400" frameborder="0" title="Footer"></iframe>
    </footer>
     <!--bootstrap js link-->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php
  if(isset($_POST['list_product'])){
      $vendor_name=$_POST['contactName'];
      $vendor_contact=$_POST['contactNumber'];
      $vendor_email=$_POST['contactEmail'];
      $pl_name=$_POST['productName'];
      $pl_desc=$_POST['productDescription'];
      $pl_category=$_POST['productCategory'];
      //accessing image
  
      $pl_image=$_FILES['productImage']['name'];
      //accessing image temp name
      $temp_image=$_FILES['productImage']['tmp_name'];

      //checking empty condition
      if ($vendor_name== '' or $vendor_contact=='' or $vendor_email=='' or $pl_name=='' or $pl_desc=='' or $pl_category=='' or $pl_image==''){
          echo "<script>alert('Please fill all fields')</script>";
          exit();
      }else{
          move_uploaded_file( $temp_image,"product_listing_img/$pl_image");

          //inserting into table
      $list_products="INSERT INTO `product_listing` (vendor_name, vendor_contact, vendor_email, pl_name, pl_desc, pl_category,pl_image) values ('$vendor_name','$vendor_contact','$vendor_email','$pl_name','$pl_desc','$pl_category','$pl_image')";
      $result_query=mysqli_query($con, $list_products);
      if($result_query) {
          echo "<script> alert('Product listed successfully! Our team shall verify the product and reach back to you shortly') </script>";
      }
  }}
?>

