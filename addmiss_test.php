<?php include "connectDB/connectDB.php";
session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KW Admission</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admission2.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  ></script>
    <script src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    <script src="https://รับเขียนโปรแกรม.net/picker_date/picker_date.js"></script>
</head>

<body>
    <!-- navbar -->
    <?php 
            include "in_nav.php";
        ?>
    <!-- closenav -->

    
    <!-- CLOSE CONTAINNER -->


    <!-- <div class="container" id="choice">
        <div class="row" id="button_row_1">
            <div class='col-5'>
                <div id="button1">
                <a href="admission.php?student=1" id="student">
                        <center>
                            นักเรียนชั้นมัธยมศึกษา<br>
                            ปีที่ 1
                        </center>
                    </a>
                </div>
            </div>
            <div class='col'>

            </div>
            <div class='col-5'>
                <div id="button2">
                    <a href="admission.php?student=2" id="student">
                        <center>
                            นักเรียนชั้นมัธยมศึกษา<br>
                            ปีที่ 4
                        </center>
                    </a>
                </div>
            </div>
        </div>
    </div> -->

    <?php
    if (empty($_GET["student"])) {
        echo '<div class="container" id="choice">
            <div class="row" id="button_row_1" >
                <div id="button1">
                    <div class="col">
                        <a href="admission.php?student=1" id="student">
                            <center>
                                นักเรียนชั้นมัธยมศึกษา<br>
                                ปีที่ 1
                            </center>
                        </a>
                    </div>
                </div>
                <div class="col"></div>
                <br>
                <div id="button2">
                    <div class="col">
                        <a href="admission.php?student=2" id="student">
                            <center>
                                นักเรียนชั้นมัธยมศึกษา<br>
                                ปีที่ 4
                            </center>
                        </a>
                    </div>
                </div>
            </div>
        </div>';
    } else {
    }
    ?>
    

    <?php
    include "connectDB/connectDB.php";
    if (isset($_GET["student"])) {
        $positions = "";
        $types_ad = "";
        $oldshool = "";
        $property = "";
        if ($_GET["student"] == "1") {
            $property = "ปพ.1 จบหลักสูตรชั้นประถมศึกษาปีที่ 6 หรือ สำเนา ปพ.1 ( มีผลการเรียน 5 ภาคเรียน )";
            $types_ad = "<h4>ใบสมัครเพื่อคัดเลือกเข้าเรียนระดับชั้นมัธยมศึกษาปีที่ 1<br>ประเภทในเขตพื้นที่บริการและนักเรียนทั่วไป ปีการศึกษา 2560<br>โรงเรียนกุมภวาปี สำนักงานเขตพื้นที่การศึกษามัธยมศึกษา เขต 20</h4>";
            $positions = "M1";
            $oldshool = '<div class="row" id="data4">
            <div class="col-3" style="text-align:  right">
                โรงเรียนเดิม
            </div>
            <div class="col-3">
                <input class="form-control" style="width: 100%" type="text" min="1" max="12" name="old_school" id="old_room" required>
            </div>
            <div class="col-2" style="text-align:right">
            จังหวัด
        </div>
        <div class="col-4">
            <input class="form-control" style="width: 100%" type="text" min="1" max="12" name="old_province" id="old_room" required>
        </div>
        </div>';
            $n = 1;
        }
        if ($_GET["student"] == "2") {
            $n = 3;
            echo '<center><div class="container" id="choice">
            <div class="row" id="button_row_1" >
                <div id="button1">
                    <div class="col">
                        <a href="admission.php?student=2_1" id="student">
                            <center>
                                นักเรียนชั้นมัธยมศึกษา<br>
                                ปีที่ 1
                            </center>
                        </a>
                    </div>
                </div>
                <div class="col"></div>
                <br>
                <div id="button2">
                    <div class="col">
                        <a href="admission.php?student=2_2" id="student">
                            <center>
                            นักเรียนชั้น<br>มัธยมศึกษา
                            ปีที่ 3 <br>ประเภทนักเรียนเดิม
                            </center>
                        </a>
                    </div>
                </div>
            </div>
        </div>
                        
                        
        </div></center>';
        } else if ($_GET["student"] == "2_1") {
            $property = 'ปพ.1 ผลการเรียน 5 ภาคเรียน ( มีผลการเรียนไม่น้อยกว่า 2.00 )';
            $positions = "M4";
            $n = 3;
            $types_ad = "<h4>ใบสมัครเพื่อคัดเลือกเข้าเรียนระดับชั้นมัธยมศึกษาปีที่ 4<br>ประเภทนักเรียนมัธยมศึกษาปีที่ 3 (นักเรียนเดิม) ปีการศึกษา 2560<br>โรงเรียนกุมภวาปี สำนักงานเขตพื้นที่การศึกษามัธยมศึกษา เขต 20</h4>";
            $oldshool = '<div class="row" id="data4">
            <div class="col-3" style="text-align:  right">
                กำลังศึกษาชั้นมัธยมศึกษาปีที่ 3/
            </div>
            <div class="col-6">
                <input class="form-control" style="width: 100%" type="text" name="old_room" id="old_room" required>
            </div>
            
        </div>

        <br>
        <div class="row" id="data4">
        <div class="col-3" style="text-align:  right">
            ปีการศึกษา 2558 <br>เลขประจำตัวนักเรียน
        </div>
        <div class="col-6">
            <input class="form-control" style="width: 100%" type="text" name="std_id_lod_school" id="std_id_lod_school" required>
        </div>
    </div>


        <br>
    
        <div class="row" id="data4">
            <div class="col-3" style="text-align:  right">
                มีผลการเรียนเฉลี่ย 5 ภาคเรียน
            </div>
            <div class="col-6">
                <input class="form-control" style="width: 100%" type="text" name="gpax" id="gpax" required>
            </div>
        </div>';
        } else if ($_GET["student"] == "2_2") {
            $property = 'ปพ.1 จบหลักสูตรชั้นมัธยมศึกษาปีที่ 3 หรือหนังสือรับรองผลการเรียน ปพ.7';
            $positions = "M4";
            $n = 3;
            $types_ad = "<h4>ใบสมัครเพื่อคัดเลือกเข้าเรียนระดับชั้นมัธยมศึกษาปีที่ 4<br>ประเภทนักเรียนทั่วไป ปีการศึกษา 2560<br>โรงเรียนกุมภวาปี สำนักงานเขตพื้นที่การศึกษามัธยมศึกษา เขต 20</h4>";
            $oldshool = '<div class="row" id="data4">
            <div class="col-3" style="text-align:  right">
                โรงเรียนเดิม
            </div>
            <div class="col-3">
                <input class="form-control" style="width: 100%" type="text" min="1" max="12" name="old_school" id="old_room" required>
            </div>
            <div class="col-2" style="text-align:right">
            จังหวัด
        </div>
        <div class="col-4">
            <input class="form-control" style="width: 100%" type="text" min="1" max="12" name="old_province" id="old_room" required>
        </div>
        </div>';
        }



        // $plans='<select name="plans'.$n.'">';
        // while($row=mysqli_fetch_array($result)){
        //     $plans=$plans."<option value='".$row["plans_id"]."'>".$row["plans_name"]."</option>";
        // }
        // $plans=$plans."</select>";

        $plans = "";
        $plans2 = "";
        for ($i = 1; $i <= $n; $i++) {
            $sql = "select * from lesson_plans where for_level='$positions'";
            $result = mysqli_query($conn, $sql);
            $plans = $plans . '<br><div class="row" id="data4">
            <div class="col-3" style="text-align:  right">
                แผนการเรียนที่ ' . $i . '
            </div>';
            // $plans = $plans . '<select name="plans' . $i . '">';
            // while ($row = mysqli_fetch_array($result)) {
            //     $plans = $plans . "<option value='" . $row["plans_id"] . "'>" . $row["plans_name"] . "</option>";
            // }
            // $plans = $plans . "</select>";
            $plans = $plans . '<div class="col" style="width:100%">';
            $plans = $plans . '<select class="form-control" name="plans' . $i . '">';
            while ($row = mysqli_fetch_array($result)) {
                $plans = $plans . "<option value='" . $row["plans_id"] . "'>" . $row["plans_name"] . "</option>";
            }
            $plans = $plans . "</select>";
            $plans = $plans . '</div></div>';
            $plans2 = $plans;
        }

        // if($positions=="M4"){
        //     for($n=2;$n<=3;$n++){
        //         $a = '<br><div class="row" id="data4">
        //         <div class="col-3" style="text-align:  right">
        //             แผนการเรียนที่ '.$n.'
        //         </div>
        //         <div class="col-6">
        //             '.$plans.'
        //         </div>
        //         </div>';
        //         $plans2=$plans2.$a;
        //     }
        // }




        $form_std = '<div class="container" id="register" style="margin-top: 7em">
            <form action="add_data.php" method="get">
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
                        <div class="col-md-3" id="row1" id="namee">คำนำหน้าชื่อ : 
                            </div>
                        
                        <div class="col-9">
                            <input type="radio" value="เด็กชาย" name="name_title" checked>&nbsp เด็กชาย
                            <input type="radio" value="เด็กหญิง" name="name_title">&nbsp เด็กหญิง
                            <input type="radio" value="นาย" name="name_title">&nbsp นาย
                            <input type="radio" value="นาง" name="name_title">&nbsp นาง
                            <input type="radio" value="นางสาว" name="name_title">&nbsp นางสาว
                        </div>
                        
                    </div> 
                   
                    <br>
    
                    <div class="row" id="data4">
                    <div class="col-3" style="text-align:  right">
                        ชื่อ:
                    </div>
                    <div class="col-9">
                    <input  style="width: 100%" type="text" name="fname" id="fname" placeholder="สมชาย" required class="form-control">
                    </div>
                </div>
            <br>
                <div class="row" id="data4">
                    <div class="col-3" style="text-align:  right">
                        นามสกุล:
                    </div>
                    <div class="col-9">
                    <input class="form-control" style="width: 100%" type="text" name="lname" id="lname" placeholder="รักชาติ" required>
                    </div>
                </div>
<br>

<div class="row" id="data4">
                    <div class="col-3" style="text-align:  right">
                    เลขประจำตัวประชาชน
                    </div>
                    <div class="col-9">
                    <input class="form-control" style="width: 100%" type="text" name="person_id" id="person_id" placeholder="ไม่ต้องระบุ(-)" required pattern="[0-9]{13}">
                    </div>
                </div>

                        <br>
    
                    <div class="row" id="data4">
                        <div class="col-3" style="text-align:right">
                        วัน/เดือน/ปีเกิด
                        </div>
                        <div class="col-9" style="text-align:right">
                        <input class="form-control" id="birthday" class="form-control" name="birthday">
                        </div>
                        
                        <script>
                        picker_date(document.getElementById("birthday"),{year_range:"-100:+0"});
                    </script>
                    </div>

                        <br>

                        <div class="row" id="data4">
                        <div class="col-3" style="text-align:  right">
                        เบอร์โทรศัพท์
                        </div>
                        <div class="col-9" style="text-align:  right">
                        <input class="form-control" type="text" name="tel" id="tel" style="width: 100%" required pattern="[0-9]{10}">
                        </div>
                
                    </div>


                        <br>
                        <input class="form-control" type="hidden" name="student" value="' . $_GET["student"] . '">



                    
                    <div class="container-fluid" id="data_phone1">
                        <div class="row" id="data4">
                           
                            <div class="col-6" id="inputidhome">
                            ที่อยู่บ้านเลขที่:
                                <input class="form-control"  type="text" name="home_no" id="home_no" required>
                            </div>
                           
                            <div class="col-6" id="inputidhome2">
                                หมู่ที่:<input class="form-control" type="text" name="group_no" id="group_no" required>
                            </div>
                            
                            
                        </div>
                        <br>
<div class="col-4" id="inputidhome3">
                               บ้าน: <input class="form-control" type="text" name="home" id="home" required>
                            </div>

                        <div class="col-3" id="idhome" >
                        ที่อยู่บ้านเลขที่
                    </div>
                    <div class="col-2" id="inputidhome">
                        <input class="form-control"  type="text" name="home_no" id="home_no" required>
                    </div>
                    <div class="col-1" id="idhome2">
                        หมู่ที่
                    </div>
                    <div class="col-2" id="inputidhome2">
                        <input class="form-control" type="text" name="group_no" id="group_no" required>
                    </div>
                    <div class="col-1" id="idhome6">
                        บ้าน
                    </div>
                    <div class="col-3" id="inputidhome3">
                        <input class="form-control" type="text" name="home" id="home" required>
                    </div>
    






                        <div class="row" id="data4">
                            <div class="col-3" id="idhome7" >
                                ตำบล
                            </div>
                            <div class="col-2" id="inputidhome4">
                                <input class="form-control"  type="text" name="sub_area" id="sub_area" required>
                            </div>
                            <div class="col-1"  id="idhome8">
                                อำเภอ
                            </div>
                            <div class="col-2" id="inputidhome9">
                                <input class="form-control"  type="text" name="area" id="area" required>
                            </div>
                            <div class="col-1" >
                                จังหวัด
                            </div>
                            <div class="col-3" id="inputidhome5">
                                <input class="form-control"  type="text" name="province" id="province" required>
                            </div>
                        </div>

                        <br>

                        <div class="row" id="data4">
                        <div class="col-3" id="idhome3">
                            รหัสไปรษณีย์
                        </div>
                   
                        <div class="col-2">
                            <input class="form-control " id="inputidhome6"  type="text" name="post" id="post" required pattern="[0-9]{5}">
                        </div> </div>
                        </div>
    
                        <br>
    
                        <div class="row" id="data4" >
                            <div class="col-3" id="idhome4">
                                ชื่อบิดา
                            </div>
                            <div class="col">
                                <input class="form-control" id="inputidhome7"  type="text" name="father_name" id="father_name" required>
                            </div>
                        </div>
    
                        <br>
    
                        <div class="row" id="data4" >
                            <div class="col-3" id="idhome5">
                                ชื่อมารดา
                            </div>
                            <div class="col">
                                <input class="form-control"  id="inputidhome8"  type="text" name="mother_name" id="mother_name" required>
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
                    <!--<input style="width:100%;padding:0.5em;border :10px solid green;background-color:green;border-radius:10px;font-size:1.5em;color:white" name="btn_sub_form" type="submit" value="ส่งเอกสาร">-->
                </div>
                <input style="width:100%;padding:0.5em;border :10px solid green;background-color:green;border-radius:10px;font-size:1.5em;color:white" name="btn_sub_form" type="submit" value="ส่งเอกสาร">

            </form>
        </div>';
        

        // <br><u>หลักฐานประกอบการสมัคร</u><br>
        // <div class="row" id="data4">
        //     <div class="col-3" style="text-align:  right">

        //     </div>
        //     <div class="col-1">
        //         <input style="width: 100%" type="checkbox" name="doc[]" id="doc">
        //     </div>
        //     <div class="col-8">
        //         ' . $property . '
        //     </div>
        // </div>
        // <div class="row" id="data4">
        //     <div class="col-3" style="text-align:  right">

        //     </div>
        //     <div class="col-1">
        //         <input style="width: 100%" type="checkbox" name="doc[]" id="doc">
        //     </div>
        //     <div class="col-8">
        //         สำเนาทะเบียนบ้านผู้สมัคร หรืออรังสือรับรองความประพฤติ
        //     </div>
        // </div>
        // <div class="row" id="data4">
        //     <div class="col-3" style="text-align:  right">

        //     </div>
        //     <div class="col-1">
        //         <input style="width: 100%" type="checkbox" name="doc[]" id="doc">
        //     </div>
        //     <div class="col-8">
        //         รูปถ่าย 1 นิ้ว จำนวน 2 รูป (สำหรับติดบัตรเข้าห้องสอบ)
        //     </div>
        // </div>
        // <div class="row" id="data4">
        //     <div class="col-3" style="text-align:  right">

        //     </div>
        //     <div class="col-1">
        //         <input style="width: 100%" type="checkbox" name="doc[]" id="doc">
        //     </div>
        //     <div class="col-8">
        //         สำเนาเอกสารการเปลี่ยนชื่อ-สกุล (ถ้ามี)
        //     </div>
        // </div>

        // <br><u>เจ้าหน้าที่รับสมัคร</u><br><br>

        // <div class="row" id="data5">
        //     <div class="col-3">

        //     </div>
        //     <div class="col-3">

        //     </div>
        //     <div class="col-6" style="text-align:  right">
        //         ลงชื่อ.............................................................................................กรรมการการรับสมัคร
        //         <br><br><br><br><br>
        //     </div>
        // </div>


        if ($_GET["student"] == "1") {
            echo $form_std;
        }
        if ($_GET["student"] == "2_1") {
            echo $form_std;
        }
        if ($_GET["student"] == "2_2") {
            echo $form_std;
        }
    }

    // if(isset($_GET["btn_sub_form"])){
    //     echo "<script>window.open('testpdf.php','_self')</script>";
    // }
    ?>




    <!-- <div class="container" id="register" style="margin-top: 7em">
        <form action="admission.php" method="get">
            <div class="row" id="button_row_2">
                <div class="col-1">
                </div>
                <div class="col-10">
                    <center>
                        <img style="width: 10em" src="https://data.bopp-obec.info/emis/pic_school/1041680845.jpg" alt=""><br>
                        <br>
                        <h4>ใบสมัครเพื่อคัดเลือกเข้าเรียนระดับชั้นมัธยมศึกษาปีที่ 4<br>ประเภทนักเรียนมัธยมศึกษาปีที่ 3 (นักเรียนเดิม) ปีการศึกษา 2560<br>โรงเรียนกุมภวาปี สำนักงานเขตพื้นที่การศึกษามัธยมศึกษา เขต 20</h4>
                    </center>
                    <u>ข้อมูลนักเรียน</u><br><br>


                    <div class="row" id="data1">
                        <div class="col-3" style="text-align:right">
                            ชื่อ-สกุล (ด.ญ./ด.ช./นาย/น.ส.)
                        </div>
                        <div class="col-9">
                            <input style="width: 100%" type="text" name="fname" id="fname" placeholder="นายสมชาย รักชาติ">
                        </div>

                        
                    </div>

                    <br>

                    <div class="row" id="data2">
                        <div class="col-3" style="text-align:  right">
                            เลขประจำตัวประชาชน
                        </div>
                        <div class="col-9">
                            <input style="width: 100%" type="text" name="person_id" id="person_id" placeholder="ไม่ต้องระบุ(-)">
                        </div>
                    </div>

                    <br>

                    <div class="row" id="data3">
                        <div class="col-3" style="text-align:  right">
                            วัน/เดือน/ปีเกิด
                        </div>
                        <div class="col" style="text-align:  right">
                            <input type="date" name="birthday" id="birthday" style="width: 100%">
                        </div>
                    </div>

                    <br>

                    <div class="row" id="data4">
                        <div class="col-3" style="text-align:  right">
                            ที่อยู่บ้านเลขที่
                        </div>
                        <div class="col-2">
                            <input style="width:100%" type="text" name="home_no" id="home_no">
                        </div>
                        <div class="col-1" style="">
                            หมู่ที่
                        </div>
                        <div class="col-2">
                            <input style="width:100%" type="text" name="group_no" id="group_no">
                        </div>
                        <div class="col-1" style="">
                            บ้าน
                        </div>
                        <div class="col-3">
                            <input style="width:100%" type="text" name="home" id="home">
                        </div>
                    </div>
                    <br>

                    <div class="row" id="data4">
                        <div class="col-3" style="text-align:  right">
                            ตำบล
                        </div>
                        <div class="col-2">
                            <input style="width:100%" type="text" name="sub_area" id="sub_area">
                        </div>
                        <div class="col-1" style="">
                            อำเภอ
                        </div>
                        <div class="col-2">
                            <input style="width:100%" type="text" name="area" id="area">
                        </div>
                        <div class="col-1" style="">
                            จังหวัด
                        </div>
                        <div class="col-3">
                            <input style="width:100%" type="text" name="province" id="province">
                        </div>
                    </div>

                    <br>

                    <div class="row" id="data4">
                        <div class="col-3" style="text-align:  right">
                            ชื่อบิดา
                        </div>
                        <div class="col">
                            <input style="width: 100%" type="text" name="father_name" id="father_name">
                        </div>
                    </div>

                    <br>

                    <div class="row" id="data4">
                        <div class="col-3" style="text-align:  right">
                            ชื่อมารดา
                        </div>
                        <div class="col">
                            <input style="width: 100%" type="text" name="mother_name" id="mother_name">
                        </div>
                    </div>

                    <br>

                    <div class="row" id="data4">
                        <div class="col-3" style="text-align:  right">
                            สถานภาพบิดา-มารดา
                        </div>
                        <div class="col-1">
                            <input style="width: 100%" type="checkbox" name="status_fam[]" id="people_id">
                        </div>
                        <div class="col-2">
                            อยู่ด้วยกัน
                        </div>
                        <div class="col-1">
                            <input style="width: 100%" type="checkbox" name="status_fam[]" id="people_id">
                        </div>
                        <div class="col-2">
                            หย่าร้าง
                        </div>
                        <div class="col-1">
                            <input style="width: 100%" type="checkbox" name="status_fam[]" id="people_id">
                        </div>
                        <div class="col-2">
                            แยกกันอยู่
                        </div>
                    </div>

                    <div class="row" id="data4">
                        <div class="col-3" style="text-align:  right">

                        </div>
                        <div class="col-1">
                            <input style="width: 100%" type="checkbox" name="status_fam[]" id="people_id">
                        </div>
                        <div class="col-2">
                            บิดาถึงแก่กรรม
                        </div>
                        <div class="col-1">
                            <input style="width: 100%" type="checkbox" name="status_fam[]" id="people_id">
                        </div>
                        <div class="col-2">
                            มารดาถึงแก่กรรม
                        </div>
                    </div>


                    <br>

                    <div class="row" id="data4">
                        <div class="col-3" style="text-align:  right">
                            กำลังศึกษาชั้นมัธยมศึกษาปีที่ 3/
                        </div>
                        <div class="col-1">
                            <input style="width: 100%" type="number" min="1" max="12" name="old_room" id="old_room">
                        </div>
                        <div class="col-4">
                            ปีการศึกษา 2558 เลขประจำตัวนักเรียน
                        </div>
                        <div class="col-4">
                            <input style="width: 100%" type="text" name="std_id_lod_school" id="std_id_lod_school">
                        </div>
                    </div>

                    <br>

                    <div class="row" id="data4">
                        <div class="col-3" style="text-align:  right">
                            มีผลการเรียนเฉลี่ย 5 ภาคเรียน
                        </div>
                        <div class="col-6">
                            <input style="width: 100%" type="text" name="gpax" id="gpax">
                        </div>
                    </div>

                    <br><br><u>แผนการเรียน</u><br>

                    <br>

                    <div class="row" id="data4">
                        <div class="col-3" style="text-align:  right">
                            แผนการเรียนอันดับ 1
                        </div>
                        <div class="col-6">
                            <input style="width: 100%" type="number" name="plans1" id="people_id">
                        </div>
                    </div>

                    <br>

                    <div class="row" id="data4">
                        <div class="col-3" style="text-align:  right">
                            แผนการเรียนอันดับ 2
                        </div>
                        <div class="col-6">
                            <input style="width: 100%" type="number" name="plans2" id="people_id">
                        </div>
                    </div>


                    <br>
                    <div class="row" id="data4">
                        <div class="col-3" style="text-align:  right">
                            แผนการเรียนอันดับ 3
                        </div>
                        <div class="col-6">
                            <input style="width: 100%" type="number" name="plans3" id="people_id">
                        </div>
                    </div>

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
                            ลงชื่อ...........................................................................................................................ผู้สมัคร
                        </div>
                    </div>

                    <br><u>หลักฐานประกอบการสมัคร</u><br>
                    <div class="row" id="data4">
                        <div class="col-3" style="text-align:  right">

                        </div>
                        <div class="col-1">
                            <input style="width: 100%" type="checkbox" name="doc[]" id="doc">
                        </div>
                        <div class="col-8">
                            ปพ.1 จบหลักสูตรชั้นมัธยมศึกษาปีที่ 3 หรือหนังสือรับรองผลการเรียน ปพ.7
                        </div>
                    </div>
                    <div class="row" id="data4">
                        <div class="col-3" style="text-align:  right">

                        </div>
                        <div class="col-1">
                            <input style="width: 100%" type="checkbox" name="doc[]" id="doc">
                        </div>
                        <div class="col-8">
                            สำเนาทะเบียนบ้านผู้สมัคร หรืออรังสือรับรองความประพฤติ
                        </div>
                    </div>
                    <div class="row" id="data4">
                        <div class="col-3" style="text-align:  right">

                        </div>
                        <div class="col-1">
                            <input style="width: 100%" type="checkbox" name="doc[]" id="doc">
                        </div>
                        <div class="col-8">
                            รูปถ่าย 1 นิ้ว จำนวน 2 รูป (สำหรับติดบัตรเข้าห้องสอบ)
                        </div>
                    </div>
                    <div class="row" id="data4">
                        <div class="col-3" style="text-align:  right">

                        </div>
                        <div class="col-1">
                            <input style="width: 100%" type="checkbox" name="doc[]" id="doc">
                        </div>
                        <div class="col-8">
                            สำเนาเอกสารการเปลี่ยนชื่อ-สกุล (ถ้ามี)
                        </div>
                    </div>

                    <br><u>เจ้าหน้าที่รับสมัคร</u><br><br>

                    <div class="row" id="data5">
                        <div class="col-3">

                        </div>
                        <div class="col-3">

                        </div>
                        <div class="col-6" style="text-align:  right">
                            ลงชื่อ.............................................................................................กรรมการการรับสมัคร
                            <br><br><br><br><br>
                        </div>
                    </div>
                </div>
                <br>
                <br><br>
                <input style="width:100%;padding:0.5em;border :10px solid green;background-color:green;border-radius:10px;font-size:1.5em;color:white" type="submit" value="ส่งเอกสาร">
            </div>
        </form>
    </div> -->

    <!-- <footer class="page-footer font-small" style="background-color:#000000">
        
        <div class="footer-copyright text-center py-3" id="copyright">© 2020 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/">kwp.ac.th</a>
        </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    </footer> -->
    <?php
        if(isset($_GET["msg"])){
            if($_GET["msg"]=="err"){
                echo "<hr><br><br><br><div style='text-align:center;font-size:2em'>หมายเลขบัตรประชาชนนี้ถูกใช้งานไปแล้ว</div>";
            }
        }
    ?>




    <br><br><br><br>

    <script src="https://kit.fontawesome.com/541e01753a.js"></script>   
    <?php
        include "in_footer.php";
    ?>
   

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>