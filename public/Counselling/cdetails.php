<?php
include('../functions/common_function.php');
include('../includes/connect.php');
@session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counselor Details</title>
    <link rel="stylesheet" href="cdetails.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
   
</head>
<body>
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg ">
      <div class="container-fluid">
          <a class="navbar-brand" href="..\Home\homepage.php">
            <img src="../assets/Logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            HEAL
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="..\E-commerce\shop.php">SHOP</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="counsellor.php">COUNSELLING</a>
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
                  <a class="nav-link" href="..\E-commerce\cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item()?></sup></a>
              </li>
              
              <pre>  </pre>
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
            <li class="nav-item">
            <?php
          if(isset($_SESSION['username'])){ //user signed in - session active
            echo "<li class='nav-item mx-3'>
            <a class='navlink' href='..\users_area\logout.php' style='color:red; text-decoration:none'>Logout</a>";
          }else{ //user not signed in
            echo "<li class='nav-item mx-3'>
            <a class='navlink' href='signin.php' style='color:green ; text-decoration:none'>Sign In</a>";
          }

          ?>
            </li>
        </ul>
    </nav>
   
    <div class="profile-container" style="background-image: url(../assets/cdetail.jpeg); background-size: cover;">
        <div class="profile">
          <img src="profile-image" alt="Counselor Image" class="profile-image">
            <div class="profile-details">
                <h1 class="profile-name">Counselor Name</h1>
                <p class="profile-specialization">Specialization: Specialization Name</p>
                <p class="profile-location">Location: Location Name</p>
            </div>
        </div>
        <div class="profile-description">
            <p>Description:</p>
        </div>
        <div class="map">
            <iframe width="600" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" 
            src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=%20bengaluru+(Location%20Details)&amp;t=k&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe> 
            <a href='https://www.acadoo.de/'>Masterarbeit schreiben lassen</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=a6cc9edf31de73b741a0b41039b534b816440409'></script>
        </div>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
    // Get the counselor ID from the URL query parameter
    const urlParams = new URLSearchParams(window.location.search);
    const counselorId = urlParams.get("id");

    // Fetch counselor data from the JSON file
    fetch("cdetails.json")
        .then(response => response.json())
        .then(data => {
            // Find the counselor with the matching ID
            const counselor = data.find(c => c.id === parseInt(counselorId));

            // Populate the HTML template with counselor data
            document.querySelector(".profile-image").src = counselor.image;
            document.querySelector(".profile-name").textContent = counselor.name;
            document.querySelector(".profile-location").textContent = "Location: " + counselor.location;
            document.querySelector(".profile-specialization").textContent = "Specialization: " + counselor.specialization;
            document.querySelector(".profile-description p").textContent = counselor.description;
        })
        .catch(error => console.error("Error fetching counselor data:", error));
});

      </script>
</body>
<footer>
    <iframe src="../includes/footer.html" width="100%" height="500" frameborder="0" title="Footer"></iframe>
  </footer>
</html>
