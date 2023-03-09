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
    <!-- navbar -->
    <?php
            include "in_nav.php";
        ?>
    <!-- closenav -->

    
    <!-- CLOSE CONTAINNER -->

    <div class="container">
    <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <center>
            <h2>เช็คชื่อเช้าสอบ</h2>
        </center>
        <form action="checkname_data.php" method="get">
            <div class="row" id="data4">
                <div class="col-1" style="text-align:  right">

                </div>
                <div class="col-10">
                    <br>
                    <input style="text-align: center;width: 100%;height: 5em ;border-radius: 1em;border: 3px solid #04808f" type="text" name="std_id" id="people_id " autofocus placeholder="กรุณากรอกรหัสประจำตัวประชาชน">
                </div>
                <div class="col-1" style="text-align:  right">

                </div>


                <div class="col-1" style="text-align:  right">

                </div>
                <div class="col-10">
                    <br>
                    <button style="text-align: center;width: 100%;height: 5em ;border-radius: 1em;border: 0px solid #04808f ;background-image: linear-gradient(to left, rgb(52, 73, 94 ) , rgb(38, 162, 167));color:white;font-size:1.25em" name="" id="people_id " placeholder="กรุณากรอกรหัสประจำตัวประชาชน" autofocus onclick="showstd()">บันทึกข้อมูล</button>
                </div>
                <div class="col-1" style="text-align:  right">

                </div>
            </div>
        </form>
        <div class="row" id="btn-link">

            <div class="col-1" style="text-align:  right">
            </div>
            <div class="col-10" style="text-align:  right">
            <div style="height:30px"></div>
            <a href="get_checkname.php"><button class="btn btn-success" type="button" style="text-align: center;width: 30%;height: 2em ;border-radius: 0.5em;color:white;font-size:1.25em" >ดาวน์โหลดรายชื่อผู้เข้าสอบ</button></a>
            </div>
            <div class="col-1" style="text-align:  right">
            </div>
        </div>

        <div class="row" id="result">

            <div class="col-1" style="text-align:  right">

            </div>
            <?php

            if (isset($_GET["msg"]) == 1001) {
                echo '
                        <div>
        
                        </div>
                        <div class="col-12" style="color:red;font-size:2em;" >
                            <br>
                            <center>ไม่พบข้อมูล หรือ บัตรเข้าห้องสอบยังไม่ถูกอนุมัติ</center>
                        </div>
                        <div>
        
                        </div>
                    </div>';
            }
            include "connectDB/connectDB.php";
            echo '<div style="height:50px"></div>';
            echo '<table class="table table-striped table-bordered table-hover">
                        <thead>
                            <th>ลำดับ</th>
                            <th>รหัสประจำตัว</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>ระดับชั้น</th>
                        </thead>';

            $sql = "SELECT *
                        FROM check_name
                        JOIN student ON student.id_card = check_name.id_card
                        ORDER BY check_id desc ";
            // $sql="select * from check_name ORDER BY check_id desc";

            $result = mysqli_query($conn, $sql);
            $n = mysqli_num_rows($result);
            while ($row = mysqli_fetch_array($result)) {
                $a = "";
                if ($row["education_level"] == "M4") {
                    $a = "มัธยมศึกษาปีที่ 4 ";
                } else {
                    $a = "มัธยมศึกษาปีที่ 1 ";
                }
                echo "<tr>";
                echo "<td>" . $n-- . "</td>";
                echo "<td>" . $row["id_card"] . "</td>";
                echo "<td>" . $row["fname"] . "</td>";
                echo "<td>" . $row["lname"] . "</td>";
                echo "<td>" . $a . "</td>";
                echo "</tr>";
            }
            echo '</table>';

            ?>
            <!-- <div class="col-10">
                    <br>
                            4564654684
                </div> -->
            <div class="col-1" style="text-align:  right">

            </div>
        </div>
    </div>





    <!-- <footer class="page-footer font-small" style="background-color:#000000">
        <div class="footer-copyright text-center py-3" id="copyright">© 2020 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/">kwp.ac.th</a>
        </div>
    </footer> -->


    <br>
    <br>
    <script src="https://kit.fontawesome.com/541e01753a.js"></script>  
    <?php
        include "in_footer.php";
    ?>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>