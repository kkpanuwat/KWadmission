<?php
    include "../connectDB/connectDB.php";
    if(isset($_GET)){
        $person_id = $_GET["student"];
        
        $sql = "SELECT * FROM student WHERE id_card = '$person_id'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
            $level = $row['education_level'];
            $level2="";
            if($level=="M1"){
                $level2="มัธยมศึกษาปีที่ 1";
            }
            else if($level=="M4"){
                $level2="มัธยมศึกษาปีที่ 4";
            }
            echo '<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >
            '.$row["fname"]." ".$row["lname"]." ".$level2.'
            </div>
            <div id="level_std" style="display: none;">'.$level.'</div>';
        }  
    }
