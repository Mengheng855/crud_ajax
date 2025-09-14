<?php
include '../conn.php';
include './functionAlert.php';
session_start();
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select = "SELECT email, is_admin,profile FROM tbl_user 
                     WHERE email='$email' AND password='$password'";
    $exe = $conn->query($select);
    if($user = mysqli_fetch_assoc($exe)){
        $_SESSION['login'] = true;
        $_SESSION['email'] = $user['email'];
        $_SESSION['role']  = $user['is_admin'];
        $_SESSION['profile']=$user['profile'];
        if($_SESSION['role'] == 1){
            alert("Login Successfully","Welcome Admin","success","../Backend/index.php");
        }else{
            alert("Login Successfully","Welcome User","success","../Frontend/frontend.php");
        }
    }else{
        echo 123;
    }
}
?>
