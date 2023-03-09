<?php
    $conn=new mysqli("localhost","root","","kwpADMISSION");
    if($conn->connect_errno){
        echo "error";
        exit;
    }
    mysqli_set_charset($conn,"utf8");
?>