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


    <!-- SLIDE -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/sch2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/sch2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/sch2.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- CLOSE SLIDE  -->

    <!-- START CONTAINER  -->
    <div class="container">
        <div class="row">
            <div class="col">

            </div>
            <div class="col" id="topic_new">
                ข่าวสารประชาสัมพันธ์
            </div>
            <div class="col">

            </div>
        </div>
        <hr>
        <!-- <div class="row" id="row_2">
            <div class="col">
                <a style="text-decoration: none" href="index.php" id="<?php echo $bar1 ?>">ข่าวประชาสัมพันธ์</a>
            </div>
            <div class="col">
                <a style="text-decoration: none" href="index.php?page=2" id="<?php echo $bar2 ?>">ข่าวกิจกรรม</a>
            </div>
            <div class="col">
                <a style="text-decoration: none" href="index.php?page=3" id="<?php echo $bar3 ?>">ข่าวสารเพิ่มเติม</a>
            </div>
        </div> -->

        <!-- START NEWS -->
        <?php
        $page = 1001;
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        }
        if ($page == 1001) {
            $bar1 = "row_2_active";
            $bar2 = "row_2_2";
            $bar3 = "row_2_3";
        } else if ($page == 1002) {
            $bar1 = "row_2_1";
            $bar2 = "row_2_active";
            $bar3 = "row_2_3";
        } else if ($page == 1003) {
            $bar1 = "row_2_1";
            $bar2 = "row_2_2";
            $bar3 = "row_2_active";
        }
        echo "<div class='row' id='row_2'>
       <div class='col-xl-4'>
           <a style='text-decoration: none' href='index.php' id='" . $bar1 . "'>ข่าวประชาสัมพันธ์</a>
       </div><br><br>
       <div class='col-xl-4'>
           <a style='text-decoration: none' href='index.php?page=1002' id='" . $bar2 . "'>ข่าวกิจกรรม</a>
       </div><br><br>
       <div class='col-xl-4'>
           <a style='text-decoration: none' href='index.php?page=1003' id='" . $bar3 . "'>ข่าวสารเพิ่มเติม</a>
       </div>
    </div>";
        if((empty($_SESSION["type"]))){

        }
        else{
            echo "<br><a href='add_news.php?page=" . $page . "' class='btn btn-success btn-lg ' style='float: right' role='button'>เพิ่มข่าวสารใหม่</a><br><br>";
            echo "<br>";
        }
        echo "<input type='hidden' name=''>";
        $sql = mysqli_query($conn, "SELECT * FROM news where type_new='$page' order by news_id DESC ");
        $n=0;
        while ($row = mysqli_fetch_array($sql)) {
            $id_card = $row["news_id"];
            $id_pic = $row["pic"];
            $id_title = $row["topic"];
            $id_content = $row["content"];
            $id_link = $row["link"];
            $id_file = $row["files"];
            $dates = $row["dates"];
            $edit_by = $row["edit_by"];
            $ec_file = "";
            $btn="";
            if ($id_file != "none") {
                $ec_file = "<a style='font-size:1em' href='file/index_news/" . $id_file . "' target=_blank>" . $id_link . "</a><br>";
            }
            
            if((empty($_SESSION["username"]))){
                $btn="";
            }
            else{
                $btn="<a href='edit_news.php?news_id=" . $id_card . "' class='btn btn-primary btn-lg ' role='button'>แก้ไขข้อมูล</a>
                <a href='delete_news.php?news_id=" . $id_card . "' onclick='return confirm(\"คุณแน่ใจที่ต้องการลบ? " . $id_title . "\"); 'class='btn btn-danger btn-lg ' role='button'>ลบข้อมูล</a>";
                // echo "<br><a href='add_news.php?page=" . $page . "' class='btn btn-success btn-lg ' style='float: right' role='button'>เพิ่มข่าวสารใหม่</a><br><br>";

            }
            $card = "<div class='card'>
            <h5 class='card-header'>" . $id_title . "</h5>
            <div class='card-body'>
              <p class='card-text'>" . $id_content . "</p><span style='color:lightgray'>แก้ไขล่าสุด\t".$dates."\t โดย ".$edit_by."</span><br>" . $ec_file .$btn. "
            </div>
          </div>";

            if ($id_pic != "none") {
                $card = "
                <div class='card mb-3' style='max-width: 100%;'>
                <div class='row no-gutters'>
                  <div class='col-md-4'>
                    <img src='img/index_news/" . $id_pic . "'class='card-img' alt='...'>
                  </div>
                  <div class='col-md-8'>
                    <div class='card-body'>
                      <h5 class='card-title'>" . $id_title . "</h5>
                      <p class='card-text'>" . $id_content . "</p><span style='color:lightgray'>แก้ไขล่าสุด\t".$dates."\t โดย ".$edit_by."</span><br>" . $ec_file .$btn."
                    </div>
                  </div>
                </div>
              </div>
                ";
            }
            echo "<br>".$card;
        } ?>
        <br>
        <br>
    </div>

    <!-- FOOTER  -->

    <?php
        include "in_footer.php";
    ?>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>