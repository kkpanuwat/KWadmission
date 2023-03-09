<?php include "connectDB/connectDB.php";
session_start(); ?>
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

</head>

<body>
    <!-- navbar -->
    <?php
            include "in_nav.php";
        ?>
    <!-- closenav -->
<!--  -->
    <div id="con1" style="margin:auto; padding:0%;" class="container-fluid">
        <div style="height:50px;"></div>
        <!--  -->
        <div class="well" style="margin:auto; padding:auto; width:100%;">
            <div style="height:50px;"></div>
            <form action="confrim_card.php">
                <div class="container-fluid">
                    <!-- <div class="row">
                        <div class="col">
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="text" name="s_find" id="" placeholder="กรอกข้อมูลที่ต้องการค้นหา">
                        </div>
                        <div class="col-4">
                            <select class="form-control" name="op_s" id="">
                                <option value="fname">ค้นหาจากชื่อ</option>
                                <option value="lname">ค้นหาจากนามสกุล</option>
                                <option value="id_card">ค้นหาจากรหัสประจำตัวประชาชน</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <input class="form-control btn btn-success" name="btn_s" type="submit" value="ค้นหา">
                        </div>
                    </div> -->
                    <!-- style="width: 100%; margin:0% auto; -->
                    <div class="row" id="a" >
                    <center> <div class="col" >
                        <!-- style="width: 17em; height:2.5em; border-radius: 5px; border:1px solid rgb(177, 170, 170); padding:3px;" -->
                            <input  class="i1" type="text" name="s_find"  placeholder="กรอกข้อมูลที่ต้องการค้นหา">
                        </div></center>
                    
                    <center>
                        <!-- style="width: 17em;height:2.5em;border-radius: 5px;" -->
                        <div class="col" >
                            <select  class="i2" name="op_s" >
                                <option class="form_control" value="fname">ค้นหาจากชื่อ</option>
                                <option class="form_control" value="lname">ค้นหาจากนามสกุล</option>
                                <option class="form_control" value="id_card">ค้นหาจากรหัสประจำตัวประชาชน</option>
                            </select>
                        </div></center>
                    
                    
                        <div class="col" >
                            <input style="width: 17em;" class=" btn btn-success" name="btn_s" type="submit" value="ค้นหา">
                        </div>
                </div>
            </form>

            <?php
            echo '<div class="container" >';
            if (isset($_GET["btn_s"])) {
                $user_s = "";
                $user_get = $_GET["s_find"];
                if ($_GET["op_s"] == "fname") {
                    $sql = "SELECT *
                        FROM student
                        INNER JOIN application_form ON student.id_card = application_form.id_card
                        INNER JOIN examination_card ON examination_card.barcode_id = application_form.id_card 
                        WHERE examination_card.status_card = '00' and student.fname ='$user_get'";
                }
                if ($_GET["op_s"] == "lname") {
                    $sql = "SELECT *
                        FROM student
                        INNER JOIN application_form ON student.id_card = application_form.id_card
                        INNER JOIN examination_card ON examination_card.barcode_id = application_form.id_card 
                        WHERE examination_card.status_card = '00' and student.lname ='$user_get'";
                }
                if ($_GET["op_s"] == "id_card") {
                    $sql = "SELECT *
                        FROM student
                        INNER JOIN application_form ON student.id_card = application_form.id_card
                        INNER JOIN examination_card ON examination_card.barcode_id = application_form.id_card 
                        WHERE examination_card.status_card = '00' and student.id_card ='$user_get'";
                }
                $result = mysqli_query($conn, $sql);
                $num_row = mysqli_num_rows($result);
                if ($num_row < 1) {
                    echo '<div style="height:50px;"></div>';
                    echo "<h2>ไม่พบข้อมูลที่ค้นหา</h2><br>";
                } else {
                    echo '<div style="height:50px;"></div>';
                    echo "<h2>พบข้อมูลที่ค้นหาจำนวน " . $num_row . " รายการ</h2><br>";
                    echo '<table class="table  table-responsive table-striped table-bordered table-hover">
                        <thead>
                        <th>ลำดับที่</th>
                        <th>รหัสประจำตัวประชาชน</th>
                        <th>ชื่อ-สกุล</th>
                        <th>ระดับชั้น</th>
                        <th style="width: 20%" id="type_std" >ประเภทนักเรียน</th>
                        <th>การดำเนินการ</th>
                        </thead>
                        <tbody>';
                     
                    $n = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        if ($row["education_level"] == "M1") {
                            $m = "ม.1";
                        } else {
                            $m = "ม.4";
                        }
                        echo '<tr ><td id="nob">' . $n . '</td>';
                        echo '<td>' . $row["barcode_id"] . '</td>';
                        echo '<td>' . $row["name_title"] . $row["fname"] . " " . $row["lname"] . '</td>';
                        echo '<td>' . $m . '</td>';
                        echo '<td id="typestd">' . $row["type_student"] . '</td>';
                        echo '<td id="process">
                            <a href="confrim_card.php?success='.$row['barcode_id'].' " class="btn btn-success" id="btn1"><span class="glyphicon glyphicon-trash">อนุมัติ</span></a> 
                            <div style="height:10px"></div>
                            <a href="register_data.php?userid='.$row['barcode_id'].' " class="btn btn-warning" id="btn1"><span class="glyphicon glyphicon-edit"></span>ตรวจสอบใบสมัคร</a> 
                            <div style="height:10px"></div>
                            <a href="confrim_card.php?del='.$row['barcode_id'].' " class="btn btn-danger" id="btn1"><span class="glyphicon glyphicon-trash"></span>ลบใบสมัคร</a>
                        </td></tr>';
                        $n++;
                    }
                    
                    echo '</tbody> </table</div>';
                    
                    
                }
            }
            
            ?>
            </div>
    
    <!-- CLOSE CONTAINNER -->

