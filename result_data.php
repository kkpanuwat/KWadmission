<?php
include "connectDB/connectDB.php";
    if (isset($_POST)) {
        $file2 = pathinfo(basename($_FILES['file_result']['name']), PATHINFO_EXTENSION);
        echo $file2;
        if ($file2 != "") {
            $new_file_name = 'file' . uniqid() . "." . $file2;
            $file_path = "file/result";
            $upload_path = $file_path . "/" . $new_file_name;
            //echo $upload_path;
    
            //uploading
            $upload = move_uploaded_file($_FILES['file_result']['tmp_name'], $upload_path);
            if ($upload == FALSE) {
                echo "<script>window.open('index.php','_self')</script>";
                exit();
            }
            $pro_file = $new_file_name;
            $file3 = $pro_file;
        } 
        $sql = "UPDATE result set result_name = '$file3'";
        mysqli_query($conn,$sql);
        echo "<script>window.open('result.php','_self')</script>";
    
    }
?>