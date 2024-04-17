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
    <title>Counselors Catalog</title>
    <link rel="stylesheet" href="counsellor.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
</head>
<body>
    <header>
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
                        <a class="nav-link" href="#">COUNSELLING</a>
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
                      <li class="nav-item" style="margin-right:10px">
                          <a class="nav-link" href="#">Total Price:<?php total_cart_price()?></a>
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
    </header>
    <hr>
<h1>MEET OUR COUNSELLORS</h1>
<hr>
    <section class="counselors">
        <div class="container">
            <div class="counselor">
                <div class="counselor-box">
                    <img src="../assets/d0.jpeg" alt="Counselor 1" class="counselor-img">
                    <h2>Samantha Adams</h2>
                    <p class="qualification">Qualification: Marriage Counseling</p>
                    <p class="description">A seasoned psychologist with over two decades of experience, possesses a profound understanding of the complexities of the human mind and spirit.</p>
                    <button class="btn-primary" onclick="redirectToCounselorDetails(1)">Learn More</button>
                </div>
            </div>
            <div class="counselor">
                <div class="counselor-box">
                    <img src="../assets/d1.jpeg" alt="Counselor 1" class="counselor-img">
                    <h2>Michael Johnson</h2>
                    <p class="qualification">Qualification: Addiction Counseling</p>
                    <p class="description">A dedicated addiction counselor with a passion for helping individuals overcome substance abuse and reclaim their lives.</p>
                    <button class="btn-primary" onclick="redirectToCounselorDetails(2)">Learn More</button>
                </div>
            </div>
            <div class="counselor">
                <div class="counselor-box">
                    <img src="../assets/d2.jpeg" alt="Counselor 1" class="counselor-img">
                    <h2>Emily Davis</h2>
                    <p class="qualification">Qualification: Depression Counseling</p>
                    <p class="description">A compassionate counselor specializing in depression and mood disorders. With a background in clinical psychology, she provides evidence-based therapies tailored to each client's unique needs.</p>
                    <button class="btn-primary" onclick="redirectToCounselorDetails(3)">Learn More</button>
                </div>
            </div>
            <div class="counselor">
                <div class="counselor-box">
                    <img src="../assets/d3.jpeg" alt="Counselor 1" class="counselor-img">
                    <h2>David Martinez</h2>
                    <p class="qualification">Qualification: Family Therapy</p>
                    <p class="description">A seasoned family therapist dedicated to helping families navigate challenges and strengthen their relationships.</p>
                    <button class="btn-primary" onclick="redirectToCounselorDetails(4)">Learn More</button>
                </div>
            </div>
            <div class="counselor">
                <div class="counselor-box">
                    <img src="../assets/d4.jpeg" alt="Counselor 1" class="counselor-img">
                    <h2>Jessica Lee</h2>
                    <p class="qualification">Qualification: Anxiety Counseling</p>
                    <p class="description">A compassionate counselor specializing in anxiety disorders and stress management. With a background in mindfulness-based therapies and cognitive-behavioral techniques, she helps clients develop practical tools to manage their symptoms</p>
                    <button class="btn-primary" onclick="redirectToCounselorDetails(5)">Learn More</button>
                </div>
            </div>
            <div class="counselor">
                <div class="counselor-box">
                    <img src="../assets/d5.jpeg" alt="Counselor 1" class="counselor-img">
                    <h2>Ryan Smith</h2>
                    <p class="qualification">Qualification: Trauma Counseling</p>
                    <p class="description">A compassionate trauma counselor dedicated to supporting individuals on their healing journey. With a background in trauma-informed care and EMDR therapy, he helps clients process past experiences and develop resilience in the face of adversity.</p>
                    <button class="btn-primary" onclick="redirectToCounselorDetails(6)">Learn More</button>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <iframe src="../includes/footer.html" width="100%" height="500" frameborder="0" title="Footer"></iframe>
      </footer>
     <!--bootstrap js link-->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function redirectToCounselorDetails(counselorId) {
    window.location.href = `cdetails.php?id=${counselorId}`;
}

</script>
</body>
</html>
