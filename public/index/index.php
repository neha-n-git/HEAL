<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Heal Landing Page</title>
  </head>
  <body>
    <header>
      <img src="../assets/Logo.png" alt="Logo" class="logo">
      <div>
          <a href="..\users_area\reg.php" class="rounded-button">Sign Up</a>
          <a href="..\users_area\signin.php" class="rounded-button">Log In</a>
      </div>
  </header>
    <div class="parallax__container">
      <img src="..\assets\bg-1.jpg" alt="parallax" />
      <img id="bg-2" src="..\assets\bg-2.png" alt="parallax" />
      <h1 id="title">H‎E‎A‎L</h1>
      <img id="bg-3" src="..\assets\bg-3.png" alt="parallax" />
    </div>
    <section class="about">
      <div class="image__gallary">
        <div class="image__card" id="image__card-1">
          <img src="..\assets\grid1.jpeg" alt="grid" />
        </div>
        <div class="image__card" id="image__card-2">
          <img src="..\assets\grid2.jpeg" alt="grid" />
        </div>
        <div class="image__card" id="image__card-3">
          <img src="..\assets\grid3.jpeg" alt="grid" />
        </div>
        <div class="image__card" id="image__card-4">
          <img src="..\assets\grid4.jpeg" alt="grid" />
        </div>
      </div>
      <div class="details">
        At HEAL, our mission is to be a beacon of support for mental health, 
        offering comprehensive solutions to promote emotional well-being. 
        Through personalized counseling sessions led by licensed professionals and innovative online platforms, 
        we aim to make mental health care accessible and destigmatized. 
        Our commitment extends beyond individual care to community education, 
        fostering a culture of understanding and empathy. HEAL is dedicated to not only addressing mental health challenges 
        but also creating a nurturing environment that encourages resilience and personal growth.
      </div>
    </section>
    <script>
      var title = document.getElementById("title");
      var bg_2 = document.getElementById("bg-2");
      var bg_3 = document.getElementById("bg-3");

      var image_card_1 = document.getElementById("image__card-1");
      var image_card_2 = document.getElementById("image__card-2");
      var image_card_3 = document.getElementById("image__card-3");
      var image_card_4 = document.getElementById("image__card-4");

      document.addEventListener("scroll", (event) => {
        var positionY = window.scrollY;

        title.style.fontSize = `${100 + positionY * 0.5}px`;

        bg_2.style.top = `-${positionY * 0.5}px`;
        bg_3.style.top = `-${positionY}px`;
        bg_3.style.scale = 1 + positionY * 0.001;

        image_card_1.style.transform = `translateY(${
          positionY * -0.5 + 400
        }px)`;

        image_card_2.style.transform = `translateY(${positionY * 0.1 + -50}px)`;

        image_card_3.style.transform = `translateY(${
          positionY * -0.1 + 100
        }px)`;

        image_card_4.style.transform = `translateY(${
          positionY * 0.2 + -125
        }px)`;

        var _newOpacity = positionY * 0.001;
        if (_newOpacity >= 0 && _newOpacity <= 1) {
          image_card_1.style.opacity = _newOpacity;
          image_card_2.style.opacity = _newOpacity;
          image_card_3.style.opacity = _newOpacity;
          image_card_4.style.opacity = _newOpacity;
        }
      });
    </script>
  <footer>
    <iframe src="..\includes\footer.html" width="100%" height="400" frameborder="0" title="Footer"></iframe>
  </footer>
  </body>
</html>