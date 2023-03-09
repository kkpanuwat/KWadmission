<?php
include "connectDB/connectDB.php";
if (isset($_GET["msg"])) {
    if ($_GET["msg"] == "add") {
        $plans_name = $_POST["plans_name"];
        $for_level = $_POST["for_level"];
        $sql = "INSERT INTO lesson_plans(plans_name,for_level) values ('$plans_name','$for_level')";
        $result = mysqli_query($conn, $sql);
        header('Location:add_plans.php');
    }

    if ($_GET["msg"] == "edit") {
        $plans_name = $_POST["plans_name"];
        $for_level = $_POST["for_level"];
        $id = $_POST["plans_id"];
        $sql = "UPDATE lesson_plans set plans_name ='$plans_name',for_level='$for_level' where plans_id='$id' ";
        $result = mysqli_query($conn, $sql);
        header('Location:add_plans.php');
    }

    if ($_GET["msg"] == "del") {
        $id = $_GET["plans_id"];
        $sql = "DELETE from lesson_plans where plans_id ='$id'";
        $result = mysqli_query($conn, $sql);
        header('Location:add_plans.php');
    }
}
