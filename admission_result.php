<?php
include "connectDB/connectDB.php";
session_start();
include "in_nav.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KW Admission</title>
    <link rel="stylesheet" href="css/index4.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/scroce_student.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function result_m(...args) {
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();

            } else {
                xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById(args[1]).innerHTML = xmlhttp.responseText;
                }
            }
            let number = document.getElementById(args[0]).value;
            xmlhttp.open("GET", "student/result_sit.php?level="+args[0]+"&number=" +number,true);
            xmlhttp.send();
            return;
        }

        function setdisplay(args){
            if(args=="m1"){
                document.getElementById("m1").style.display="block";
                document.getElementById("m4").style.display="none";
            }
            else if(args=="m4"){
                document.getElementById("m1").style.display="none";
                document.getElementById("m4").style.display="block";
            }
        }

    </script>
</head>

<body>
    <section id="content" style="margin-top: 7em;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 col-12">
                    <button onclick="setdisplay('m1')" style="width: 100%;" class="btn btn-primary">มัธยมศึกษาปีที่ 1</button>
                </div>
                <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 col-12">
                    <button onclick="setdisplay('m4')" style="width: 100%;" class="btn btn-success">มัธยมศึกษาปีที่ 4</button>
                </div>
            </div>
        </div>
        <br>

        <div class="container" id="m1" style="display: none;">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                    <p id="topic_M1">นักเรียนชั้นมัธยมศึกษาปีที่ 1</p>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <input type="number" id="edt_num_m1" placeholder="10">
                </div>
                <div class="col-xl-2 col-lg-6 col-md-12 col-sm-12 col-12">
                    <button class="btn btn-success" onclick="result_m('edt_num_m1','result_m1')">ยืนยัน</button>
                </div>
            </div>
            <div class="row" id="result_m1">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    ผลลัพธ์
                    <hr>
                </div>
            </div>
        </div>

        <div class="container" id="m4" style="display: none;">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                    <p id="topic_M1">นักเรียนชั้นมัธยมศึกษาปีที่ 4</p>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <input type="number" id="edt_num_m4" placeholder="10">
                </div>
                <div class="col-xl-2 col-lg-6 col-md-12 col-sm-12 col-12">
                    <button class="btn btn-success" onclick="result_m('edt_num_m4','result_m4')">ยืนยัน</button>
                </div>
            </div>
            <div class="row" id="result_m4">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    ผลลัพธ์
                    <hr>
                </div>
            </div>
        </div>
        </div>
    </section>
</body>

</html>