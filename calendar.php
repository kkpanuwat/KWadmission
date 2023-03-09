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
    <script src="https://kit.fontawesome.com/541e01753a.js"></script>   
</head>

<body>
    <!-- navbar -->
    <?php
            include "in_nav.php";
        ?>
    <!-- closenav -->

    
    <!-- CLOSE CONTAINNER -->


    <?php
                        if (empty($_SESSION["username"])) {
                            echo '<div style="height:80px;"></div>';
                        } else {
                            if ($_SESSION["type"] == "01") {
                                echo '    <div class="container">
                                <div style="height:80px;"></div>
                                    <div id="form_add">
                                        <form name="form1" class="form" method="post" action="calendar_data.php" enctype="multipart/form-data">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                    </div>
                                                    <div class="col">
                                                    </div>
                            
                                                    <div class="col-8" id=row_1_1>
                                                        <input  type="file" name="file_calendar" id="pro_image">
                                                            <input class="btn btn-success" name="btnSubmit" type="submit" value="อัพโหลดไฟล์เอกสาร" />
                                                        <br />
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div style="height:20px;"></div>
                                    </div>
                                </div>';
                            } 
                        }
                        ?>


    <!-- <div class="container">
    <div style="height:80px;"></div>
        <div id="form_add">
            <form name="form1" class="form" method="post" action="calendar_data.php" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">
                        <div class="col">
                        </div>
                        <div class="col">
                        </div>

                        <div class="col-8" id=row_1_1>
                            <input type='file' name='file_calendar' id='pro_image'>
                                <input class="btn btn-success" name="btnSubmit" type="submit" value="อัพโหลดไฟล์เอกสาร" />
                            <br />
                        </div>
                    </div>
                </div>
            </form>
            <div style="height:20px;"></div>
        </div>
    </div> -->


    <?php 
    $sql ="select * from calendar ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    echo '<div class="container">
    <div class="row">
        <div class="col-12"><embed src="file/calendar/'.$row["parth"].'" mce_src="test1.pdf" width="100%" height="1000"></embed></div></div></div>'; ?>
    <br>
    <br>
    <?php
        include "in_footer.php";
    ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html> 