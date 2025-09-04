<?php

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];

    // Check if a new file is uploaded
    if (!empty($_FILES['file']['name'])) {
        $file = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $path = 'upload/' . $file;
        move_uploaded_file($tmp_name, $path);
        $update = "UPDATE ajaxx SET username='$name', gender='$gender', email='$email', profile='$file' WHERE id='$id'";
    } else {
        $update = "UPDATE ajaxx SET username='$name', gender='$gender', email='$email' WHERE id='$id'";
    }

    $result = mysqli_query($conn, $update);
    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
}
?>