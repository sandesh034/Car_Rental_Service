<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Hire | Homepage</title>
  <link rel="stylesheet" href="../CSS/style.css">
  <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
  <script src="https://kit.fontawesome.com/31314cf2fa.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php include 'header.php' ?>

  <main>
    <section>
      <div class="hero_section">
        <div class="hero_left">
          <p>Find the Perfect <span class="name">Cars</span></p>
          <p>We Offer the best</p>
          <p><span id="element" class="name"></span></p>
          <script>
            var typed = new Typed('#element', {
              strings: ['Luxuary Cars', 'Family Cars', 'Sports Car'],
              typeSpeed: 100,
              loop: true

            });
          </script>

        </div>
        <div class="hero_right">
          <img src="..//Image/hero_img.png" alt="" srcset="">
        </div>
      </div>

    </section>
  </main>

  <section class="services">
    <div class="container">
      <h2>Our Services</h2>
      <div class="service">
        <img src="../Image/car1.jpeg" alt="Car 1">
        <h3>Economy Cars</h3>
        <p>Get affordable and fuel-efficient cars for your daily commute.</p>
      </div>
      <div class="service">
        <img src="../Image/car2.jpeg" alt="Car 2">
        <h3>Luxury Cars</h3>
        <p>Experience ultimate comfort and style with our luxury car collection.</p>
      </div>
      <div class="service">
        <img src="../Image/car3.jpeg" alt="Car 3">
        <h3>Family Cars</h3>
        <p>Explore spacious and reliable cars for your family trips.</p>
      </div>
    </div>
  </section>

  <section class="about">
    <div class="container">
      <h2>About Us</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua.</p>
      <a href="#" class="btn">Learn More</a>
    </div>
  </section>

  <?php include 'footer.php' ?>
</body>

</html>