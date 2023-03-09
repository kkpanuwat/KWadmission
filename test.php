<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--  เรียกใช้ Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!--  เรียกใช้ JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <!--  เรียกใช้ Font Awesome-->
    <script src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>

    <!--  เรียกใช้  picker_date.js สำหรับสร้างตัวเลือก ปฎิทิน -->
    <script src="https://รับเขียนโปรแกรม.net/picker_date/picker_date.js"></script>

    <title>ตัวอย่าง ตัวเลือกปฎิทิน</title>
</head>

<body>
    <form action="test.php" method="get">
    <div class="container">
        <div class="form-group">
            <label>เลือกวันที่</label>
            <!--  สร้าง textbox สำหรับสร้างตัวเลือก ปฎิทิน โดยมี id มีค่าเป็น my_date  -->
            <input id="my_date" class="form-control" name="birthday">
            <input type="submit">
        </div>
    </div>

    <script>
        //กำหนดให้ textbox ที่มี id เท่ากับ my_date เป็นตัวเลือกแบบ ปฎิทิน
        picker_date(document.getElementById("my_date"), {
            year_range: "-100:+0"
        });
        /*{year_range:"-12:+10"} คือ กำหนดตัวเลือกปฎิทินให้ แสดงปี ย้อนหลัง 12 ปี และ ไปข้างหน้า 10 ปี*/
    </script>
    </form>
</body>

<?php
if (isset($_GET)) {
    echo $_GET["birthday"];
}
?>


</html>