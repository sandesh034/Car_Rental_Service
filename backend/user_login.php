<?php
session_start();
include "connection.php";

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select_query="SELECT email,password FROM users where email='$email'AND password='$password'";
    $query = mysqli_query($con, $select_query);
    $rows=mysqli_num_rows($query);

    if($rows==1){
        $id_query="SELECT id from users where email='$email'";
        $id_query_run=mysqli_query($con,$id_query);
        $rows=mysqli_fetch_array($id_query_run);
        $_SESSION['uid']=$rows['id'];
        // echo $_SESSION['uid'];
       header('location:../HTML/index.php');
    }

    else{
        $message= "Invalid Login Credential";
        header('location:../HTML/login.php?message='.urlencode($message));
    }
}

?>