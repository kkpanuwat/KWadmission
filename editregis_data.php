<?php
include "connectDB/connectDB.php";

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


if($studen_type == "ชั้นมัธยมศึกษาปีที่ 1 ประเภทในเขตพื้นที่บริการและนักเรียนทั่วไป" || $studen_type=="ประเภทนักเรียนทั่วไป"){
    $oldschool = $_GET["old_school"];
    $oldprovince = $_GET["old_province"];
    $oldgpax="none";
}
else{
    $oldgpax=$_GET["gpax"];
    $oldstd_id = $_GET["std_id_lod_school"];
    $oldschool = "none";
    $oldprovince = "none";
}
if($studen_type == "ชั้นมัธยมศึกษาปีที่ 1 ประเภทในเขตพื้นที่บริการและนักเรียนทั่วไป"){
    $level="M1";
    $type_type_student="ชั้นมัธยมศึกษาปีที่ 1 ประเภทในเขตพื้นที่บริการและนักเรียนทั่วไป";
    $plans1=$_GET["plans1"];
    $rooms="none";
}
else{
    $level="M4";
    $plans1=$_GET["plans1"].",".$_GET["plans2"].",".$_GET["plans3"];
    if($studen_type=="ประเภทนักเรียนมัธยมศึกษาปีที่ 3 (นักเรียนเดิม)"){
       $type_type_student="ประเภทนักเรียนมัธยมศึกษาปีที่ 3 (นักเรียนเดิม)";
       $std_id_lod_school= $_GET['std_id_lod_school'];
       $rooms=$_GET["old_room"];
    }
    else{
        $type_type_student="ประเภทนักเรียนทั่วไป";
        $rooms="none";
    }
}

        // $sql = " UPDATE application_form
        // INNER JOIN student ON student.id_card = application_form.id_card
        // INNER JOIN parents ON parents.id_card = application_form.id_card
        // INNER JOIN addresss ON addresss.id_card = parents.id_card 
        // SET house_no = '".$home_no."' , village = '".$home."' , village_no = '".$group_no."' , sub_area = '".$sub_area."' , area = '".$area."' ,post = '".$post."' , id_card='".$id_card."' , province = '".$province."',
        // date_form = '".$a."' , student_id = '".$std_id_lod_school."' , plans = '".$plans1."' ,room = '".$rooms."' , oldprovince ='".$oldprovince."' , barcode_id = '".$id_card."',
        // father = '".$father."' , mother = '".$monther."' ,statuss = '".$status_fam."',
        // name_title = '".$name_title."' , fname = '".$fname."' , lname = '".$lname."' , birthday ='".$birthday."' , tel ='".$tel."' , education_level = '".$level."' , school = '".$oldschool."' , GPAX = '".$oldgpax."' 
        // where id_card = '".$id_card."'
        // ";
        // mysqli_query($conn,$sql);

        $sql ="update addresss set house_no = '".$home_no."' , village = '".$home."' , village_no = '".$group_no."' , sub_area = '".$sub_area."' , area = '".$area."' ,post = '".$post."' , id_card='".$id_card."',province = '".$province."'  where id_card = '".$id_card."' ";
        mysqli_query($conn,$sql);
        $sql ="update application_form set date_form = '".$a."' , student_id = '".$std_id_lod_school."' , plans = '".$plans1."' ,rooms = '".$rooms."' , oldprovince ='".$oldprovince."' where id_card = '".$id_card."' ";
        mysqli_query($conn,$sql);
        $sql ="update parents set father = '".$father."' , mother = '".$monther."' ,statuss = '".$status_fam."' where id_card = '".$id_card."' ";
        mysqli_query($conn,$sql);
        $sql ="update student set name_title = '".$name_title."' , fname = '".$fname."' , lname = '".$lname."' , birthday ='".$birthday."' , tel ='".$tel."' , education_level = '".$level."' , school = '".$oldschool."' , GPAX = '".$oldgpax."' where id_card = '".$id_card."' ";
        mysqli_query($conn,$sql);
        echo "<script>window.open('edit_regis.php','_self')</script>";
        
?>