<?php
    include "connectDB/connectDB.php";
    session_start();
    $file_name=uniqid();
    $files = fopen("csv/".$file_name.".csv", "w");
    fputs($files, (chr(0xEF) . chr(0xBB) . chr(0xBF)));
    $topic=array("ลำดับ","รหัสประจำตัวประชาชน","คำนำหน้า","ชื่อ","สกุล","วันเกิด"
    ,"เบอร์โทรศัพท์","ระดับชั้น","ประเภทนักเรียน","บ้านเลขที่","หมู่ที่","บ้าน","ตำบล","อำเภอ","รหัสไปรษณีย์");
    fputcsv($files, $topic);
    if($_POST["position"]=="M1"){
        $m=$_POST["position"];
        $sql ="SELECT *
        FROM application_form
        INNER JOIN student ON student.id_card = application_form.id_card
        INNER JOIN parents ON parents.id_card = application_form.id_card
        INNER JOIN addresss ON addresss.id_card = parents.id_card 
        where education_level = '$m'
        ORDER BY education_level ASC
        ";
    }
    if($_POST["position"]=="M4"){
        $m=$_POST["position"];
        $sql ="SELECT *
        FROM application_form
        INNER JOIN student ON student.id_card = application_form.id_card
        INNER JOIN parents ON parents.id_card = application_form.id_card
        INNER JOIN addresss ON addresss.id_card = parents.id_card
        where education_level = '$m'
        ORDER BY education_level ASC
        ";
    }
    if($_POST["position"]=="ALL"){
        $sql ="SELECT *
        FROM application_form
        INNER JOIN student ON student.id_card = application_form.id_card
        INNER JOIN parents ON parents.id_card = application_form.id_card
        INNER JOIN addresss ON addresss.id_card = parents.id_card 
        ORDER BY education_level ASC
        ";
    }

    $result = mysqli_query($conn,$sql);
    $n=1;
    while($row=mysqli_fetch_array($result)){
        $num_id="";
        for($i=0;$i<=12;$i++){
            if($i==1 ||$i==5||$i==10||$i==12){
                $num_id.="-";
            }
            $num_id.=$row["id_card"][$i];
        }
        if($row["education_level"]=="M1"){
            $level ="มัธยมศึกษาปีที่ 1 ";
        }
        else{
            $level ="มัธยมศึกษาปีที่ 4 ";
        }
        $data=[];
        array_push($data,$n);
        array_push($data,$num_id);
        array_push($data,$row["name_title"]);
        array_push($data,$row["fname"]);
        array_push($data,$row["lname"]);
        array_push($data,"'".$row["birthday"]."'");
        array_push($data,"'".$row["tel"]."'");
        array_push($data,$level);
        array_push($data,$row["type_student"]);
        array_push($data,$row["house_no"]);
        array_push($data,$row["village_no"]);
        array_push($data,$row["village"]);
        array_push($data,$row["sub_area"]);
        array_push($data,$row["area"]);
        array_push($data,$row["post"]);
        fputcsv($files,$data);
        $n++;
    }
    fclose($files);
    echo "<script>window.open('csv/".$file_name.".csv"."','_self')</script>";
    echo "<script>window.open('dow_load_csv.php','_self')</script>";
    // echo uniqid();
?>