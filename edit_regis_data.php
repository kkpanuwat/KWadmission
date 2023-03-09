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
    <link rel="stylesheet" href="css/index4.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

</head>

<body>
    <!-- navbar -->
    <?php
            include "in_nav.php";
        ?>
    <!-- closenav -->

    

    <?php
    include "connectDB/connectDB.php";

    $get_id_card = $_GET["id_card"];

    $sql = "SELECT *
    FROM application_form
    INNER JOIN student ON student.id_card = application_form.id_card
    INNER JOIN parents ON parents.id_card = application_form.id_card
    INNER JOIN addresss ON addresss.id_card = parents.id_card 
    where addresss.id_card = '$get_id_card'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    // if (isset($_GET["student"])) {
    $positions = "";
    $types_ad = "";
    $oldshool = "";
    $property = "";
    if ($row["type_student"] == "ชั้นมัธยมศึกษาปีที่ 1 ประเภทในเขตพื้นที่บริการและนักเรียนทั่วไป") {
        $for_for_level="M1";
        $property = "ปพ.1 จบหลักสูตรชั้นประถมศึกษาปีที่ 6 หรือ สำเนา ปพ.1 ( มีผลการเรียน 5 ภาคเรียน )";
        $types_ad = "<h4>ใบสมัครเพื่อคัดเลือกเข้าเรียนระดับชั้นมัธยมศึกษาปีที่ 1<br>ประเภทในเขตพื้นที่บริการและนักเรียนทั่วไป ปีการศึกษา 2560<br>โรงเรียนกุมภวาปี สำนักงานเขตพื้นที่การศึกษามัธยมศึกษา เขต 20</h4>";
        $positions = "M1";
        $oldshool = '<div class="row" id="data4">
            <div class="col-3" style="text-align:  right">
                โรงเรียนเดิม
            </div>
            <div class="col-3">
                <input class="form-control" style="width: 100%" type="text" min="1" max="12" name="old_school" id="old_room" value="' . $row["school"] . '" required>
            </div>
            <div class="col-2" style="text-align:right">
            จังหวัด
        </div>
        <div class="col-4">
            <input class="form-control" style="width: 100%" type="text" min="1" max="12" name="old_province" id="old_room" value="' . $row["oldprovince"] . '" required>
        </div>
        </div>';
        $n = 1;
    }
    if ($row["type_student"] == "ประเภทนักเรียนมัธยมศึกษาปีที่ 3 (นักเรียนเดิม)") {
        $for_for_level="M4";
        $n = 3;
        echo '<div class="container" id="choice">
                        <div class="row" id="button_row_1">
                            <div class="col-5">
                                <div id="button1">
                                <a href="admission.php?student=2_1" id="student">
                                        <center>
                                            นักเรียนชั้นมัธยมศึกษา<br>
                                            ปีที่ 3 เดิม
                                        </center>
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                
                            </div>
                            <div class="col-5">
                                <div id="button2">
                                    <a href="admission.php?student=2_2" id="student">
                                        <center>
                                            นักเรียนชั้นมัธยมศึกษา<br>
                                            ปีที่ 4 ประเภทนักเรียนทั่วไป
                                        </center>
                                    </a>
                                </div>
                            </div>
                        </div>
        </div>';
    }
    if ($row["type_student"] == "ประเภทนักเรียนมัธยมศึกษาปีที่ 3 (นักเรียนเดิม)") {
        $for_for_level="M4";
        $property = 'ปพ.1 ผลการเรียน 5 ภาคเรียน ( มีผลการเรียนไม่น้อยกว่า 2.00 )';
        $positions = "M4";
        $n = 3;
        $types_ad = "<h4>ใบสมัครเพื่อคัดเลือกเข้าเรียนระดับชั้นมัธยมศึกษาปีที่ 4<br>ประเภทนักเรียนมัธยมศึกษาปีที่ 3 (นักเรียนเดิม) ปีการศึกษา 2560<br>โรงเรียนกุมภวาปี สำนักงานเขตพื้นที่การศึกษามัธยมศึกษา เขต 20</h4>";
        $oldshool = '<div class="row" id="data4">
            <div class="col-3" style="text-align:  right">
                กำลังศึกษาชั้นมัธยมศึกษาปีที่ 3/
            </div>
            <div class="col-1">
                <input class="form-control" style="width: 100%" type="text" name="old_room" id="old_room" required value="' . $row["rooms"] . '" >
            </div>
            <div class="col-4">
                ปีการศึกษา 2558 เลขประจำตัวนักเรียน
            </div>
            <div class="col-4">
                <input class="form-control" style="width: 100%" type="text" name="std_id_lod_school" id="std_id_lod_school" required value="' . $row["student_id"] . '" >
            </div>
        </div>
        <br>
    
        <div class="row" id="data4">
            <div class="col-3" style="text-align:  right">
                มีผลการเรียนเฉลี่ย 5 ภาคเรียน
            </div>
            <div class="col-6">
                <input class="form-control" style="width: 100%" type="text" name="gpax" id="gpax" required value="' . $row["GPAX"] . '">
            </div>
        </div>';
    }
    if ($row["type_student"] == "ประเภทนักเรียนทั่วไป") {
        $for_for_level="M4";
        $property = 'ปพ.1 จบหลักสูตรชั้นมัธยมศึกษาปีที่ 3 หรือหนังสือรับรองผลการเรียน ปพ.7';
        $positions = "M4";
        $n = 3;
        $types_ad = "<h4>ใบสมัครเพื่อคัดเลือกเข้าเรียนระดับชั้นมัธยมศึกษาปีที่ 4<br>ประเภทนักเรียนทั่วไป ปีการศึกษา 2560<br>โรงเรียนกุมภวาปี สำนักงานเขตพื้นที่การศึกษามัธยมศึกษา เขต 20</h4>";
        $oldshool = '<div class="row" id="data4">
            <div class="col-3" style="text-align:  right">
                โรงเรียนเดิม
            </div>
            <div class="col-3">
                <input class="form-control" style="width: 100%" type="text" min="1" max="12" name="old_school" id="old_room" value="' . $row["school"] . '" required>
            </div>
            <div class="col-2" style="text-align:right">
            จังหวัด
        </div>
        <div class="col-4">
            <input class="form-control" style="width: 100%" type="text" min="1" max="12" name="old_province" id="old_room"  value="' . $row["oldprovince"] . '" required>
        </div>
        </div>';
    }

    $plans = "";
    $plans2 = "";
    $sql2 = "SELECT application_form.plans from application_form where id_card ='$get_id_card'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2);
    $status_plans = explode(",", $row2["plans"]);

    for ($i = 1; $i<= $n; $i++) {
        $plans = $plans .'<br><div class="row" id="data4">
            <div class="col-3" style="text-align:  right">
                แผนการเรียนที่ ' . $i . '
            </div>';
        $sql = "SELECT * from lesson_plans where for_level= '$positions'";
        $result =mysqli_query($conn,$sql);
        $plans = $plans . '<div class="col" style="width:100%">';
        $plans = $plans . '<select class="form-control" name="plans' . $i . '">';
            while ($row = mysqli_fetch_array($result)) {
                if($status_plans[$i-1]==$row["plans_id"]){
                    $pl="selected";
                    $plans = $plans . "<option value='" . $row["plans_id"] . "' ".$pl." >" . $row["plans_name"] . "</option>";
                }
                else{
                    $pl="";
                    $plans = $plans . "<option value='" . $row["plans_id"] . "' ".$pl." >" . $row["plans_name"] . "</option>";
                }
        }

        $plans = $plans . "</select></div></div>";
        $plans2 = $plans;
    }

    $sql = "SELECT *
        FROM application_form
        INNER JOIN student ON student.id_card = application_form.id_card
        INNER JOIN parents ON parents.id_card = application_form.id_card
        INNER JOIN addresss ON addresss.id_card = parents.id_card 
        where addresss.id_card = '$get_id_card'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if ($row["name_title"] == "เด็กชาย") {
        $a = "checked";
        $b = "";
        $c = "";
        $d = "";
        $e = "";
    }
    if ($row["name_title"] == "เด็กหญิง") {
        $a = "";
        $b = "checked";
        $c = "";
        $d = "";
        $e = "";
    }
    if ($row["name_title"] == "นาย") {
        $a = "";
        $b = "";
        $c = "checked";
        $d = "";
        $e = "";
    }
    if ($row["name_title"] == "นาง") {
        $a = "";
        $b = "";
        $c = "";
        $d = "checked";
        $e = "";
    }
    if ($row["name_title"] == "นางสาว") {
        $a = "";
        $b = "";
        $c = "";
        $d = "";
        $e = "checked";
    }
    $status_fam2 = explode(",", $row["statuss"]);
    $st = array("อยู่ด้วยกัน", "หย่าร้าง", "แยกกันอยู่", "บิดาถึงแก่กรรม", "มารดาถึงแก่กรรม");
    $ck1 = "";
    $ck2 = "";
    $ck3 = "";
    $ck4 = "";
    $ck5 = "";
    foreach ($status_fam2 as $x) {
        if ($x == $st[0]) {
            $ck1 = "checked";
        }
        if ($x == $st[1]) {
            $ck2 = "checked";
        }
        if ($x == $st[2]) {
            $ck3 = "checked";
        }
        if ($x == $st[3]) {
            $ck4 = "checked";
        }
        if ($x == $st[4]) {
            $ck5 = "checked";
        }
    }
    $form_std = '<div class="container" id="register" style="margin-top: 7em">
            <form action="editregis_data.php" method="get">
                <div class="row" id="button_row_2">
                    <div class="col-1">
                    </div>
                    <div class="col-10">
                        <center>
                            <img style="width: 10em" src="https://data.bopp-obec.info/emis/pic_school/1041680845.jpg" alt=""><br>
                            <br>
                            ' . $types_ad . '
                        </center>
                        <u>ข้อมูลนักเรียน</u><br><br>

                        <div class="row" id="data1">
                        <div class="col-3" style="text-align:right">
                            คำนำหน้าชื่อ : 
                        </div>
                        <div class="col-9">
                            <input type="radio" ' . $a . ' value="เด็กชาย" name="name_title" checked >&nbsp เด็กชาย
                            <input type="radio" ' . $b . ' value="เด็กหญิง" name="name_title" >&nbsp เด็กหญิง
                            <input type="radio" ' . $c . ' value="นาย" name="name_title" >&nbsp นาย
                            <input type="radio" ' . $d . ' value="นาง" name="name_title" >&nbsp นาง
                            <input type="radio" ' . $e . ' value="นางสาว" name="name_title" >&nbsp นางสาว
                        </div>
                    </div>
                    <br>
    
    
                        <div class="row" id="data1">
                            <div class="col-3" style="text-align:right">
                                ชื่อ :
                            </div>
                            <div class="col-3">
                                <input class="form-control" style="width: 100%" type="text" name="fname" id="fname" placeholder="สมชาย" value="' . $row["fname"] . '" required>
                            </div>
                            <div class="col-2" style="text-align:right">
                            นามสกุล :
                        </div>
                        <div class="col-4">
                            <input class="form-control" style="width: 100%" type="text" name="lname" id="lname" placeholder="รักชาติ" value="' . $row["lname"] . '" required>
                        </div>
                        </div>
    
                        <br>
    
                        <div class="row" id="data2">
                            <div class="col-3" style="text-align:  right">
                                เลขประจำตัวประชาชน
                            </div>
                            <div class="col-9">
                                <input class="form-control" style="width: 100%" type="text" name="person_id" id="person_id" value="' . $row["id_card"] . '" placeholder="ไม่ต้องระบุ(-)" required pattern="[0-9]{13}">
                            </div>
                        </div>
    
                        <br>
    
                        <div class="row" id="data3">
                            <div class="col-3" style="text-align:  right">
                                วัน/เดือน/ปีเกิด
                            </div>
                            <div class="col" style="text-align:  right">
                                <input class="form-control" id="birthday" class="form-control" value="' . $row["birthday"] . '" name="birthday">
                            </div>

                            <script>
                             picker_date(document.getElementById("birthday"),{year_range:"-100:+0"});
                         </script>

                        </div>
                        <br>
                        <div class="row" id="data3">
                        <div class="col-3" style="text-align:  right">
                            เบอร์โทรศัพท์
                        </div>
                        <div class="col" style="text-align:  right">
                            <input class="form-control" type="text" name="tel" id="tel" style="width: 100%" required value="' . $row["tel"] . '" pattern="[0-9]{10}">
                        </div>
                    </div>
    
                        <br>
                        <input class="form-control" type="hidden" name="student" value="' . $row["type_student"] . '">;
    
                        <div class="row" id="data4">
                            <div class="col-3" style="text-align:  right">
                                ที่อยู่บ้านเลขที่
                            </div>
                            <div class="col-2">
                                <input class="form-control" style="width:100%" type="text" value="' . $row["house_no"] . '" name="home_no" id="home_no" required>
                            </div>
                            <div class="col-1" style="">
                                หมู่ที่
                            </div>
                            <div class="col-2">
                                <input class="form-control" style="width:100%" type="text" value="' . $row["village_no"] . '" name="group_no" id="group_no" required>
                            </div>
                            <div class="col-1" style="">
                                บ้าน
                            </div>
                            <div class="col-3">
                                <input class="form-control" style="width:100%" type="text" value="' . $row["village"] . '" name="home" id="home" required>
                            </div>
                        </div>
                        <br>
    
                        <div class="row" id="data4">
                            <div class="col-3" style="text-align:  right">
                                ตำบล
                            </div>
                            <div class="col-2">
                                <input class="form-control" style="width:100%" type="text" name="sub_area" id="sub_area" value="' . $row["sub_area"] . '" required>
                            </div>
                            <div class="col-1" style="">
                                อำเภอ
                            </div>
                            <div class="col-2">
                                <input class="form-control" style="width:100%" type="text" name="area" id="area" value="' . $row["area"] . '" required>
                            </div>
                            <div class="col-1" style="">
                                จังหวัด
                            </div>
                            <div class="col-3">
                                <input class="form-control" style="width:100%" type="text" name="province" value="' . $row["province"] . '" id="province" required>
                            </div>
                        </div>

                        <br>

                        <div class="row" id="data4">
                        <div class="col-3" style="text-align:  right">
                            รหัสไปรษณีย์
                        </div>
                        <div class="col-2">
                            <input class="form-control" style="width:100%" type="text" name="post" id="post" value="' . $row["post"] . '" required pattern="[0-9]{5}">
                        </div>
                        </div>
    
                        <br>
    
                        <div class="row" id="data4">
                            <div class="col-3" style="text-align:  right">
                                ชื่อบิดา
                            </div>
                            <div class="col">
                                <input class="form-control" style="width: 100%" type="text" name="father_name" value="' . $row["father"] . '" id="father_name" required>
                            </div>
                        </div>
    
                        <br>
    
                        <div class="row" id="data4">
                            <div class="col-3" style="text-align:  right">
                                ชื่อมารดา
                            </div>
                            <div class="col">
                                <input class="form-control" style="width: 100%" type="text" value="' . $row["mother"] . '" name="mother_name" id="mother_name" required>
                            </div>
                        </div>
    
                        <br>
    
                        <div class="row" id="data4">
                            <div class="col-3" style="text-align:  right">
                                สถานภาพบิดา-มารดา
                            </div>
                            <div class="col-1">
                                <input style="width: 100%" type="checkbox" name="status_fam[]" value="อยู่ด้วยกัน" id="people_id" ' . $ck1 . '>
                            </div>
                            <div class="col-2">
                                อยู่ด้วยกัน
                            </div>
                            <div class="col-1">
                                <input style="width: 100%" type="checkbox" name="status_fam[]" value="หย่าร้าง" id="people_id" ' . $ck2 . '>
                            </div>
                            <div class="col-2">
                                หย่าร้าง
                            </div>
                            <div class="col-1">
                                <input style="width: 100%" type="checkbox" name="status_fam[]" value="แยกกันอยู่"  id="people_id" ' . $ck3 . '>
                            </div>
                            <div class="col-2">
                                แยกกันอยู่
                            </div>
                        </div>
    
                        <div class="row" id="data4">
                            <div class="col-3" style="text-align:  right">
    
                            </div>
                            <div class="col-1">
                                <input style="width: 100%" type="checkbox" name="status_fam[]" value="บิดาถึงแก่กรรม"  id="people_id" ' . $ck4 . '>
                            </div>
                            <div class="col-2">
                                บิดาถึงแก่กรรม
                            </div>
                            <div class="col-1">
                                <input style="width: 100%" type="checkbox" name="status_fam[]" value="มารดาถึงแก่กรรม" id="people_id" ' . $ck5 . '>
                            </div>
                            <div class="col-2">
                                มารดาถึงแก่กรรม
                            </div>
                        </div>
    
    
                        <br>
    
                        ' . $oldshool . '
    
                        <br><br><u>แผนการเรียน</u><br>
    
                        <br>
    
                        ' . $plans2 . '
                        <br>
                        <br>
                        <br>
                        <br>
    
                        <div class="row" id="data5">
                            <div class="col-3">
    
                            </div>
                            <div class="col-3">
    
                            </div>
                            <div class="col-6" style="text-align:  right">
                                <br>
  
                            </div>
                        </div>
                    </div>
                    <br>
                    <br><br>
                    <input style="width:100%;padding:0.5em;border :10px solid green;background-color:green;border-radius:10px;font-size:1.5em;color:white" name="btn_sub_form" type="submit" value="บันทึก">
                </div>
            </form>
        </div>';

    $sql = "SELECT *
        FROM application_form
        INNER JOIN student ON student.id_card = application_form.id_card
        INNER JOIN parents ON parents.id_card = application_form.id_card
        INNER JOIN addresss ON addresss.id_card = parents.id_card 
        where addresss.id_card = '$get_id_card'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if ($row["type_student"] == "ชั้นมัธยมศึกษาปีที่ 1 ประเภทในเขตพื้นที่บริการและนักเรียนทั่วไป") {
        echo $form_std;
    }
    if ($row["type_student"] == "ประเภทนักเรียนมัธยมศึกษาปีที่ 3 (นักเรียนเดิม)") {
        echo $form_std;
    }
    if ($row["type_student"] == "ประเภทนักเรียนทั่วไป") {
        echo $form_std;
    }
    // }

    ?>






    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>