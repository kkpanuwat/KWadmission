<?php include "connectDB/connectDB.php";
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <style>
        .loader {
            border: 16px solid #f3f3f3;
            /* Light grey */
            border-top: 16px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        h4 {
            position: relative;
            color: black;
            font-size: 2em
        }

        h4:before {
            content: attr(data-text);
            position: absolute;
            overflow: hidden;
            max-width: 20em;
            white-space: nowrap;
            color: #3498db;
            animation: loading 15s linear;
        }

        @keyframes loading {
            0% {
                max-width: 0;
            }
        }
    </style>
</head>

<body>
    <center>
        <div class="loader" style="margin-top: 17em"></div><br><br>
        <h4 data-text="กรุณารอสักครู่ระบบกำลังประมวลผล">กรุณารอสักครู่ระบบกำลังประมวลผล</h4>
    </center>
<?php
    $id_card=$_GET["person_id"];
    $sql="SELECT student.id_card from student where id_card='$id_card' ";
    $result = mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num>0){
        echo "<script>window.open('admission.php?msg=err','_self')</script>";
        exit();
    }
    else{



$date = date("m/d/Y");
date_default_timezone_set("Asia/Bangkok");
$y = date("h:i:sa");
$time = $date . " " . $y;

function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear เวลา $strHour:$strMinute";
}

    $a=DateThai($time);
    $fname=$_GET["fname"];
    $id_card = $_GET["person_id"];
    $birthday = $_GET["birthday"];
    $home_no =$_GET["home_no"];
    $group_no = $_GET["group_no"];
    $home =$_GET["home"];
    $sub_area =$_GET["sub_area"];
    $area = $_GET["area"];
    $province = $_GET["province"];
    $father = $_GET["father_name"];
    $monther = $_GET["mother_name"];
    $status_fam = "";
    $studen_type = $_GET["student"];
    $oldschool = "";
    $oldroom="none";
    $oldgpax=0;
    $oldstd_id="none";
    $tel = $_GET["tel"];
    $plans1="";
    $level = "";
    $post=$_GET["post"];
    $type_type_student="";
    $std_id_lod_school='none';
    $name_title = $_GET["name_title"];
    $lname = $_GET["lname"];
    $rooms="none";
    $oldprovince="none";
    if(!empty($_GET['status_fam'])){
        $n=0;
        foreach($_GET['status_fam'] as $check) {
            $n++;
        }
        if($n>1){
            $x=0;
            foreach($_GET['status_fam'] as $check) {
                if($x==($n-1)){
                    $status_fam=$status_fam.$check;
                    break;
                }
                else{
                    $status_fam=$status_fam.$check.",";
                }
                $x++;
            }
        }
        else{
            $status_fam=$check;
        }

    }

 
    if($studen_type == "1" || $studen_type=="2_2"){
        $oldschool = $_GET["old_school"];
        $oldprovince = $_GET["old_province"];
    }
    else{
        $oldgpax=$_GET["gpax"];
        $oldstd_id = $_GET["std_id_lod_school"];
        $oldschool = "none";
        $oldprovince = "none";
    }
    if($studen_type == "1"){
        $level="M1";
        $type_type_student="ชั้นมัธยมศึกษาปีที่ 1 ประเภทในเขตพื้นที่บริการและนักเรียนทั่วไป";
        $plans1=$_GET["plans1"];
        $rooms="none";
    }
    else{
        $level="M4";
        $plans1=$_GET["plans1"].",".$_GET["plans2"].",".$_GET["plans3"];
        if($studen_type=="2_1"){
           $type_type_student="ประเภทนักเรียนมัธยมศึกษาปีที่ 3 (นักเรียนเดิม)";
           $std_id_lod_school= $_GET['std_id_lod_school'];
           $rooms=$_GET["old_room"];
        }
        else{
            $type_type_student="ประเภทนักเรียนทั่วไป";
            $rooms="none";
        }
    }
        // $sql = "INSERT INTO student (id_card,fname,birthday,tel,education_level,school,GPAX,type_student) VALUES ('" . $id_card . "','" . $fname . "','" . $birthday . "','" . $tel . "','" . $level . "','" . $oldschool . "','" . $oldgpax . "','" . $studen_type. "')";
        // $result = mysqli_query($conn,$sql);
        // $sql ="INSERT INTO student(id_card) VALUES '".$id_card."'";
        // $result = mysqli_query($conn,$sql);
        
        $fname=$_GET["fname"];
        $sql ="INSERT INTO student(id_card,fname,birthday,tel,education_level,school,GPAX,lname,name_title) VALUES ('$id_card','$fname','$birthday','$tel','$level','$oldschool','$oldgpax','$lname','$name_title')";
        $r=mysqli_query($conn,$sql);

        $sql ="INSERT INTO parents(father,mother,statuss,id_card) VALUES ('$father','$monther','$status_fam','$id_card')";
        $r=mysqli_query($conn,$sql);
        

        $sql ="INSERT INTO application_form(date_form,student_id,id_card,type_student,plans,rooms,oldprovince) VALUES ('$a','$std_id_lod_school','$id_card','$type_type_student','$plans1','$rooms','$oldprovince')";
        $r=mysqli_query($conn,$sql);

        //ลืมทำpost
        $sql ="INSERT INTO addresss(house_no,village,village_no,sub_area,area,province,id_card,post) VALUES ('$home_no','$home','$group_no','$sub_area','$area','$province','$id_card','$post')";
        $r=mysqli_query($conn,$sql);

        // $sql ="INSERT INTO check_name(id_card,date_time) VALUES ('$id_card','$a')";
        // $r=mysqli_query($conn,$sql);

        $sql ="INSERT INTO examination_card(barcode_id,status_card) VALUES ('$id_card','00')";
        $r=mysqli_query($conn,$sql);
        $_SESSION["id_card"]=$id_card;
        $_SESSION["student_type"]=$studen_type;
        echo "<script>window.open('register_data.php','_self')</script>";
        
        // if($result){

        //     echo "<script>window.open('index.php','_self')</script>";
        // }
        // else{
        //     echo "error".$result;
        // }

        // ('$id_card','$fname','$birthday','$tel','$level','$oldschool','$oldgpax','$studen_type')

        // echo "<script>window.open('index.php','_self')</script>";
        // while($row=mysqli_fetch_array($result)){
        //     echo $row["id_card"];
        // }
    }


    ?>

</body>

</html>