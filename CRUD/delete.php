<?php
include 'conn.php';
if(isset($_POST['delete_id'])){
    $id=$_POST['delete_id'];
    $delete="DELETE FROM tbl_testajax WHERE id='$id'";
    if($conn->query($delete)){
        echo "Record deleted successfully";
    }else{
        echo "Error deleting record: " . $conn->error;
    }
}
?>