<?php

include "connection.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select_query = "SELECT email FROM admins where email='$email'";

    $select_query_run = mysqli_query($con, $select_query);

    if (mysqli_num_rows($select_query_run) > 0) {
        echo "<script>alert('Email Already Taken');</script>";
    } else {


        $insert_query = "INSERT INTO admins
    (name, address, gender, contact, email, password)
    VALUES ('$name', '$address', '$gender', '$contact', '$email', '$password')";

        $insert_query_run = mysqli_query($con, $insert_query);

        if ($insert_query_run) {
            $message = "Account Created Successfully";
            header('location:../HTML/admin_login.php?message=' . urlencode($message));
        } else {
            echo "Failed to add the admin";
        }
    }
}
