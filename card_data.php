<?php

use Mpdf\Tag\Address;

session_start();
include "connectDB/connectDB.php";
require_once __DIR__ . '/vendor/autoload.php';
// $s_id_card=$_SESSION["id_card"];
$id_card_input = $_SESSION["id_card"];

$sql = "SELECT student.id_card,examination_card.status_card,application_form.plans,application_form.type_student,
    student.fname,student.lname,student.education_level,student.name_title
    FROM student
    INNER JOIN examination_card ON examination_card.barcode_id = student.id_card
    INNER JOIN application_form ON application_form.id_card = student.id_card
    where student.id_card='$id_card_input' AND examination_card.status_card != '00' ";

$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);
if ($num < 1) {
    unset($_SESSION['id_card']);
    echo "<script>window.open('print_card.php?msg=err','_self')</script>";
    exit();

} else {
    while ($row = mysqli_fetch_array($result)) {
        $posi = 0;
        $idc="";
        for($i=0;$i<=12;$i++){
            if($i==1 ||$i==5||$i==10||$i==12){
                $idc.="-";
            }
            $idc.=$row["id_card"][$i];
        }

        $plans="";
        $plans1=$row["plans"];
        $plans2=explode(",",$plans1);
        $n=1;
        if($row["education_level"]=="M1"){
            $m="ม.1";
        }
        else{
            $m="ม.4";
        }
        foreach($plans2 as $x){
            $sql2="SELECT * from lesson_plans where plans_id= '$x'";
            $result2=mysqli_query($conn,$sql2);
            while($row2=mysqli_fetch_array($result2)){
                $plans.="อันดับที่ ".$n." : ".$row2["plans_name"]."<br>";
                $n++;
            }
            // $plans.="อันดับที่ ".$n." : ".$x."<br>";
            // $n++;
        }

        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 16,
            'default_font' => 'sarabun'
        ]);
        $mpdf->WriteHTML('<div style="position:absolute;top:' . ($posi += 50) . 'px;left:80px;border:1px solid black;" width=600px height=900px></div>');
        $mpdf->WriteHTML('<p style="position:absolute;top:' . ($posi += 50) . 'px;left:350px" align="center"><img src="img/logo.jpg" widht=80px height=80px></p>');
        $mpdf->WriteHTML('<div style="position:absolute;top:' . (70) . 'px;left:560px;border:1px solid black;" width=94.488189px height=122.834646px><div style="text-align:center"><br>รูปถ่าย<br>ขนาด 1 นิ้ว</div></div>');
        $mpdf->WriteHTML('<div style="position:absolute;top:' . (205) . 'px;left:560px;border:1px solid black;" width=94.488189px height=30px><div style="text-align:center">'.$m.'</div></div>');
        $mpdf->WriteHTML('<div style="position:absolute;top:' . ($posi += 150) . 'px;left:250px;"><div style="text-align:center"><h3>บัตรประจำตัวสอบนักเรียน โรงเรียนกุมภวาปี</h3></div></div>');
        $mpdf->WriteHTML('<div style="position:absolute;top:' . ($posi += 100) . 'px;left:150px;">ห้องสอบที่........................ อาคาร........................ เลขที่นั่งสอบ........................</div>');
        $mpdf->WriteHTML('<div style="position:absolute;top:' . ($posi += 40) . 'px;left:150px;">ประเภทนักเรียน : '.$row["type_student"].'</div>');
        $mpdf->WriteHTML('<div style="position:absolute;top:' . ($posi += 40) . 'px;left:150px;">เลขประจำตัวประชาชน : '.$idc.'</div>');
        $mpdf->WriteHTML('<div style="position:absolute;top:' . ($posi += 40) . 'px;left:150px;">ชื่อ - สกุล : '.$row["name_title"].$row["fname"]." ".$row["lname"].'</div>');
        $mpdf->WriteHTML('<div style="position:absolute;top:' . ($posi += 80) . 'px;left:150px;"><u>แผนการเรียน</u></div>');
        $mpdf->WriteHTML('<div style="position:absolute;top:' . ($posi += 40) . 'px;left:150px;">'.$plans.'</div>');
        $mpdf->WriteHTML('<div style="position:absolute;top:' . ($posi += 110) . 'px;left:350px;">ลงชื่อ.......................................................... ผู้สมัคร</div>');
        $mpdf->WriteHTML('<div style="position:absolute;top:' . ($posi += 40) . 'px;left:400px;">( '.$row["name_title"].$row["fname"]." ".$row["lname"].' )</div>');
        $mpdf->WriteHTML('<div style="position:absolute;top:' . ($posi += 60) . 'px;left:150px;"><u>หมายเหตุ</u> ให้ผู้สมัครนำบัตรประจำตัวสอบนักเรียนมาแสดงในวันสอบ</div>');
        //$code = "000001";//รหัส Barcode ที่ต้องการสร้าง
        //$mpdf->writeBarcode('978-1234-567-890');
        $mpdf->WriteHTML('<div style="position:absolute;top:' . ($posi += 70) . 'px;left:230px;"><barcode code="'.$row["id_card"].'" type="EAN128B" height="0.66" text="1" /></div>');
        $mpdf->WriteHTML('<div style="position:absolute;top:' . ($posi += 40) . 'px;left:330px;">'.$row["id_card"].'</div>');

        unset($_SESSION["id_card"]);
        $mpdf->Output();

        // require_once __DIR__ . '/vendor/src/qrcode.php';
        // $bc = new \Mpdf\Barcode();
        // $code = "000001";//รหัส Barcode ที่ต้องการสร้าง
        // $border = 2;//กำหนดความหน้าของเส้น Barcode
        // $height = 50;//กำหนดความสูงของ Barcode
        // echo $generator->getBarcode($code , $generator::TYPE_CODE_128,$border,$height);
        // echo $code ;
        // $mpdf->WriteHTML($code);
        // $mpdf->Output();

        // use Mpdf\QrCode\QrCode;
        // use Mpdf\QrCode\Output;

        // $qrCode = new QrCode('Lorem ipsum sit dolor');

        // $output = new Output\Png();

        // // Save black on white PNG image 100px wide to filename.png
        // $output->output($qrCode, 100, [255, 255, 255], [0, 0, 0], 'filename.png');

    }
}
