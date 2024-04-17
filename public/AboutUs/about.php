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
    <title>ABOUT US</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <!--fontawesome(?)-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="about.css" rel="stylesheet"></link>
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
                    <a class="nav-link" href="">ABOUT US</a>
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
    <div class="mainimg">
        <div class="centered-box" style="text-align: center;">
            <img src="../assets/logo2.png" alt="logo">
            <h2 class="mt-3" style="font-size: 50px;">WHY HEAL?</h2>
            <p style="font-size: large;" >
                Healing is a deeply transformative process, encompassing both physical restoration and emotional renewal. It's a journey towards wholeness, where wounds, whether visible or hidden, are acknowledged and tended to with care and compassion. Healing involves not just the body, but also the mind and spirit, addressing the interconnectedness of our being. It requires patience, resilience, and a willingness to confront pain, allowing for growth and self-discovery along the way. Ultimately, healing is a testament to the remarkable capacity of the human spirit to overcome adversity and thrive in the face of challenges.</p>
        </div>
    </div>
    <h2 style="font-size: 50px; text-align: center; margin-top: 60px; text-decoration: none;">SERVICES OFFERED</h2>
    <section class="rounded-rectangles">
        <div class="rectangle">
        <div class="sha mt-" >HEAL</div>
          <img src="../assets/selfcare.jpg" alt="Image 1" class="rectangle-img">
          <div class="caption">Self Care Shop</div>
          <a href="..\E-commerce\shop.php" class="button">Visit Page</a>
        </div>
        <div class="rectangle">
         <div class="sha">HEAL</div>
          <img src="../assets/counsel.jpg" alt="Image 2" class="rectangle-img">
          <div class="caption">Counseling Sessions</div>
          <a href="..\Counselling\counsellor.php" class="button">Visit Page</a>
        </div>
        <div class="rectangle">
        <div class="sha">HEAL</div>
          <img src="../assets/business.jpg" alt="Image 3" class="rectangle-img">
          <div class="caption">Support Small Businesses</div>
          <a href="..\Listing\list.php" class="button">Visit Page</a>
        </div>
      </section>
      
      <div class="about-section">
        <div class="about-image">
            <img src="../assets/heal_illus.png" alt="Heal Illustration">
        </div>
        <div class="about-content">
            <h2 class="section-heading">The Quality of Life depends on the Quality of the Mind</h2>
            <p class="section-description">Our platform offers accessible mental health support, connecting individuals with certified counselors digitally. Inclusivity is key; everyone can both seek and offer assistance. Explore our curated marketplace for self-care and well-being products, fostering growth and connection. With a seamless blend of technology and aesthetics, Heal provides a holistic approach to well-being. Join us in cultivating a healthier mind and a brighter future.<br> <br>
                Our platform offers accessible mental health support, connecting individuals with certified counselors digitally. Inclusivity is key; everyone can both seek and offer assistance. Explore our curated marketplace for self-care and well-being products, fostering growth and connection. With a seamless blend of technology and aesthetics, Heal provides a holistic approach to well-being. Join us in cultivating a healthier mind and a brighter future.<br> <br>
                Our platform offers accessible mental health support, connecting individuals with certified counselors digitally. Inclusivity is key; everyone can both seek and offer assistance. Explore our curated marketplace for self-care and well-being products, fostering growth and connection. With a seamless blend of technology and aesthetics, Heal provides a holistic approach to well-being. Join us in cultivating a healthier mind and a brighter future.</p>
        </div>
    </div>
    
    <div class="testimonials-container">
        <div class="testimonial">
            <div class="testimonial-content">
                <img src="..\assets\quote.png" class="quote-icon" alt="Quote Icon">
                <p class="testimonial-text">Heal has been a game-changer for me. As someone who couldn't afford traditional therapy, having access to certified counselors online has been invaluable. It's comforting to know that help is just a click away whenever I need it.</p>
                <div class="testimonial-author">
                    <img src="../assets/d7.jpg" class="author-avatar" alt="Author Avatar">
                    <span class="author-name">-Sarah W.</span>
                    <div class="rating">
                        <img src="../assets/star.png" class="star-icon" alt="Star Icon">
                        <span class="rating-value">4.5</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonial">
            <div class="testimonial-content">
                <img src="..\assets\quote.png" class="quote-icon" alt="Quote Icon">
                <p class="testimonial-text">Heal has provided me with a user-friendly and secure platform to reach clients I couldn't have reached otherwise. It allows me to focus on what I do best – helping others. I'm proud to be part of this impactful community.</p>
                <div class="testimonial-author">
                    <img src="../assets/man.jpg" class="author-avatar" alt="Author Avatar">
                    <span class="author-name">-James L., Certified Counselor</span>
                    <div class="rating">
                        <img src="../assets/star.png" class="star-icon" alt="Star Icon">
                        <span class="rating-value">4.9</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<div class="team-section" style="background-image: url('../assets/leaf.jpg');">
    <h1 >PROJECT BY:</h1>
    <div class="row">
        <div class="team-member">
            <img src="../assets/bhagya.jpg" alt="Your Photo">
            <div class="member-details">
                <h3>BHAGYASREE ROY</h3>
                <p>ID: 2241256</p>
            </div>
            <div class="role-box">
                <p>Healing is a deeply transformative process, encompassing both physical restoration and emotional renewal. It's a journey towards wholeness, where wounds, whether visible or hidden, are acknowledged and tended to with care and compassion. Healing involves not just the body, but also the mind and spirit, addressing the interconnectedness of our being. It requires patience, resilience, and a willingness to confront pain, allowing for growth and self-discovery along the way. Ultimately, healing is a testament to the remarkable capacity of the human spirit to overcome adversity and thrive in the face of challenges.</p>
            </div>
        </div>
        <div class="team-member">
            <img src="../assets/Neha.jpg" alt="Her Photo">
            <div class="member-details">
                <h3>NEHA N</h3>
                <p>ID: 2241265</p>
            </div>
            <div class="role-box">
                <p> I view it as a revolutionary blend of mental health support and e-commerce convenience. HEAL isn't just a marketplace; it's a sanctuary for holistic well-being. Our goal is to provide a seamless experience where users can access therapy sessions, self-care products, and wellness resources all in one place. We aim to destigmatize mental health and empower individuals to prioritize their well-being. By leveraging technology and fostering a supportive community, HEAL is making a tangible impact on people's lives, one step at a time.HEAL is created to empower individuals on their journey to well-being.</p>
            </div>
        </div>
    </div>
</div>
<footer>
    <iframe src="../includes/footer.html" width="100%" height="500"  frameborder="0" title="Footer"></iframe>
</footer>
</body>
</html>