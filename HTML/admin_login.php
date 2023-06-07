<?php
if (isset($_GET['message'])) {
    $alertMessage = $_GET['message'];
    echo "<script>alert('$alertMessage');</script>";
}

?>


<!DOCTYPE html>
<html>

<head>
  <title>Login Page</title>
  <link rel="stylesheet" href="../CSS/style.css">
  <script src="https://kit.fontawesome.com/31314cf2fa.js" crossorigin="anonymous"></script>
</head>

<body>
   <?php include 'header.php'?>
    <div class="form-container">
      <h2> Admin Login</h2>
      <center><h4>***login to access the admin panel***</h4></center>
      <form action="../backend/admin_login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login" name="submit">
      </form>
     <center>  <p>Not have an account ?<a href="./admin_registration.php">register here</a></p></center>
    </div>

</body>

</html>