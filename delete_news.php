<?php
    include "connectDB/connectDB.php";
    $id=$_GET["news_id"];
    $sql = "DELETE FROM news where news_id='$id'";
    $query_sql = mysqli_query($conn,$sql);
    if($query_sql){
        header('Location: index.php');
        
    }
    else{
        $msg = "ลบไม่สำเร็จ";
        echo $msg;
        echo "<br/><a href='index.php'>กลับ</a>";
    }
?>