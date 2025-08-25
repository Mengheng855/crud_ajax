<?php
include 'conn.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $location=$_POST['province'];
    $phone_num=$_POST['phone_number'];
    $position=$_POST['position'];
    $salary=$_POST['salary'];
    $file=$_FILES['file']['name'];
    $tmp_name=$_FILES['file']['tmp_name'];
    $path='image/'.$file;
    move_uploaded_file($tmp_name,$path);
    $insert="INSERT INTO ajax (name,email,location,phone_number,position,salary,image) VALUES ('$name','$email','$location','$phone_num','$position','$salary','$file')";
    $rs=mysqli_query($conn,$insert);
    
    $select_id="SELECT id FROM ajax ORDER BY ID DESC LIMIT 1";
    $ex=mysqli_query($conn,$select_id);
    $id=mysqli_fetch_assoc($ex)['id'];
    echo $id;
}

?>