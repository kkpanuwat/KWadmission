<?php include "connectDB/connectDB.php";
session_start(); ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KW Admission</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admission2.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <!-- NAV BAR -->
    <div id="nav_bar_head">
        <nav class="navbar navbar-expand-lg navbar-light  " style="background-color: rgba(0,0,0,0.8);">
            <div class="container">
                <!-- Content here -->
                <a class="navbar-brand" href="#" id="nav_bar">KW ADMISSION</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="color: white"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" id="nav_bar" href="index.php">หน้าแรก <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav_bar3" href="calendar.php">กำหนดการณ์รับสมัคร</a>
                        </li>
                        <?php
                        $sql = "select * from status_admission";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        if ($row["status_ad"] == "01") {
                            echo '<li class="nav-item">
                                <a class="nav-link" id="nav_bar4" href="admission.php">สมัครเรียน</a>
                            </li>';
                        }
                        ?>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="nav_bar4" href="admission.php">สมัครเรียน</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" id="nav_bar2" href="print_ad.php">พิมพ์ใบสมัคร</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav_bar2" href="print_card.php">พิมพ์บัตรเข้าห้องสอบ</a>
                        </li>

                        <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="nav_bar2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->

                        <?php
                        if (empty($_SESSION["username"])) {
                            echo "<li class='nav-item'>
                            <a class='nav-link' id='nav_bar5' href='login.php'>เข้าสู่ระบบ</a>
                        </li>";
                        } else {
                            if ($_SESSION["type"] == "01") {
                                $add = '<a class="dropdown-item" href="add_admin.php">เพิ่มผู้ดูแลระบบ</a>
                                <a class="dropdown-item" href="edit_regis.php">แก้ไขใบสมัครเรียน</a>
                                <a class="dropdown-item" href="add_admin.php">เพิ่มแผนการเรียน</a>
                                <a class="dropdown-item" href="check_name.php">เช็คชื่อเข้าห้องสอบ</a>
                                <a class="dropdown-item" href="close_admission.php">เปิด/ปิดระบบรับสมัครเรียน</a>';
                            } else {
                                $add = "";
                            }
                            echo '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="nav_bar2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              ' . $_SESSION["username"] . '
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="confrim_card.php">อนุมัติบัตรเข้าห้องสอบ</a>
                              <a class="dropdown-item" href="dow_load_csv.php">ดาวน์โหลดรายชื่อผู้สมัคร</a>
                              ' . $add . '
                            </div>
                          </li>';
                        }
                        ?>
                        <?php
                        if (empty($_SESSION["username"])) {
                        } else {
                            echo "
                                <li class='nav-item'>
                                <a class='nav-link' id='nav_bar6' href='logout.php' style='color:red'>ออกจากระบบ</a>
                                </li> ";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- CLOSE NAVBAR -->
    <!-- CLOSE CONTAINNER -->
    <div class="container">
        <form action="get_checkname.php" method="get">
            <div class="row" id="data4">
                <div class="col-1" style="text-align:  right">

                </div>
                <div class="col-10" style="text-align:center">
                    <div style="height:8em"></div>
                    <div style="font-size:1.5em">กรุณาเลือกรายการที่ต้องการดาวน์โหลด</div>
                    <div class="row" id="data4">
                        <div class="col">

                        </div>
                        <div class="col-12">
                            <!-- content -->
                            <div style="height:2em"></div>
                            <?php
                            echo '<select name="date_t" id="" class="form-control">';
                            $sql = "SELECT * from check_name group by datee";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                $data1 = explode(" เวลา ", $row["date_time"]);
                                echo '<option value="' . $row["datee"] . '">' . $data1[0] . '</option>';
                            }
                            echo "</select>";
                            ?>

                            <!-- btn_submit -->
                            <div class="col">

                            </div>
                            <div class="col-12" style="text-align:right">
                                <div style="height:1em"></div>
                                <button class="btn btn-success" type="submit" style="text-align: center;width: 30%;height: 2em ;border-radius: 0.25em;color:white;font-size:1.25em" name="btn_download">ดาวน์โหลดรายชื่อผู้เข้าสอบ</button>
                            </div>
                            <div class="col">

                            </div>

                        </div>
                        <div class="col">

                        </div>
                    </div>
                    <div class="col-1">

                    </div>
                </div>
        </form>
    </div>

    <?php

    if (isset($_GET["del"])) {
        $del = $_GET["del"];
        $sql =
            "DELETE student,examination_card,parents,application_form,addresss
        FROM student
        INNER JOIN application_form ON student.id_card = application_form.id_card
        INNER JOIN examination_card ON examination_card.barcode_id = application_form.id_card 
        INNER JOIN addresss ON addresss.id_card = examination_card.barcode_id
        INNER JOIN parents ON parents.id_card = addresss.id_card
        where addresss.id_card = '$del'";
        $result = mysqli_query($conn, $sql);
        echo "<script>window.open('edit_regis.php','_self')</script>";
    }
    if (isset($_GET["btn_download"])) {
        $a = $_GET["date_t"];
        $file_name = uniqid();
        $files = fopen("check_name/" . $file_name . ".csv", "w");
        fputs($files, (chr(0xEF) . chr(0xBB) . chr(0xBF)));
        $topic = array("ลำดับ", "รหัสประจำตัวประชาชน", "คำนำหน้า", "ชื่อ", "สกุล", "ระดับชั้น", "ประเภทนักเรียน", "เวลาที่ลงทะเบียนเข้าสอบ");
        fputcsv($files, $topic);
        $sql = "SELECT *
            FROM application_form
            INNER JOIN student ON student.id_card = application_form.id_card
            INNER JOIN parents ON parents.id_card =student.id_card
            INNER JOIN check_name ON parents.id_card = check_name.id_card
            where check_name.datee = '$a' ";
        $result = mysqli_query($conn, $sql);
        $n = 1;
        while ($row = mysqli_fetch_array($result)) {
            $num_id = "";
            for ($i = 0; $i <= 12; $i++) {
                if ($i == 1 || $i == 5 || $i == 10 || $i == 12) {
                    $num_id .= "-";
                }
                $num_id .= $row["id_card"][$i];
            }
            if ($row["education_level"] == "M1") {
                $level = "มัธยมศึกษาปีที่ 1 ";
            } else {
                $level = "มัธยมศึกษาปีที่ 4 ";
            }
            $data = [];
            array_push($data, $n);
            array_push($data, $num_id);
            array_push($data, $row["name_title"]);
            array_push($data, $row["fname"]);
            array_push($data, $row["lname"]);
            array_push($data, $level);
            array_push($data, $row["type_student"]);
            array_push($data, $row["date_time"]);
            fputcsv($files, $data);
            $n++;
        }
        fclose($files);
        echo "<script>window.open('check_name/" . $file_name . ".csv" . "','_self')</script>";
    }
    ?>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>