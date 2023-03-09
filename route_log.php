<?php
        session_start();
        include "connectDB/connectDB.php";
        if (isset($_POST["singin"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            +
            $check=0;
            $sql = mysqli_query($conn,"SELECT * FROM user");
            while ($row = mysqli_fetch_array($sql)) {
                if ($username == $row["username"] && $password == $row["passwordd"]) {
                    $check=1;
                    $_SESSION["username"] = $username;
                    $_SESSION["type"] = $row["types"];
                    header('Location:index.php');
                    break;
                }
            }
            if($check==0){
                $_SESSION["msg"] = "<br><br><hr><center>บัญชีผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง</center>";
                header('Location:login.php');
            }
        }

        if(isset($_GET["msg"])){
            if($_GET["msg"]=="suc"){
                $username = $_POST["username"];
                $password = $_POST["password"];
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $type = $_POST["type"];
                $sql ="INSERT INTO user(username,passwordd,fname,lname,types) VALUES ('$username','$password','$fname','$lname','$type')";
                $result = mysqli_query($conn, $sql);
                header('Location:add_admin.php');
            }
            if($_GET["msg"]=="up"){
                $username = $_POST["username"];
                $password = $_POST["password"];
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $type = $_POST["type"];
                $id = $_POST["id_user"];
                $sql =" UPDATE user SET fname ='$fname' , passwordd ='$password' , lname ='$lname',
                username = '$username' , types='$type'
                where id_user='$id'";                
                $result = mysqli_query($conn, $sql);
                header('Location:add_admin.php');
            }
            if($_GET["msg"]=="del"){
                $id = $_GET["id_user"];
                $sql =" DELETE from user where id_user='$id'";                
                $result = mysqli_query($conn, $sql);
                header('Location:add_admin.php');
            }
        }

?>
