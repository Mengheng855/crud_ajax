<?php
include 'conn.php';
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $file = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $path='upload/'.$file;
    move_uploaded_file($tmp_name,$path);
    $update="UPDATE ajaxx SET username='$name', email='$email', gender='$gender', profile='$file' WHERE id='$id'";
    mysqli_query($conn,$update);
   

?>