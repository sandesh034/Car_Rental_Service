<?php
session_start();
include "connection.php";

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if(!isset($_SESSION['uid'])){
 header('location:../HTML/login.php');
}
else{

if (isset($_GET['carid'])) {
    $carid = $_GET['carid'];
    $userid = $_SESSION['uid'];
    $duration=$_GET['number'];

    $insert_query = "INSERT INTO booking (user_id, car_id,duration) VALUES ('$userid', '$carid','$duration')";
    $insert_query_run = mysqli_query($con, $insert_query);

    if ($insert_query_run) {
        echo "Booked";
    } else {
        echo "Failed to book: " . mysqli_error($con);
    }
} else {
    echo "Car ID is missing.";
}
}
?>
