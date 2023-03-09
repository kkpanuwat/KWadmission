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
    <br>
    <br>
    <br>
    <div class="container">
        <div style="height:50px;"></div>
        <div style="height:50px;"></div>
        <form action="download_csv.php" method="post">
            <select name="position" id="" class="form-control">
                <option value="ALL">--- กรุณาเลือกระดับชั้นที่ต้องการดาวน์โหลด ---</option>
                <option value="ALL">ระดับชั้นมัธยมศึกษาปีที่ 1 และ 4 </option>
                <option value="M1">ระดับชั้นมัธยมศึกษาปีที่ 1 </option>
                <option value="M4">ระดับชั้นมัธยมศึกษาปีที่ 4 </option>
            </select>
            <div style="height:20px;" ></div>
            <button type="submit" class="btn btn-primary" style="float:right">ดาวห์โหลดเอกสาร</button>
        </form>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
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

</html>