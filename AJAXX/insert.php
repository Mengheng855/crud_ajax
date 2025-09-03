<?php
include 'conn.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    
    // Check for duplicate email
    $check_email_sql = "SELECT id FROM ajaxx WHERE email = '$email'";
    $result = mysqli_query($conn, $check_email_sql);
    
    if (mysqli_num_rows($result) > 0) {
        // Email already exists, send an error message back to AJAX
        echo "Error: This email already exists.";
        exit;
    }

    $file = '';
    
    // Process file upload if it exists
    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $file = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $path='upload/'.$file;
        move_uploaded_file($tmp_name,$path);
    }
    
    $insert="INSERT INTO ajaxx (username,gender,email,profile) VALUES ('$name','$gender','$email','$file')";
    $rs=mysqli_query($conn,$insert);
    
    if ($rs) {
        // If insert is successful, return the new ID
        $last_id = mysqli_insert_id($conn);
        echo $last_id;
    } else {
        // If there's an insert error for another reason, show it
        echo "Error: " . mysqli_error($conn);
    }
}
?>