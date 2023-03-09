<?php
    include "../connectDB/connectDB.php";
    if(isset($_GET["student"])){
        $th_scr = $_GET["scr_thai"];
        $en_scr = $_GET["scr_eng"];
        $math_scr = $_GET["scr_math"];
        $sci_scr = $_GET["scr_sci"];
        $social_scr = $_GET["scr_social"];
        $std_id = $_GET['student'];
        $level = $_GET['std_level'];
        $sql ="INSERT INTO student_score(id_card,th_scr,en_scr,math_scr,sci_scr,social_scr,std_level) VALUES ('$std_id','$th_scr','$en_scr','$math_scr','$sci_scr','$social_scr','$level')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "success";
        }
        else{
            echo "something went wrong!";
        }
    }
?>