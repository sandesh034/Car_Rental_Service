<html lang="en">

<head>
  <title>Cars</title>
  <link rel="stylesheet" href="../CSS/style.css">
  <script src="https://kit.fontawesome.com/31314cf2fa.js" crossorigin="anonymous"></script>
  <script>
    function confirmSubmission(carid) {
      var number = prompt("Please enter a duration in days:");
      if (number !== null && number.trim() !== "") {
        var url = "../backend/car_booking.php?carid=" + carid + "&number=" + encodeURIComponent(number);
        location.href = url;
      }
      return false;
    }
  </script>
</head>

<body>
  <?php include 'header.php' ?>
  <form>
    <div class="search-box">

      <input type="text" placeholder="Search cars by make..." name="search" value="<?php if (isset($_GET['search'])) {$_GET['search'];} ?>">
      <button type="submit">Search</button>

    </div>
  </form>



  <section class="product-section">
    <h2>Featured Products</h2>
    <h3 style="color:red;">***you need to login to book the car***</h3>

    <div class="product-container">

      <?php
      include "../backend/connection.php";
      if (!isset($_GET['search'])) {
        $sql = "SELECT * FROM cars";
        $query = mysqli_query($con, $sql);

        while ($result = mysqli_fetch_array($query)) {
      ?>
          <div class="product">
            <img src="<?php echo $result['pic']; ?>" alt="Product">
            <h3><?php echo $result['make']; ?></h3>
            <p>Awesome car from Ezy Rentals</p>
            <span class="price">Price $<?php echo $result['price_per_day']; ?></span>
            <a href="../backend/car_booking.php" class="btn" onclick="return confirmSubmission(<?php echo $result['id']; ?>)">BOOK</a>
          </div>


        <?php
        }
      } else {
        $filter_value = $_GET['search'];
        $sql = "SELECT * FROM cars where cars.make='$filter_value'";
        $query = mysqli_query($con, $sql);

        while ($result = mysqli_fetch_array($query)) {
        ?>
          <div class="product">
            <img src="<?php echo $result['pic']; ?>" alt="Product">
            <h3><?php echo $result['make']; ?></h3>
            <p>Awesome car from Ezy Rentals</p>
            <span class="price">Price $<?php echo $result['price_per_day']; ?></span>
            <a href="../backend/car_booking.php" class="btn" onclick="return confirmSubmission(<?php echo $result['id']; ?>)">BOOK</a>
          </div>


      <?php
        }
      }
      ?>
    </div>
  </section>

  <?php include 'footer.php' ?>
</body>

</html>