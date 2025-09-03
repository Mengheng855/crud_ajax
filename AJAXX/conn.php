<?php
    $server='localhost';
    $name='root';
    $pass='';
    $db='db-test';
    
    $conn=mysqli_connect($server,$name,$pass,$db);
    if($conn){
        // echo 123;
    }else{
        echo 321;
    }
?>