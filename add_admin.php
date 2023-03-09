<?php include "connectDB/connectDB.php";
session_start(); ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KW Admission</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index4.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

</head>

<body>
    <!-- navbar -->
    <?php
            include "in_nav.php";
        ?>
    <!-- closenav -->

    
    <!-- CLOSE CONTAINNER -->


    <div class="container-fluid">
        <div style="height:50px;"></div>
        <div style="height:50px;"></div>
        <div class="well" style="margin:auto; padding:auto; width:80%;">
            <span class="pull-left"><a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>เพิ่มผู้ใช้งาน</a></span>
            <div style="height:30px;"></div>
            <table class="table table-responsive-xl table-striped table-bordered table-hover">
                <thead>
                    <th>ลำดับ</th>
                    <th>username</th>
                    <th>password</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>สถานะ</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conn, "select * from user");
                    $n = 1;
                    while ($row = mysqli_fetch_array($query)) {
                        if ($row['types'] == "01") {
                            $a = "ผู้ดูแลระบบ(หลัก)";
                        } else {
                            $a = "ผู้ดูแลระบบ(ย่อย)";
                        }
                    ?>
                        <tr>
                            <td><?php echo $n; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['passwordd']; ?></td>
                            <td><?php echo $row['fname']; ?></td>
                            <td><?php echo $row['lname']; ?></td>
                            <td><?php echo $a; ?></td>
                            <td>
                                <a href="#edit<?php echo $row['id_user'];?>" data-toggle="modal" class="btn btn-warning" id="btn1"><span class="glyphicon glyphicon-edit"></span>แก้ไข</a>
                                <div style="height:10px;"></div>
                                <a href="#del<?php echo $row['id_user']; ?>" data-toggle="modal" class="btn btn-danger" id="btn1"><span class="glyphicon glyphicon-trash"></span>ลบ</a>
                                <?php include('add_admin_view.php');?>
                            </td>
                        </tr>
                    <?php
                        $n++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php include('add_admin_view.php');?>
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
    
    <script src="https://kit.fontawesome.com/541e01753a.js"></script>  
    <?php
        include "in_footer.php";
    ?>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>