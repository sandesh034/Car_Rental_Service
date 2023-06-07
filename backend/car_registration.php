<?php

include "connection.php";

if (isset($_POST['add'])) {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    $file_type = $image['type'];

    // List of commonly used image types
    $allowed_types = array(
        'image/jpg',
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/bmp',
        'image/webp'
    );

    if ($image['error'] == 0) {
        if (in_array($file_type, $allowed_types)) {;
            $target_path = "../backend/upload/".$image['name'];

            if (move_uploaded_file($image['tmp_name'], $target_path)) {
                $insert_query = "INSERT INTO cars (make, model, color, price_per_day, pic) 
                VALUES ('$make', '$model', '$color', '$price', '$target_path')";

                $insert_query_run = mysqli_query($con, $insert_query);

                if ($insert_query_run) {
                    echo "Added Successfully";
                } else {
                    echo "Failed to add the car";
                }
            } else {
                echo "Failed to move the uploaded file. Please check directory permissions.";
            }
        } else {
            echo "Invalid file type. Only image files are allowed.";
        }
    } else {
        echo "File upload error: " . $image['error'];
    }
}
