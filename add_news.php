<?php include "connectDB/connectDB.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เพิ่มข่าวสาร</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/add_news2.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
</head>

<body>
    <!-- navbar -->
    <?php
            include "in_nav.php";
        ?>
    <!-- closenav -->


    <!-- CLOSE CONTAINNER -->
    <div id="form_add">
        <form name="form1" class="form" method="post" action="add_news_DB.php" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col-8" id=row_1_1>
                        <div id="topic_lable">หัวเรื่อง</div>
                        <input class="form-control" type='text' name="topic" id="f_name" required /><br>
                        <div id="content_lable">เนื้อหา</div>
                        <!-- <input type='text' name='content' id='l_name' required /><br> -->
                        <textarea name='content' style="height: 15em" id='l_name' required cols="30" rows="30"></textarea>
                        <div id="picture_label">ภาพปกเนื้อหา</div>
                        <input class="form-control" type='file' name='pic_index' id='pro_image'><br>
                        <div id="toppic_file_label">ไฟล์ที่ต้องการอัฟโหลด</div>
                        <div id="toppic_file2_label" style="color:gray">ชื่อการลิงค์เอกสาร</div>
                        <input class="form-control" type='text' name="topic_file" style="padding-left: 10px" id="f_name" placeholder="ดาวน์โหลดเอกสาร"><br>
                        <input class="form-control" type='file' name='file_index' id='pro_image'><br>
                        <input class="form-control" type="hidden" name="page" value="<?php echo $_GET["page"] ?>">
                        <center>
                            <input class="btn btn-success" name="btnSubmit" type="submit" value="บันทึก" />
                            <input style="color:white" class="btn btn-warning" name="btnReset" type="reset" value="รีเซต" />
                            <a href="index.php">
                                <input type="button" class="btn btn-danger" value="ยกเลิก" />
                            </a>
                        </center>
                        <br />
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>