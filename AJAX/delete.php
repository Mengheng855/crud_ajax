<?php
  include 'conn.php';
  if(isset($_POST['delete'])){
    $id=$_POST['delete'];
    $delete="DELETE FROM ajax where id='$id'";
    $rs=mysqli_query($conn,$delete);
    if($rs){
        header('location: table.php');
    }
  }

?>