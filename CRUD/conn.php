<?php 
$server="localhost";
$username="root";
$pass="";
$db_name="test_ajax";

$conn=mysqli_connect("$server","$username","$pass","$db_name");
if($conn)
{
    // echo "Connection successful";
}
else
{
    echo "Connection failed";
}

?>