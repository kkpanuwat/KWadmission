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
    if((int)($strDay)<=9){
        $strDay="0".$strDay;
    }
    return "$strDay $strMonthThai $strYear เวลา $strHour:$strMinute";
}

function DateThai2($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    if((int)($strDay)<=9){
        $strDay="0".$strDay;
    }
    return "$strDay $strMonthThai $strYear";
}

$id_card=$_GET["std_id"];
$sqlin="select * from check_name where id_card = '$id_card'";
$result=mysqli_query($conn,$sqlin);
$a=mysqli_num_rows($result);
if($a>=1){
    echo "<script>window.open('check_name.php','_self')</script>";
    exit();
}

$sqlch="select * from student 
INNER JOIN examination_card ON examination_card.barcode_id = student.id_card 
where student.id_card = '$id_card' AND status_card = '01' ";
$result=mysqli_query($conn,$sqlch);
$a=mysqli_num_rows($result);
if($a<1){
    echo "<script>window.open('check_name.php?msg=1001','_self')</script>";
    exit();
}
else{
    $a=DateThai($time);
    $b=DateThai2($time);
    $sqlin="INSERT INTO check_name(id_card,date_time,datee) VALUES ('$id_card','$a','$b')";
    mysqli_query($conn,$sqlin);
    echo "<script>window.open('check_name.php','_self')</script>";
}
?>