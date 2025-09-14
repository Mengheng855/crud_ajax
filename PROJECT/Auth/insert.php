<?php
include '../conn.php';
include 'functionAlert.php';
if(isset($_POST['register'])){
    $username=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $file=$_FILES['file']['name'];
    $tmp_name=$_FILES['file']['tmp_name'];
    $path='upload/'.$file;
    move_uploaded_file($tmp_name,$path);
    $insert="INSERT INTO `tbl_user`(`username`, `email`, `password`, `profile`) VALUES ('$username','$email','$password','$file')";
    $query=mysqli_query($conn,$insert);
    if($query){
        echo alert("Register Successfully","You can login now ","success","login.php");
    }else{
        echo alert("Register Failed","Please try again later","error","register.php");
    }
}
?>