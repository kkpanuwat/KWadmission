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
</head>

<body>
    <!-- NAV BAR -->
    <div id="nav_bar_head">
        <nav class="navbar navbar-expand-lg navbar-light  " style="background-color: rgba(0,0,0,0.8);">
            <div class="container">
                <!-- Content here -->
                <a class="navbar-brand" href="#" id="nav_bar">KW ADDMISSION</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="color: white"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" id="nav_bar" href="index.php">หน้าแรก <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav_bar3" href="regulation.php">ระเบียบการ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav_bar4" href="admission.php">สมัครเรียน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav_bar2" href="announcement.php">ประกาศผลสอบ</a>
                        </li>
                        <?php
                        if (empty($_SESSION["username"])) {
                            echo "<li class='nav-item'>
                            <a class='nav-link' id='nav_bar5' href='login.php'>เข้าสู่ระบบ</a>
                        </li>";
                        } else {
                            echo "<li class='nav-item'>
                            <a class='nav-link' id='nav_bar5' href='user.php'>" . $_SESSION['username'] . "</a>
                        </li>";
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

    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <center>
            <h2>ตรวจสอบผลการสมัครเรียน</h2>
        </center>
        <form action="announcement.php" method="get">
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
                    <input style="text-align: center;width: 100%;height: 5em ;border-radius: 1em;border: 3px solid #04808f ;background-color: #04808f;color:white;font-size:1.25em" value="ตรวจสอบ" type="submit" name="" id="people_id " placeholder="กรุณากรอกรหัสประจำตัวประชาชน">
                </div>
                <div class="col-1" style="text-align:  right">

                </div>
            </div>
        </form>
    </div>
    <?php
        if(isset($_GET["std_id"])){
            $_SESSION["id_card"]=$_GET["std_id"];
            echo "<script>window.open('register_data.php','_self')</script>";
            
    }
    ?>




    <!-- <footer class="page-footer font-small" style="background-color:#000000">
        <div class="footer-copyright text-center py-3" id="copyright">© 2020 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/">kwp.ac.th</a>
        </div>
    </footer> -->




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>