<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SpectriX</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    <script src="customer/addToCart.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  
</head>

<body>
  <?php include 'includes/navbar.php'; ?>

  <!--HERO SECTION-->
  <section>
    <div class="hero-section">
      <div class="content">
        <h1>Welcome to <span class="sitetitle">SpectriX.</span></h1>
        <p>
          We love <b>mechanical keyboards</b>. Our store offers top-quality keyboards for everyone.
          Whether you're new to this or a big fan, we've got something great for you.
          Check out our collection and find your perfect keyboard at <b>SpectriX.</b>
        </p>
        <a href="collections.php"><button class="dark-btn">View Collection</button></a>
      </div>
    </div>
  </section>

  <!--FEATURED COLLECTION SECTION-->
  <section>
    <div class="collections">

      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card"
            style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8)),url(img/ergo-collection.png);background-size:cover; background-repeat: no-repeat; background-position: center;">
            <div class="card-body">
              <h5 class="card-title">Ergonomic Collection</h5>
              <p class="card-text">Explore enhanced comfort and productivity with our range of ergonomic
                keyboards, meticulously designed for a healthier and more efficient typing experience.
              </p>
              <a href="collections.php"><button class="light-btn">View Collection</button></a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card"
            style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8)),url(img/gaming-collections.png);background-size:cover; background-repeat: no-repeat; background-position: center;">
            <div class="card-body">
              <h5 class="card-title">Gaming Collection</h5>
              <p class="card-text">Explore a diverse selection of gaming keyboards, each with
                unique tactile precision and customizable features for your ultimate gaming victory.</p>
              <a href="collections.php"><button class="light-btn">View Collection</button></a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card"
            style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8)),url(img/productivity-collections.png);background-size:cover; background-repeat: no-repeat; background-position: center;">
            <div class="card-body">
              <h5 class="card-title">Productivity Collection</h5>
              <p class="card-text">Optimize your work output using our purpose-geared productivity
                keyboards, finely crafted for precision, ensuring a smooth and efficient workflow.</p>
              <a href="collections.php"><button class="light-btn">View Collection</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!--NEW ARRIVALS SECTION-->
  <section>
    <h2>NEW ARRIVALS</h2>
    <div class="new-arrivals">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card">
            <img src="img/ergo/DeluxGM902Wireless.jpg" class="card-img-top" alt="feat-1">
            <div class="card-body">
              <p class="card-category">ERGONOMIC</p>
              <h5 class="card-title">Delux GM902</h5>
              <p class="card-text">₱7,395.00</p>
              <a href="keyboards.php"><button class="light-btn">View</button></a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="img/gaming/keychronk14.jpg" class="card-img-top" alt="feat-2">
            <div class="card-body">
              <p class="card-category">GAMING</p>
              <h5 class="card-title">Keychron K14</h5>
              <p class="card-text">₱4,390.00</p>
              <a href="keyboards.php"><button class="light-btn">View</button></a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="img/productivity/LogitechMXKeys.jpg" class="card-img-top" alt="feat-3">
            <div class="card-body">
              <p class="card-category">PRODUCTIVITY</p>
              <h5 class="card-title">Logitech MX Keys</h5>
              <p class="card-text">₱6,396</p>
              <a href="keyboards.php"><button class="light-btn">View</button></a>
            </div>
          </div>
        </div>

      </div>
    </div>
    <center style="margin-top: -30px; margin-bottom: 50px;"><a href="keyboards.php"><button class="dark-btn">View All
          Products</button></a>
  </section>

  <!--TESTIMONIALS SECTION-->
  <section>
    <div class="testimonials">
      <h2>WHAT THE CLIENTS ARE SAYING</h2>
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner py-5 text-center">
          <div class="carousel-item active">
            <i class="bi bi-chat-right-quote fs-1 text-danger"></i>
            <figure class="text-cent col-md-6 offset-md-3 mt-4">
              <img src="img/testimonials/1.jpg"
                style="width: 80px; height: 80px; border-radius: 80px; margin-bottom: 15px;">
              <blockquote class="blockquote">
                <p>"The ErgoMaster Pro X1000 exceeded all my expectations. The ergonomic design and the tactile feedback
                  are outstanding.
                  It's a dream to type on for long hours. The split layout significantly reduced my wrist strain.
                  Gaming or working, this keyboard is a game-changer!"</p>
              </blockquote>
              <figcaption class="blockquote-footer mt-2">JohnDoe87</figcaption>
            </figure>
          </div>
          <div class="carousel-item">
            <i class="bi bi-chat-right-quote fs-1 text-danger"></i>
            <figure class="col-md-6 offset-md-3 mt-4">
              <img src="img/testimonials/2.jpg"
                style="width: 80px; height: 80px; border-radius: 80px; margin-bottom: 15px;">
              <blockquote class="blockquote">
                <p>"The ProductiXpert Elevation Z900 is a productivity powerhouse. Its silent keys and responsive
                  touchpad make it ideal for office environments.
                  The built-in macros and hotkeys are a productivity boon, streamlining my workflow. A must-have for
                  anyone seeking enhanced productivity." </p>
              </blockquote>
              <figcaption class="blockquote-footer mt-2">WorkingWiz007</figcaption>
            </figure>
          </div>
          <div class="carousel-item">
            <i class="bi bi-chat-right-quote fs-1 text-danger"></i>
            <figure class="col-md-6 offset-md-3 mt-4">
              <img src="img/testimonials/3.jpg"
                style="width: 80px; height: 80px; border-radius: 80px; margin-bottom: 15px;">
              <blockquote class="blockquote">
                <p>"The StealthForce RGB-500 is a true marvel! The RGB lighting is mesmerizing and customizable. The
                  mechanical switches offer precision and rapid response,
                  providing an edge in competitive gaming. Its durable construction ensures top performance even after
                  rigorous use. A great addition to any gamer's arsenal."</p>
              </blockquote>
              <figcaption class="blockquote-footer mt-2">GamerGal23</figcaption>
            </figure>
          </div>
        </div>
      </div>
  </section>


  <!--NEWSLETTER SECTION-->
  <section id="newsletter">
    <div class="newsletter-container">
      <div class="newsletter">
        <div class="newsletter-content">
          <h2>Subscribe to our Newsletter</h2>
          <p>Stay in the loop with the latest updates,
            special offers, and exclusive content.
            <br>Subscribe to our newsletter and join
            the SpectriX community today!
          </p>
          <form class="newsletter-form" method="post">
            <div class="form-group"><input class="newsletter-signup" type="email" name="email" placeholder="Your Email">
            </div>
            <div class="form-group"><button class="dark-btn" type="button">Subscribe</button></div>
          </form>
        </div>
      </div>

    </div>
  </section>
  <script src="script.js"></script>
  <?php include 'includes/footer.php'; ?>

  </main>
</body>

</html>