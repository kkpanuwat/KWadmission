<?php
include "connectDB/connectDB.php";
session_start();
if (isset($_POST)) {
    $topic = $_POST["topic"];
    $content = $_POST["content"];
    $oldpic = $_POST["oldpic"];
    $oldfile = $_POST["oldfile"];
    $news_id = $_POST["news_id"];
    $topicfile=$_POST["topic_file"];
    //upload image

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


//                                  pic_index  name ที่ส่งมาจาก form
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
            echo "ไม่สามารถ UPLOAD ภาพได้";
            exit();
        }
        $pro_image = $new_image_name;
        $pic = $pro_image;
    } else {
        $pic = $oldpic;
    }


    //upload file

    $file2 = pathinfo(basename($_FILES['file_index']['name']), PATHINFO_EXTENSION);
    if ($file2 != "") {
        $new_file_name = 'file' . uniqid() . "." . $file;
        //echo $new_file_name;
        $file_path = "file/index_news";
        $upload_path = $file_path . "/" . $new_file_name;
        //echo $upload_path;

        //uploading
        $upload = move_uploaded_file($_FILES['file_index']['tmp_name'], $upload_path);
        if ($upload == FALSE) {
            echo "ไม่สามารถ UPLOAD ไฟล์ได้";
            exit();
        }
        $pro_file = $new_file_name;
        $filelast = $pro_file;
    } else {
        $filelast = $oldfile;
    }


    $times=DateThai($time);
    $sql_update = "update news set topic = '" . $topic . "'
    ,content = '" . $content . "'
    ,pic = '" . $pic . "'
    ,files = '" . $filelast . "'
    ,dates = '" . $times ."'
    ,edit_by = '" . $_SESSION["username"] ."'
    ,link = '" . $topicfile ."' where news_id = '".$news_id."'";
    $query_sql = mysqli_query($conn, $sql_update);
    if ($query_sql) {
        $msg = "แก้ไขข้อมูลสำเร็จ";
        echo $msg;
        header('Location:index.php');
    } else {
        $msg = "ไม่สามารถป๊อปข้อมูลได้ [" . '' . $query . ' ' . "]";
        echo $msg;
        echo "<a href='add_user.php'>กลับ</a>";
    }
}
