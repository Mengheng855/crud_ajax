<?php
     if(isset($_POST['edit'])){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $location=$_POST['province'];
        $position=$_POST['position'];
        $salary=$_POST['salary'];
        $file=$_FILES['file']['name'];
        $tmp_name=$_FILES['file']['tmp_name'];
        $path='image/'.$file;
        move_uploaded_file($tmp_name,$path);
        $edit="UPDATE ajax  SET (name,email,location,phone_number,position,salary,image) 
        VALUES ('$name','$email','$location','$phone_number','$position','$salary',''$file')";
        $rs=mysqli_query($conn,$edit);
     }
?>