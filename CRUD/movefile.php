<?php
    include 'conn.php';
    if(isset($_FILES['file'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $file=$_FILES['file']['name'];
        $tmp_name=$_FILES['file']['tmp_name'];
        $path='upload/'.$file;
        $query="INSERT INTO tbl_testajax (name, email, password, image) VALUES ('$name', '$email', '$password', '$file')";
        $result=mysqli_query($conn,$query);
        
        if(move_uploaded_file($tmp_name,$path) && $result){
            // echo " uploaded successfully";

        }else{
            // echo " upload failed.";
        }


        $select_id="SELECT id FROM tbl_testajax ORDER BY id DESC LIMIT 1";
        $ex=mysqli_query($conn,$select_id);
        $id=$ex->fetch_assoc()['id'];
        echo $id;
    }
?>