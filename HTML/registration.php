<!DOCTYPE html>
<html>

<head>
  <title>Registration Page</title>
  <link rel="stylesheet" href="../CSS/style.css">
  <script src="https://kit.fontawesome.com/31314cf2fa.js" crossorigin="anonymous"></script>
<script>
  function validateForm() {
    var email = document.forms["userForm"]["email"].value;
    var phoneNumber = document.forms["userForm"]["phoneNumber"].value;
  
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var phonePattern = /^(\+\d{1,3}\s?)?\d{10,}$/;
  
    if (!emailPattern.test(email)) {
      alert("Please enter a valid email address.");
      return false;
    }
  
    if (!phonePattern.test(phoneNumber)) {
      alert("Please enter a valid phone number.");
      return false;
    }
  }
</script>
</head>

<body>
<?php include 'header.php'?>
  <div class="form-container">
    <h2>Registration</h2>


    <form action="../backend/user_registration.php" method="post" name="userForm" onsubmit="return validateForm()">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="address">Address:</label>
      <input type="text" id="address" name="address" required>

      <label for="gender">Gender:</label>
      <select id="gender" name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>

      <label for="contact">Contact Number:</label>
      <input type="text" id="contact" name="contact" required maxlength="10" minlength="10">

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required minlength="6">

      <input type="submit" value="Register" name="submit">
    </form>
  </div>

</body>

</html>