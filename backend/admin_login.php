<?php
include "connection.php";
session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select_query="SELECT email,password FROM admins where email='$email'AND password='$password'";
    $query = mysqli_query($con, $select_query);
    $rows=mysqli_num_rows($query);

    if($rows==1){
       $_SESSION['admin']=true;
       header('location:../HTML/admin_panel.php');
    }

    else{
        $message= "Invalid Login Credential";
        header('location:../HTML/admin_login.php?message='.urlencode($message));
    }
}

?>