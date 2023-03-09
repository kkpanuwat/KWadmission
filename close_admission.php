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
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        <br>
        <br>
        <?php
                        $sqlin="select * from status_admission";
                        $result=mysqli_query($conn,$sqlin);
                        $row=mysqli_fetch_array($result);
                        if($row["status_ad"]=="00"){
                            $a="cl";
                            $toppic="ปิดอยู่";
                            $color="btn btn-danger";
                            $toppic2="เปิดการใช้งานระบบรับสมัคร";
                            $text_color="red";
                           
                        }
                        else{
                            $a="op";
                            $toppic="เปิดอยู่";
                            $color="btn btn-success";
                            $text_color="green";
                            $toppic2="ปิดการใช้งานระบบรับสมัคร";
                            
                        }
                    ?>
        <center>
            <h2>สถานะระบบรับสมัครนักเรียน : <span style="color:<?php echo $text_color ?>"><?php echo $toppic ?></span> </h2>
        </center>
        <form action="close_admission.php" method="get">
            <div class="row" id="data4">
                <div class="col-1" style="text-align:  right">

                </div>
                <div class="col-10">
                    <br>
                </div>
                <div class="col-1" style="text-align:  right">

                </div>


                <div class="col-1" style="text-align:  right">

                </div>
                <div class="col-10">
                    <br>
                    <button class="<?php echo $color ?>"  style="text-align: center;width: 100%;height: 5em ;border-radius: 1em;border: 3px solid ;color:white;font-size:2em"  name="admisstion_turn" ><?php echo $toppic2?></button> 
                </div>
                <div class="col-1" style="text-align:  right">

                </div>
            </div>
        </form>
    </div>

    <?php
        if(isset($_GET["admisstion_turn"])){
            if($a=="cl"){
                $st ="01";
            }
            else{
                $st="00";
            }
            $sqlin="update status_admission set status_ad = '".$st."'";
            $result=mysqli_query($conn,$sqlin);
            echo "<script>window.open('close_admission.php','_self')</script>";
        }
    ?>

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
