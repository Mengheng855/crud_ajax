<?php
include 'conn.php';

    $id=$_POST['id'];
    $del="DELETE FROM ajaxx WHERE id=$id";
    $ex=mysqli_query($conn,$del);

    
?>
