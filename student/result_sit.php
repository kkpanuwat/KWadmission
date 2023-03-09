<?php
    include "../connectDB/connectDB.php";
    if(isset($_GET['level'])){
        $ll="";
        if($_GET['level']=="edt_num_m1"){
            $ll = 'M1';
        }
        else if($_GET['level']=="edt_num_m4"){
            $ll = 'M4';
        }
        $number = $_GET['number'];
        $sql = "SELECT *
        FROM student
        JOIN student_score ON student.id_card = student_score.id_card
        WHERE std_level = '$ll'";
        $result = mysqli_query($conn,$sql);
        $str_content='<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">ผลลัพธ์<hr></div>';
        $n=1;
        $student=array('1'=>850,'2'=>250,'3'=>220,'4'=>560);
        while($row=mysqli_fetch_array($result)){
            // $str_content.='<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1">'.$n.'</div>';
            // $str_content.='<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">'.$row['id_card'].'</div>';
            // $str_content.='<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">'.$row['fname']." ".$row['lname'].'</div>';
            // $str_content.='<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">'.($row['th_scr']+$row['en_scr']+$row['math_scr']+$row['sci_scr']+$row['social_scr']).'</div>';
            // $str_content.='<div class="col-xl-2 col-lg-2 col-md-2 col-sm-1 col-2">คะแนน</div>';
            // $n++;
            $student[$row['id_card']]=($row['th_scr']+$row['en_scr']+$row['math_scr']+$row['sci_scr']+$row['social_scr']);
        }
        arsort($student);
        foreach($student as $x => $x_value) {
            $sql = "SELECT *
            FROM student
            JOIN student_score ON student.id_card = student_score.id_card
            WHERE std_level = '$ll'";
            $result = mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){
                if($row['id_card']==$x){
                    $str_content.='<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1">'.$n.'</div>';
                    $str_content.='<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">'.$row['id_card'].'</div>';
                    $str_content.='<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">'.$row['fname']." ".$row['lname'].'</div>';
                    $str_content.='<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">'.($row['th_scr']+$row['en_scr']+$row['math_scr']+$row['sci_scr']+$row['social_scr']).'</div>';
                    $str_content.='<div class="col-xl-2 col-lg-2 col-md-2 col-sm-1 col-2">คะแนน</div>';
                    $n++;
                }
                if($n==$number+1){
                    break;
                }
            }
            if($n==$number+1){
                break;
            }
            // $str_content.=$x."<br>";
        }
        echo ($str_content);
    }
