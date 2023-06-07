<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="../CSS/admin_panal.css">
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const sidebarLinks = document.querySelectorAll('.sidebar-link');
      const contentSections = document.querySelectorAll('.content-section');

      sidebarLinks.forEach((link, index) => {
        link.addEventListener('click', function(e) {
          e.preventDefault();

          // Remove active class from all links
          sidebarLinks.forEach(link => link.classList.remove('active'));

          // Add active class to the clicked link
          this.classList.add('active');

          // Hide all content sections
          contentSections.forEach(section => section.style.display = 'none');

          // Show the corresponding content section
          contentSections[index].style.display = 'block';
        });
      });
    });
  </script>
</head>
<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header('location:admin_login.php');
}

?>

<body>
  <div class="container">
    <nav class="sidebar">
      <div class="company-info">
        <img src="../Image/elon.jpg" alt="Company Logo" class="company-logo">
        <h2 class="company-name">Ezy Rentals</h2>
      </div>
      <ul class="sidebar-nav">


        <li class="sidebar-item">
          <a href="#" class="sidebar-link">
            <i class="fa fa-dashboard"></i>
            <span class="sidebar-text">Dashboard</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a href="#" class="sidebar-link">
            <i class="fa fa-users"></i>
            <span class="sidebar-text">Users</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a href="#" class="sidebar-link">
            <i class="fa fa-plus"></i>
            <span class="sidebar-text">Add Car</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a href="#" class="sidebar-link">
            <i class="fa fa-multiply"></i>
            <span class="sidebar-text">Delete Car</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a href="#" class="sidebar-link">
            <i class="fa fa-file"></i>
            <span class="sidebar-text">Reports</span>
          </a>
        </li>



      </ul>
    </nav>
    <div class="content">

      <!-- content of user table -->
      <section class="content-section">
        <h1>Dashboard</h1>
        <p>This is the dashboard section.</p>
      </section>
      <section class="content-section">
        <h1>Users</h1>
        <table class="striped-table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Address</th>
              <th>Gender</th>
              <th>Contact</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include "../backend/connection.php";

            $sql = "SELECT * FROM users";
            $result = mysqli_query($con, $sql);

            while ($rows = mysqli_fetch_array($result)) {
            ?>
              <tr>
                <td><?php echo $rows['name']; ?></td>
                <td><?php echo $rows['address']; ?></td>
                <td><?php echo $rows['gender']; ?></td>
                <td><?php echo $rows['contact']; ?></td>
                <td><?php echo $rows['email']; ?></td>
              </tr>
            <?php
            }
            ?>

          </tbody>
        </table>
      </section>

      <!-- user table  ends and add car page starts-->
      <section class="content-section">
        <div class="form-container">
          <h2>Car Registration</h2>

          <form action="../backend/car_registration.php" method="post" enctype="multipart/form-data">
            <label for="make">Make:</label>
            <input type="text" id="make" name="make" required>

            <label for="model">Model:</label>
            <input type="text" id="model" name="model" required>

            <label for="color">Color:</label>
            <input type="text" id="color" name="color" required>

            <label for="price">Price (Per Day):</label>
            <input type="text" id="price" name="price" required>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" required style="margin-bottom: 15px;">

            <input type="submit" value="Add" name="add">
          </form>
        </div>
      </section>

      <!--add car section ends and delete car section starts-->

      <section class="content-section">
        <h1>Delete Car</h1>

        <table class="striped-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Make</th>
              <th>Model</th>
              <th>Color</th>
              <th>Price</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include "../backend/connection.php";

            $sql = "SELECT * FROM cars";
            $result = mysqli_query($con, $sql);

            while ($rows = mysqli_fetch_array($result)) {
            ?>
              <tr>
                <td><?php echo $rows['id']; ?></td>
                <td><?php echo $rows['make']; ?></td>
                <td><?php echo $rows['model']; ?></td>
                <td><?php echo $rows['color']; ?></td>
                <td><?php echo $rows['price_per_day']; ?></td>
                <td><a href="../backend/delete_car.php?id=<?php echo $rows['id']; ?>"><button class="delete-button">Delete</button></a></td>
              </tr>
            <?php
            }
            ?>

          </tbody>
        </table>
      </section>

      <!-- delete section ends and report section starts-->
      <section class="content-section">
        <center>
          <h1>Booking Details</h1>
        </center>
        <?php
        $select = "SELECT booking.id,booking.duration,users.name, users.address, users.contact, cars.make,cars.model,cars.color,cars.pic,cars.price_per_day
        FROM booking
        JOIN users ON booking.user_id = users.id
        JOIN cars ON booking.car_id = cars.id;
        ";
        $query = mysqli_query($con, $select);

        while ($result = mysqli_fetch_array($query)) {
        ?>
          <div class="report-card-container">
            <div class="report-card">
              <img src="<?php echo $result['pic']; ?>" alt="Image" class="report-img">
              <div class="report-description">
                <div class="report-left-column">
                  <div class="report-description-row">
                    <p class="report-label"><i class="fas fa-user report-icon"></i>Name:</p>
                    <p class="report-value"><?php echo $result['name']; ?></p>
                  </div>
                  <div class="report-description-row">
                    <p class="report-label"><i class="fas fa-phone report-icon"></i>Phone:</p>
                    <p class="report-value"><?php echo $result['contact']; ?></p>
                  </div>
                  <div class="report-description-row">
                    <p class="report-label"><i class="fas fa-map-marker-alt report-icon"></i>Address:</p>
                    <p class="report-value"><?php echo $result['address']; ?></p>
                  </div>
                  <div class="report-description-row">
                    <p class="report-label"><i class="fas fa-dollar-sign report-icon"></i>Price:</p>
                    <p class="report-value">$<?php echo ($result['duration']*$result['price_per_day']);?></p>
                  </div>
                </div>
                <div class="report-right-column">
                  <div class="report-description-row">
                    <p class="report-label"><i class="fas fa-car report-icon"></i>Make:</p>
                    <p class="report-value"><?php echo $result['make']; ?></p>
                  </div>
                  <div class="report-description-row">
                    <p class="report-label"><i class="fas fa-car report-icon"></i>Model:</p>
                    <p class="report-value"><?php echo $result['model']; ?></p>
                  </div>

                  <div class="report-description-row">
                    <p class="report-label"><i class="fas fa-palette report-icon"></i>Color:</p>
                    <p class="report-value"><?php echo $result['color']; ?></p>
                  </div>
                  <div class="report-description-row">
                    <p class="report-label"><i class="fas fa-clock report-icon"></i>Duration:</p>
                    <p class="report-value"><?php echo $result['duration']; ?> days</p>
                  </div>
                </div>
                <div>
                </div>

              </div>
            </div>
          </div>

        <?php
        }
        ?>
      </section>
      <!--  report section ends-->

    </div>
  </div>

  <!-- Include Font Awesome library -->
  <script src="https://kit.fontawesome.com/31314cf2fa.js" crossorigin="anonymous"></script>
</body>

</html>