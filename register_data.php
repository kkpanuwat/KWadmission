<head>

</head>
<?php

use Mpdf\Tag\Address;


session_start();
    include "connectDB/connectDB.php";
    require_once __DIR__ . '/vendor/autoload.php';


    $mpdf = new \Mpdf\Mpdf([    
    'default_font_size' => 16,
    'default_font' => 'sarabun']);

    // $_SESSION["student_type"]="1";
    // $_SESSION["id_card"]="1139900309372";

    //ส่วนตัว
    $fname="";
    $id_card = "";
    $birthday = "";
    $name_title ="";
    $lname ="";

    //ที่อยู่
    $house_no ="";
    $village_no = "";
    $village="";
    $sub_area ="";
    $area = "";
    $province ="";
    $post="";

    //ครอบครัว
    $father ="";
    $monther ="";
    $status_fam = "";

    //ใบสมัคร
    $old_province="none";
    $studen_type ="";
    $oldschool ="";
    $oldroom="";
    $oldgpax="";
    $oldstd_id="";
    $tel ="";
    $plans1="";
    $level = "";
    $type_type_student="";
    $std_id_lod_school="";


    $s_id_card=$_SESSION["id_card"];

    if(isset($_GET["userid"])){
        $s_id_card=$_GET["userid"];
    }

    $sql="SELECT * from student where id_card='$s_id_card'";
    $result  = mysqli_query($conn,$sql);
    $num2=mysqli_num_rows($result);
    if($num2<1){
        echo "<script>window.open('print_ad.php?msg=err','_self')</script>";
        exit();
    }
    else{
    while($row=mysqli_fetch_array($result)){
        $id_card = $row["id_card"];
        $fname=$row["fname"];
        $birthday = $row["birthday"];
        $oldgpax=$row["GPAX"];
        $tel =$row["tel"];
        $level = $row["education_level"];
        $name_title =$row["name_title"];
        $lname =$row["lname"];
        $oldschool =$row["school"];
        $level = $row["education_level"];
    }

    $sql="SELECT * from addresss where id_card='$s_id_card'";
    $result  = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)){
        $house_no = $row["house_no"];
        $village=$row["village"];
        $village_no = $row["village_no"];
        $sub_area=$row["sub_area"];
        $area =$row["area"];
        $province = $row["province"];
        $post =$row["post"];
    }

    $sql="SELECT * from parents where id_card='$s_id_card'";
    $result  = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)){
        $father =$row["father"];
        $monther =$row["mother"];
        $status_fam = $row["statuss"];
    }

    $sql="SELECT * from application_form where id_card='$s_id_card'";
    $result  = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)){
        $studen_type =$row["type_student"];
        $oldstd_id=$row["student_id"];
        $oldroom=$row["rooms"];
        $old_province=$row["oldprovince"];
        $plans1=$row["plans"];
    }

    $plans0=[];
    $sql="SELECT * from lesson_plans";
    $result  = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)){
        $plans0[$row["plans_id"]]=$row["plans_name"];
    }

    // $x=720;
    // $n=1;
    // if($level=="M1"){
    //     $pa='<div style="position:absolute;top:'.$x.'px;left:80px;">'.$n.". ".$plans1.'</div>';
    // }
    
    $strMonthCut = array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
    $birthday2=explode("/",$birthday);
    
    if((int)$birthday2[1]<10){
        $num=(int)$birthday2[1][1];
    }
    else{
       $num=(int)$birthday2[1]; 
    }
    $x=200;
    $po="";
    for ($i=0;$i<=12;$i++){
        $po=$po.'<div width=1.2em height=1.2em style="position:absolute;top:360px;left:'.$x.'px;border:1px solid black;text-align: center">'.$id_card[$i].'<span style="color:#FFFFFF">.</span></div>';
        $x+=40;
    }

    $img1=" ";
    $img2=" ";
    $img3=" ";
    $img4=" ";
    $img5=" ";

    $status_fam2=explode(",",$status_fam);
    foreach($status_fam2 as $x){
        if($x=="อยู่ด้วยกัน"){
            $img1='<img src="img/check.png" width=15px height=15px>';
        }
        else if($x=="หย่าร้าง"){
            $img2='<img src="img/check.png" width=15px height=15px>';
        }
        else if($x=="แยกกันอยู่"){
            $img3='<img src="img/check.png" width=15px height=15px>';
        }
        else if($x=="บิดาถึงแก่กรรม"){
            $img4='<img src="img/check.png" width=15px height=15px>';
        }
        else if($x=="มารดาถึงแก่กรรม"){
            $img5='<img src="img/check.png" width=15px height=15px>';
        }

    }

    $topic="";
    $ma=5;
    $add=30;
    $a=0;
    if($studen_type=="ชั้นมัธยมศึกษาปีที่ 1 ประเภทในเขตพื้นที่บริการและนักเรียนทั่วไป"){
        $toppic ='ใบสมัครเพื่อคัดเลือกเข้าเรียนระดับชั้นมัธยมศึกษาปีที่ 1<br>ประเภทในเขตพื้นที่บริการและนักเรียนทั่วไป ปีการศึกษา 2560<br>โรงเรียนกุมภวาปี สำนักงานเขตพื้นที่การศึกษามัธยมศึกษา เขต 20';
        // $mpdf->WriteHTML('<div style="position:absolute;top:'.(640-$add).'px;left:80px">โรงเรียนเดิม  </div>');
        // $mpdf->WriteHTML('<div style="position:absolute;top:'.(640-$add).'px;left:240px">'.$oldschool.'</div>');
        // $mpdf->WriteHTML('<div style="position:absolute;top:'.(640-$add).'px;left:400px">จังหวัด  </div>');
        //$mpdf->WriteHTML('<div style="position:absolute;top:'.(640-$add).'px;left:560px">'.$old_province.'</div>');
        $cap='<div style="position:absolute;top:'.(640).'px;left:80px">โรงเรียนเดิม  </div>
              <div style="position:absolute;top:'.(640).'px;left:240px">'.$oldschool.'<span style="color:#FFFFFF">.</span></div>
              <div style="position:absolute;top:'.(640).'px;left:400px">จังหวัด  </div>
              <div style="position:absolute;top:'.(640).'px;left:560px">'.$old_province.'<span style="color:#FFFFFF">.</span></div>';
              $a=5;
    }
    else if($studen_type=="ประเภทนักเรียนมัธยมศึกษาปีที่ 3 (นักเรียนเดิม)"){
        $toppic='ใบสมัครเพื่อคัดเลือกเข้าเรียนระดับชั้นมัธยมศึกษาปีที่ 4<br>ประเภทนักเรียนมัธยมศึกษาปีที่ 3 (นักเรียนเดิม) ปีการศึกษา 2560<br>โรงเรียนกุมภวาปี สำนักงานเขตพื้นที่การศึกษามัธยมศึกษา เขต 20';
        $cap='<div style="position:absolute;top:'.(640-($add-20)).'px;left:80px">กำลังศึกษาระดับชั้นมัธยมศึกษาปีที่ 3 / </div>
        <div style="position:absolute;top:'.(640-($add-20)).'px;left:320px">'.$oldroom.' ปีการศึกษา 2562 เลขประจำตัวนักเรียน</div>
        <div style="position:absolute;top:'.(640-($add-20)).'px;left:590px">'.$oldstd_id.'</div>
        <div style="position:absolute;top:'.(680-($add-20)).'px;left:80px">มีผลการเรียนเฉลี่ย 5 ภาคเรียน = '.$oldgpax.'<span style="color:#FFFFFF">.</span></div>';
        $add=20;
        $a=10;
        


    }
    else{
        $toppic='ใบสมัครเพื่อคัดเลือกเข้าเรียนระดับชั้นมัธยมศึกษาปีที่ 4<br>ประเภทนักเรียนทั่วไป ปีการศึกษา 2560<br>โรงเรียนกุมภวาปี สำนักงานเขตพื้นที่การศึกษามัธยมศึกษา เขต 20';
        $cap='<div style="position:absolute;top:'.(640).'px;left:80px">โรงเรียนเดิม  </div>
        <div style="position:absolute;top:'.(640).'px;left:240px">'.$oldschool.'<span style="color:#FFFFFF">.</span></div>
        <div style="position:absolute;top:'.(640).'px;left:400px">จังหวัด</div>
        <div style="position:absolute;top:'.(640).'px;left:560px">'.$old_province.'<span style="color:#FFFFFF">.</span></div>';
        
    }

    // $x=720;
    // $n=1;
    // if($level=="M1"){
    //     $pa='<div style="position:absolute;top:'.$x.'px;left:80px;">'.$n.". ".$plans1.'</div>';
    // }

    $posi=720;
    $plans2=explode(",",$plans1);
    $n=1;
    $pa='';
    foreach($plans2 as $x){
        $posi+=25;
        $pa=$pa.'<div style="position:absolute;top:'.$posi.'px;left:80px;">'.$n.". ".$plans0[$x].'<span style="color:#FFFFFF">.</span></div>';
        $n++;
    }


    // <img src="img/check.png" width=15px height=15px>
    $mpdf->WriteHTML('<p align="center"><img src="img/logo.jpg" widht=80px height=80px></p>');
    $mpdf->WriteHTML('<div style="text-align: center"><b>'.$toppic.'<span style="color:#FFFFFF">.</span></b></div>');
    $mpdf->WriteHTML('<u>ข้อมูลนักเรียน</u><br>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(320-$ma).'px;left:80px">ชื่อ-สกุล :</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(320-$ma).'px;left:200px">'.$name_title.$fname." ".$lname.'<span style="color:#FFFFFF">.</span></div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(360-$ma).'px;left:80px">รหัสบัตรประชาชน :</div>');
    $mpdf->WriteHTML($po);
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(400).'px;left:80px">เกิดวันที่ :</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(400).'px;left:160px">'.$birthday2[0].'<span style="color:#FFFFFF">.</span></div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(400).'px;left:200px">เดือน</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(400).'px;left:260px">'.$strMonthCut[$num].'<span style="color:#FFFFFF">.</span></div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(400).'px;left:340px">พ.ศ.</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(400).'px;left:400px">'.$birthday2[2].'<span style="color:#FFFFFF">.</span></div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(400).'px;left:460px">ที่อยู่บ้านเลขที่</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(400).'px;left:560px">'.$house_no.'<span style="color:#FFFFFF">.</span></div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(400).'px;left:620px">หมู่ที่</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(400).'px;left:670px">'.$village_no.'<span style="color:#FFFFFF">.</span></div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(440-$ma).'px;left:80px">บ้าน : </div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(440-$ma).'px;left:130px">'.$village.'<span style="color:#FFFFFF">.</span></div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(440-$ma).'px;left:280px">ตำบล : </div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(440-$ma).'px;left:350px">'.$sub_area.'<span style="color:#FFFFFF">.</span></div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(440-$ma).'px;left:450px">อำเภอ : </div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(440-$ma).'px;left:520px">'.$area.'<span style="color:#FFFFFF">.</span></div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(440-$ma).'px;left:600px">จังหวัด : </div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(440-$ma).'px;left:670px">'.$province.'<span style="color:#FFFFFF">.</span></div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(480-$ma).'px;left:80px">รหัสไปรษณีย์ : </div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(480-$ma).'px;left:200px">'.$post.'<span style="color:#FFFFFF">.</span></div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(480-$ma).'px;left:350px">เบอร์โทรศัพท์ติดต่อ : </div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(480-$ma).'px;left:500px">'.$tel.'<span style="color:#FFFFFF">.</span></div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(520-$ma).'px;left:80px">ชื่อบิดา : </div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(520-$ma).'px;left:150px">'.$father.'<span style="color:#FFFFFF">.</span></div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(520-$ma).'px;left:350px">มารดา : </div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(520-$ma).'px;left:500px">'.$monther.'<span style="color:#FFFFFF">.</span></div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(560-$ma).'px;left:80px">สถานภาพบิดา-มารดา</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(560-$ma).'px;left:240px">('.$img1.') อยู่ด้วยกัน</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(560-$ma).'px;left:400px">('.$img2.') หย่าร้าง</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(560-$ma).'px;left:560px">('.$img3.') แยกกันอยู่</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(600-$ma).'px;left:240px">('.$img4.') บิดาถึงแก่กรรม</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(600-$ma).'px;left:400px">('.$img5.') มารดาถึงแก่กรรม</div>');
    $mpdf->WriteHTML($cap);
    // $mpdf->WriteHTML('<div style="position:absolute;top:'.(640-$add).'px;left:240px">'.$oldschool.'</div>');
    // $mpdf->WriteHTML('<div style="position:absolute;top:'.(640-$add).'px;left:400px">จังหวัด  </div>');
    // $mpdf->WriteHTML('<div style="position:absolute;top:'.(640-$add).'px;left:560px">'.$old_province.'</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.(680+$add).'px;"><u>เลือกแผนการเรียน</div>');
    $mpdf->WriteHTML($pa);
    $mpdf->WriteHTML('<div style="position:absolute;top:'.($posi+=$add).'px;left:400px">ลงชื่อ...........................................................................ผู้สมัคร</div>');
    if($studen_type=="ชั้นมัธยมศึกษาปีที่ 1 ประเภทในเขตพื้นที่บริการและนักเรียนทั่วไป"){
        $pro="ปพ.1 จบหลักสูตรชั้นประถมศึกษาปีที่ 6  หรือ สำเนา ปพ.1 (มีผลการเรียน 5 ภาคเรียน)";
        $pro2="สำเนาทะเบียนบ้านผู้สมัคร/หนังสือรับรองความประพฤติ ";
        $pro3="รูปถ่าย 1 นิ้ว จำนวน  2 รูป (สำหรับติดบัตรเข้าห้องสอบ) ";
        $pro4=" สำเนาเอกสารการเปลี่ยนชื่อ-สกุล (ถ้ามี) ";
    }
    else if($studen_type=="ประเภทนักเรียนทั่วไป"){
        $pro="ปพ.1 จบหลักสูตรชั้นมัธยมศึกษาปีที่ 3  หรือหนังสือรับรองผลการเรียน ปพ.7 ";
        $pro2="สำเนาทะเบียนบ้านผู้สมัคร/หนังสือรับรองความประพฤติ ";
        $pro3="รูปถ่าย 1 นิ้ว จำนวน  2 รูป (สำหรับติดบัตรเข้าห้องสอบ) ";
        $pro4=" สำเนาเอกสารการเปลี่ยนชื่อ-สกุล (ถ้ามี) ";
    }
    else{
        $pro="ป.พ.1   ผลการเรียน 5 ภาคเรียน ( มีผลการเรียนไม่น้อยกว่า 2.00 ) ";
        $pro2="สำเนาทะเบียนบ้านผู้สมัคร/หนังสือรับรองความประพฤติ ";
        $pro3="รูปถ่าย 1 นิ้ว จำนวน  2 รูป (สำหรับติดบัตรเข้าห้องสอบ) ";
        $pro4=" สำเนาเอกสารการเปลี่ยนชื่อ-สกุล (ถ้ามี) ";
    }
    $mpdf->WriteHTML('<div style="position:absolute;top:'.($posi+=($add+$a)).'px;"><u>หลักฐานการสมัครเรียน</u></div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.($posi+=($add+$a)).'px;left:80px">(</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.($posi).'px;left:100px">)</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.($posi).'px;left:110px">'.$pro.'</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.($posi+=($add+$a)).'px;left:80px">(</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.($posi).'px;left:100px">)</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.($posi).'px;left:110px">'.$pro2.'</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.($posi+=($add+$a)).'px;left:80px">(</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.($posi).'px;left:100px">)</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.($posi).'px;left:110px">'.$pro3.'</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.($posi+=($add+$a)).'px;left:80px">(</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.($posi).'px;left:100px">)</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.($posi).'px;left:110px">'.$pro4.'</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.($posi+=($add+$a)).'px;"><u>เจ้าหน้าที่รับสมัคร</u></div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.($posi+=($add+$a)).'px;left:80px">ได้ตรวจสอบหลักฐานครบถ้วนและถูกต้องพร้อมกับแนบสำเนาเอกสารประกอบการสมัคร</div>');
    $mpdf->WriteHTML('<div style="position:absolute;top:'.($posi+=($add+$a+$a+$a)).'px;left:400px">ลงชื่อ......................................................กรรมการรับสมัคร</div>');

    // $mpdf->WriteHTML('<div style="padding:0.4em;position:absolute;top:350px;left:200px;border:1px solid black;text-align: center">'.$id_card[1].'</div>');
    // $mpdf->WriteHTML('<div style="padding:0.4em;position:absolute;top:350px;left:240px;border:1px solid black;text-align: center">'.$id_card[2].'</div>');
    // $mpdf->WriteHTML('<div style="padding:0.4em;position:absolute;top:350px;left:280px;border:1px solid black;text-align: center">'.$id_card[3].'</div>');

    //$mpdf->WriteHTML('<div style="margin-left:1em" >ชื่อ-สกุล :<div style="margin-left:3em">'.$name_title.$fname.' '.$lname.'</div></div>');
    // $mpdf->WriteHTML('<input type="radio" name="fade" checked="checked" > 44564');
    
    // $mpdf->WriteHTML('<p style="margin-left:1em;padding-top:-1em">เลขประจำตัวประชาชน : '.$id_card.'</p>');
    // $mpdf->WriteHTML('<p style="margin-left:1em;padding-top:-1em">เกิดวันที่ '.$birthday2[2].' เดือน '.$strMonthCut[$num].' ปีพุทธศักราช '.$year.'</p>');
    // $mpdf->WriteHTML('<div style="margin-left:5em;padding-top:-1em"> <div height=2% width=5% style="border:1px solid black;text-align: center"width:10px>'.$id_card[0].'</div> </div>');
    // $mpdf->WriteHTML('<span>gfdgdfgdfg</span>');
    unset($_SESSION["id_card"]);
    $mpdf->Output();
}
?>


