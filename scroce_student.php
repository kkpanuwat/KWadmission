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
        function clickBTN() {
            let sub_name = ["scr_thai", "scr_eng", "scr_math", "scr_sci", "scr_social"];
            let i;
            let status = "success";
            for (let i = 0; i < sub_name.length; i++) {
                let sub = document.getElementById(sub_name[i]).value;
                if (sub == null || sub == "") {
                    let al_sub = document.getElementById(sub_name[i]);
                    al_sub.style.border = "1px solid red";
                    al_sub.style.transition = "0.7s all";
                    status = "error";
                }
            }
            if (status != "error") {
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();

                } else {
                    xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        status="ทำรายการสำเร็จ";
                        if(xmlhttp.responseText!="success"){
                            status="ทำรายการไม่สำเร็จ";
                        }
                        let modal = document.getElementById('mybtn');
                        document.getElementById('content_modal').innerHTML=status;
                        modal.click()
                    }
                    for(let i = 0; i < sub_name.length; i++){
                        document.getElementById(sub_name[i]).value="";
                    }
                    document.getElementById("edt_personId").value="";
                    document.getElementById('topic_result').innerHTML="กรุณากรอกรหัสบัตรประจำตัวประชาชนของผู้เข้าสอบเพื่อกรอกคะแนน";
                }
                let score = "";
                for (let i = 0; i < sub_name.length; i++) {
                    let value_scr = document.getElementById(sub_name[i]).value;
                    if (i == sub_name.length - 1) {
                        score += sub_name[i] + "=" + value_scr;
                    } else {
                        score += sub_name[i] + "=" + value_scr + "&";
                    }
                }
                let student = document.getElementById("edt_personId").value;
                let level = document.getElementById("level_std").innerHTML;
                alert(level);
                xmlhttp.open("GET", "student/add_scr.php?student=" + student + "&" + score+"&std_level="+level, true);
                xmlhttp.send();
                return;
            }
        }

        function btn_search() {
            let data_person_edt = document.getElementById("edt_personId").value;
            let result_data = document.getElementById("result");
            if (data_person_edt == "" || data_person_edt == null) {
                result_data.innerHTML = "กรอกข้อมูลก่อนทำรายการ";
                result_data.style.color = "red";
                result_data.style.transition = "0.7s all";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();

                } else {
                    xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
                }

                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        if (xmlhttp.responseText != null) {
                            document.getElementById("topic_result").innerHTML = xmlhttp.responseText;
                            document.getElementById("topic_result").style.transition = "0.7s all";
                            let result = document.getElementById("result");
                            let div_eng_input = document.createElement('div');
                            let div_eng_entry = document.createElement('div');
                            div_eng_entry.innerHTML = "วิชาภาษาอังกฤษ"
                            div_eng_entry.className = "col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 entry_sub";
                            div_eng_input.className = "col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 input_entry";
                            let new_eng = document.createElement("input");
                            new_eng.type = "number";
                            new_eng.name = "scr_eng";
                            new_eng.className = "input_scr";
                            new_eng.id = "scr_eng";
                            new_eng.placeholder = "กรอกคะแนนวิชาภาษาอังกฤษ";
                            div_eng_input.appendChild(new_eng);

                            let div_thai_input = document.createElement('div');
                            let div_thai_entry = document.createElement('div');
                            div_thai_entry.innerHTML = "วิชาภาษาไทย"
                            div_thai_entry.className = "col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 entry_sub";
                            div_thai_input.className = "col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 input_entry";
                            let new_thai = document.createElement("input");
                            new_thai.name = "scr_thai";
                            new_thai.id = "scr_thai";
                            new_thai.type = "number";
                            new_thai.className = "input_scr";
                            new_thai.placeholder = "กรอกคะแนนวิชาภาษาไทย"
                            div_thai_input.appendChild(new_thai)

                            let div_math_input = document.createElement('div');
                            let div_math_entry = document.createElement('div');
                            div_math_entry.innerHTML = "วิชาคณิตศาสตร์"
                            div_math_entry.className = "col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 entry_sub";
                            div_math_input.className = "col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 input_entry";
                            let new_math = document.createElement("input");
                            new_math.name = "scr_math";
                            new_math.id = "scr_math"
                            new_math.type = "number";
                            new_math.className = "input_scr";
                            new_math.placeholder = "กรอกคะแนนวิชาคณิตศาสตร์"
                            div_math_input.appendChild(new_math)

                            let div_sci_input = document.createElement('div');
                            let div_sci_entry = document.createElement('div');
                            div_sci_entry.innerHTML = "วิชาวิทยาศาสตร์"
                            div_sci_entry.className = "col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 entry_sub";
                            div_sci_input.className = "col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 input_entry";
                            let new_sci = document.createElement("input");
                            new_sci.name = "scr_sci";
                            new_sci.type = "number";
                            new_sci.id = "scr_sci";
                            new_sci.className = "input_scr";
                            new_sci.placeholder = "กรอกคะแนนวิชาวิทยาศาสตร์"
                            div_sci_input.appendChild(new_sci)

                            let div_social_input = document.createElement('div');
                            let div_social_entry = document.createElement('div');
                            div_social_entry.innerHTML = "วิชาสังคมศึกษา"
                            div_social_entry.className = "col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 entry_sub";
                            div_social_input.className = "col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 input_entry";
                            let new_scoial = document.createElement("input");
                            new_scoial.name = "scr_social";
                            new_scoial.id = "scr_social";
                            new_scoial.type = "number";
                            new_scoial.className = "input_scr";
                            new_scoial.placeholder = "กรอกคะแนนวิชาสังคมศึกษา"
                            div_social_input.appendChild(new_scoial)

                            let btn_entery = document.createElement('div');
                            let btn_submit = document.createElement('div');
                            btn_entery.className = "col-xl-9 col-lg-9 col-md-6 col-sm-6 col-6";
                            btn_submit.className = "col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6";
                            let inner_btn = document.createElement('button');
                            inner_btn.innerHTML = "ยืนยัน";
                            inner_btn.className = "btn btn-primary btn_sub";
                            inner_btn.setAttribute("onclick", "clickBTN()");
                            btn_submit.appendChild(inner_btn);



                            result.appendChild(div_eng_entry);
                            result.appendChild(div_eng_input);
                            result.appendChild(div_thai_entry);
                            result.appendChild(div_thai_input);
                            result.appendChild(div_math_entry);
                            result.appendChild(div_math_input);
                            result.appendChild(div_sci_entry);
                            result.appendChild(div_sci_input);
                            result.appendChild(div_social_entry);
                            result.appendChild(div_social_input);
                            result.appendChild(btn_entery);
                            result.appendChild(btn_submit);
                        }
                    }
                }
            }
            xmlhttp.open("GET", "mymodule/check_student.php?student=" + data_person_edt, true);
            xmlhttp.send();
            return;
        }
    </script>

</head>

<body>
    <section id="content">
        <div class="contain container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <input type="text" name="edt_personId" id="edt_personId" placeholder="รหัสบัตรประจำตัวประชาชน">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <button class="btn" id="btn_search" onclick="btn_search()">ค้นหา</button>
                </div>
            </div>
        </div>


        <div class="contain_result container">
            <div class="row" id="result">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <p id="topic_result">กรุณากรอกรหัสบัตรประจำตัวประชาชนของผู้เข้าสอบเพื่อกรอกคะแนน</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Button to Open the Modal -->
    <button id="mybtn" style="display: none;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Open modal
    </button>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">สถานะการทำรายการ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="content_modal">
                    Modal body..
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                </div>

            </div>
        </div>
    </div>
</body>

</html>