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
                            <a class="nav-link" id="nav_bar3" href="#">ระเบียบการ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav_bar4" href="admission.php">สมัครเรียน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav_bar2" href="print_ad.php">พิมพ์ใบสมัคร</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav_bar2" href="print_card.php">พิมพ์บัตรเข้าห้องสอบ</a>
                        </li>
                        <?php
                        if (empty($_SESSION["username"])) {
                            echo "<li class='nav-item'>
                            <a class='nav-link' id='nav_bar5' href='login.php'>เข้าสู่ระบบ</a>
                        </li>";
                        } else {
                            echo "<li class='nav-item'>
                            <a class='nav-link' id='nav_bar5' href='user.php'>".$_SESSION['username']."</a>
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
    <!-- CLOSE NAVBAR -->
    <!-- CLOSE CONTAINNER -->

    <div class="container">
        <div class="row">
            <div class="col" id="topic_new" style="backgroud-color:red">
                <a href="control_card.php">อนุมัติบัตรเข้าห้องสอบ</a>
            </div>
        </div>
    </div>