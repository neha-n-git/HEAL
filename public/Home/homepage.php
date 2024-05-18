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
    <title>Home Page</title>
    <link rel="stylesheet" href="homepage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--fontawesome(?)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--style-->
    <style>
      .text .button{
          padding: 10px 20px;
          background-color: #10563e;
          color: #fff;
          border: none;
          border-radius: 4px; 
          cursor: pointer;
          font-size: 16px;
          margin-top: 25px; 
          margin-left: 200px;
          text-decoration: none;
      }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg ">
          <div class="container-fluid">
              <a class="navbar-brand" href="homepage.php">
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
<section>
    <div class="content">
        <div class="image">
            <img src="..\assets\Welcome.png" alt="Image">
        </div>
        <div class="text">
          <?php
            if(isset($_SESSION['username'])){
              echo "<h2>Welcome to Our<br> Website,".$_SESSION['username']."</h2>";
            }else{
              echo "<h2>Welcome to Our<br> Website,User</h2>";
            }
          ?>
            <p>“Be the best version of yourself”<br/>Heal helps improve the quality of mind through resources that help personal well-being</p><br>
            <a href="..\AboutUs\about.php" class="button">Learn More</a> 
        </div>
        </section>
        <section class="image-section">
            <div class="heading">
            <p>FIRST TIME WITH US?</p>
            <hr>
        </div>
            <div class="image-wrapper">
                <img src="..\assets\eg1.png" alt="Image 1">
                <div class="description">
                    <h3>VISIT OUR SHOP</h3>
                    <p>Welcome to our shop, where you can discover a wide range of high-quality products carefully curated to meet your needs. From skincare essentials to wellness products, we offer a diverse selection to cater to various preferences and lifestyles. Whether you're looking for organic face serums, soothing aromatherapy blends, or luxurious bath essentials, our shop has something for everyone. Explore our collection and embark on a journey to enhance your well-being and nurture your body and mind..</p>
                </div>
            </div>
            <div class="image-wrapper">
                <img src="../assets/eg2.png" alt="Image 2">
                <div class="description">
                    <h3>CONSULT A COUNSELLOR</h3>
                    <p>At Meet Counsellors, we believe in the power of professional guidance and support to navigate life's challenges. Our platform connects you with experienced and compassionate counsellors who are dedicated to helping you achieve mental wellness and personal growth. Whether you're struggling with stress, anxiety, relationship issues, or other concerns, our counsellors are here to listen, support, and guide you towards positive change. Take the first step towards a happier and healthier life by scheduling a session with one of our qualified counsellors today.</p>
                </div>
            </div>
            <div class="image-wrapper">
                <img src="../assets/eg3.png" alt="Image 3">
                <div class="description">
                    <h3>A NEW ENTREPRENEUR?</h3>
                    <p>Are you a creator or entrepreneur with unique products to share with the world? List Your Products is your gateway to showcasing your creations and reaching a wider audience. Whether you're an artisan crafting handmade goods, a wellness practitioner offering natural remedies, or a small business owner with innovative products, our platform provides you with the opportunity to present your offerings to discerning customers who appreciate quality and authenticity. Join our community of sellers and start sharing your passion with the world today.</p>
                </div>
            </div>
        </section>
        <div class="heading">
            <hr>
            <p>BEST SELLERS</p>
            <hr>
        </div>
        <section class="best-sellers">
            <div class="slider">
                <div class="slide">
                    <img src="../assets/Liceria serum.jpg" alt="Product 1">
                    <div class="product-info">
                        <h3>Organic Face Serum</h3>
                        <p>Reveal radiant, youthful skin with our lightweight,<br>antioxidant-rich Organic Face Serum,<br>brimming with natural nourishment.</p>
                    </div>
                </div>
                <div class="slide">
                    <img src="../assets/wellness_journal.jpg" alt="Product 2">
                    <div class="product-info">
                        <h3>My Wellness Journal</h3>
                        <p>Personalized prompts and reflections <br>empower your journey to holistic well-being <br>in "My Wellness Journal". Just for you.</p>
                    </div>
                </div>
                <div class="slide">
                    <img src="../assets/laneige_waterbank.jpg" alt="Product 3">
                    <div class="product-info">
                        <h3>Laneige Skin Pack</h3>
                        <p>Achieve soft, hydrated skin with <br>Laneige's nourishing formula, <br>perfect for a radiant complexion day and night.</p>
                    </div>
                </div>
                <div class="slide">
                    <img src="../assets/pure_serum.jpg" alt="Product 4">
                    <div class="product-info">
                        <h3>Skin Care Kit</h3>
                        <p>Discover radiant skin with our <br>comprehensive kit: cleanser, toner, serum, moisturizer,<br> and sunscreen for a complete skincare regimen.</p>
                    </div>
                </div>
                <div class="slide">
                    <img src="../assets/breatherapy2.jpg" alt="Product 5">
                    <div class="product-info">
                        <h3>Sleep Aromatherapy</h3>
                        <p>Drift into peaceful slumber with our <br>Relax Sleep Aromatherapy, crafted to <br>soothe the mind and body effortlessly.</p>
                    </div>
                </div>
            </div>
        </section>
        
            <div class="navigation">
                <button class="prev">Prev</button>
                <button class="next">Next</button>
            </div>
        </section>
    </section>
    <div class="heading">
        <hr>
        <p>OUR REVIEWS</p>
        <hr>
    </div>
    <div class="rcontainer" style="background-image: url('../assets/cdetail.jpeg'); background-size: cover;">
        <div class="container__left">
          <h1>Read what our customers love about us</h1>
          <p>
            Over 200 companies frim diverse sectors consult us to enhance the
            user experience of their products and services.
          </p>
          <p>
            We have helped companies increase their customer base and generate
            multifold revenue with our service.
          </p>
        </div>
        <div class="container__right">
          <div class="card">
            <img src="../assets/user1.jpg" alt="user" />
            <div class="card__content">
              <span><i class="ri-double-quotes-l"></i></span>
              <div class="card__details">
                <p>
                    Thanks to Heal, I've experienced significant improvements in my health and well-being. Their expert guidance and support have been invaluable on my path to healing.</p>
                <h4>- Mary Stephen</h4>
              </div>
            </div>
          </div>
          <div class="card">
            <img src="../assets/user2.jpg" alt="user" />
            <div class="card__content">
              <span><i class="ri-double-quotes-l"></i></span>
              <div class="card__details">
                <p>
                    Heal's health services have been instrumental in my journey to healing. Their holistic approach and compassionate care truly made a difference.</p>
                <h4>- Kim Mingyu</h4>
              </div>
            </div>
          </div>
          <div class="card">
            <img src="../assets/user3.jpg" alt="user" />
            <div class="card__content">
              <span><i class="ri-double-quotes-l"></i></span>
              <div class="card__details">
                <p>
                    Heal's dedication to promoting health and healing is evident in every aspect of their services. I'm grateful for their expertise in helping me achieve optimal wellness.</p>
                <h4>- Jennifer Heo</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
        <section class="naturally-simple">
            <div class="heading">
                <hr>
                <p>GROW YOUR BUSINESS</p>
                <hr>
            </div>
            <div class="container">
                <p class="text-center">Looking to showcase your products to a wider audience? Look no further! Join our platform and list your products with us. Whether you're a small business owner, artisan, or entrepreneur, we provide a platform for you to reach potential customers and grow your brand. With our user-friendly interface and dedicated support team, getting started is easy. Simply sign up, create your product listings, and start connecting with buyers today. Don't miss out on the opportunity to expand your reach and boost your sales. List your products with us now</p>
            </div>
            <button><a href="../Listing/list.php" style="color:white; text-decoration: none;">Visit Page</a></button>
            <div class="landscape-photo">
                <img src="../assets/naturallysimple.jpg" alt="Landscape Photo">
            </div>
      
            <footer>
                <iframe src="../includes/footer.html" width="100%" height="500"  frameborder="0" title="Footer"></iframe>
              </footer>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
    const prevBtn = document.querySelector(".prev");
    const nextBtn = document.querySelector(".next");
    const slider = document.querySelector(".slider");

    prevBtn.addEventListener("click", function() {
        slider.scrollBy({
            left: -slider.offsetWidth,
            behavior: "smooth"
        });
    });

    nextBtn.addEventListener("click", function() {
        slider.scrollBy({
            left: slider.offsetWidth,
            behavior: "smooth"
        });
    });
});

        </script>
        <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
