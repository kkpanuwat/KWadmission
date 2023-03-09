<?php
session_start();
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


if (isset($_POST)) {
    $topic = $_POST["topic"];
    $content = $_POST["content"];
    $page = $_POST["page"];
    if ($_POST["topic_file"] == "") {
        $link = "ดาวน์โหลดเอกสาร";
    } else {
        $link = $_POST["topic_file"];
    }
    //upload image
    $file = pathinfo(basename($_FILES['pic_index']['name']), PATHINFO_EXTENSION);
    if ($file != "") {
        $new_image_name = 'img' . uniqid() . "." . $file;
        //echo $new_image_name;
        $image_path = "img/index_news";
        $upload_path = $image_path . "/" . $new_image_name;
        //echo $upload_path;

        //uploading
        $upload = move_uploaded_file($_FILES['pic_index']['tmp_name'], $upload_path);
        if ($upload == FALSE) {
            echo "ไม่สามารถ UPLOAD รูปภาพได้";
            exit();
        }
        $pro_image = $new_image_name;
        $pic = $pro_image;
    } else {
        $pic = "none";
    }

    //    UPLOAD FILE 

    $file = pathinfo(basename($_FILES['file_index']['name']), PATHINFO_EXTENSION);
    if ($file != "") {
        $new_file_name = 'file' . uniqid() . "." . $file;
        //echo $new_file_name;
        $file_path = "file/index_news";
        $upload_path = $file_path . "/" . $new_file_name;
        //echo $upload_path;

        //uploading
        $upload = move_uploaded_file($_FILES['file_index']['tmp_name'], $upload_path);
        if ($upload == FALSE) {
            echo "ไม่สามารถ UPLOAD ไฟล์เอกสารได้";
            exit();
        }
        $pro_file = $new_file_name;
        $file = $pro_file;
    } else {
        $file = "none";
    }
    
    $times=DateThai($time);
    echo $times;
    $sql = "INSERT INTO news(topic,content,pic,files,link,type_new,dates,edit_by) VALUES
    ('" . $topic . "','" . $content . "','" . $pic . "','" . $file . "','" . $link . "','" . $page . "','" . $times . "','" . $_SESSION['username']. "')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $msg = "บันทึกข้อมูลสำเร็จ";
        header('Location:index.php');
    } else {
        $msg = "ไม่สามารถป๊อปข้อมูลได้ [" . '' . $query . ' ' . "]";
        echo $msg;
        echo "<a href='add_user.php'>กลับ</a>";
    }
}