<div class="container-fluid" >

    
	<div class="well" style="margin:auto; padding:auto; width:60%;" >
        <!-- <div style="height:50px;"></div> -->
      
		<table class="table table-responsive table-striped table-bordered table-hover">
			<thead>
				<th>ลำดับที่</th>
                <th>รหัสประจำตัวประชาชน</th>
                <th>ชื่อ-สกุล</th>
                <th>ระดับชั้น</th>
                <th style="width: 20%">ประเภทนักเรียน</th>
                <th>การดำเนินการ</th>
			</thead>
			<tbody>
			<?php
                $sql ="SELECT *
                FROM student
                INNER JOIN application_form ON student.id_card = application_form.id_card
                INNER JOIN examination_card ON examination_card.barcode_id = application_form.id_card 
                where examination_card.status_card = '00' ";
                $query=mysqli_query($conn,$sql);
                $n=1;
				while($row=mysqli_fetch_array($query)){
                    if($row["education_level"]=="M1"){
                        $m="ม.1";
                    }
                    else{
                        $m="ม.4";
                    }
			?>
					<tr>
						<td id="nob"><?php echo $n; ?></td>
                        <td><?php echo $row['barcode_id']; ?></td>
                        <td><?php echo $row['name_title'].$row["fname"]." ".$row["lname"]; ?></td>
                        <td><?php echo $m?></td>
                        <td id="typestd" ><?php echo $row["type_student"]?></td>
						<td id="processs">
                            <a href="confrim_card.php?success=<?php echo $row['barcode_id'];?>" class="btn btn-success" id="btn1" ><span class="glyphicon glyphicon-trash">อนุมัติ</span></a>
                            <div style="height:10px;"></div>
                            <a href="register_data.php?userid=<?php echo $row['barcode_id']; ?>" class="btn btn-warning" id="btn1"><span class="glyphicon glyphicon-edit"></span>ตรวจสอบใบสมัคร</a>
                            <div style="height:10px;"></div>
                            <a href="confrim_card.php?del=<?php echo $row['barcode_id'];?>" class="btn btn-danger" id="btn1"><span class="glyphicon glyphicon-trash"></span>ลบใบสมัคร</a>
                        </td>
                        
                    </tr>    <div style="height:20px;"></div>
                    <hr>
                    <div style="height:20px;"></div>
                    <h2>ข้อมูลทั้งหมด</h2>
                    <?php
                    $n++;
                    if(isset($_GET["del"])){
                        $del = $_GET["del"];
                        $sql =
                        "DELETE student,examination_card,parents,application_form,addresss
                        FROM student
                        INNER JOIN application_form ON student.id_card = application_form.id_card
                        INNER JOIN examination_card ON examination_card.barcode_id = application_form.id_card 
                        INNER JOIN addresss ON addresss.id_card = examination_card.barcode_id
                        INNER JOIN parents ON parents.id_card = addresss.id_card
                        where addresss.id_card = '$del'";
                        $result = mysqli_query($conn,$sql);
                        echo "<script>window.open('confrim_card.php','_self')</script>";
                    }

                    if(isset($_GET["success"])){
                        $suc = $_GET["success"];
                        $sql ="UPDATE examination_card SET status_card ='01' where barcode_id='$suc'";
                        $result = mysqli_query($conn,$sql);
                        echo "<script>window.open('confrim_card.php','_self')</script>";
                    }

                    if(isset($_GET["success"])){
                        $suc = $_GET["del"];
                        $sql ="DELETE from user where id_user='$suc'";
                        $result = mysqli_query($conn,$sql);
                        echo "<script>window.open('confrim_card.php','_self')</script>";
                    }
				}
			?>
			</tbody>
		</table>
	</div>
</div>

<?php
    for($i=0;$i<=9;$i++){
        echo "<br>";
    }
?>
    
    <script src="https://kit.fontawesome.com/541e01753a.js"></script>  
    <?php
        include "in_footer.php";
        
    ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            </body>
</html>