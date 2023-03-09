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
    <link rel="stylesheet" href="css/login2.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
</head>

<body>
    <!-- navbar -->
    <?php
    include "in_nav.php";
    ?>
    <!-- closenav -->


    <!-- CLOSE CONTAINNER -->
    <div id="login">
        <form name="form1" class="form" method="post" action="route_log.php" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col-6" id=row_1_1>
                        <div id="username_lable">Username :</div>
                        <input type='text' style="border: solid 2px rgb(38, 162, 167);" name="username" id="username" required /><br>
                        <div id="password_lable">Password :<a href="forget.php" style="color:gray; float: right">Forget</a></div>
                        <input type='password' style="border: solid 2px rgb(38, 162, 167);" name='password' id='password' required /><br>
                        <input type="hidden" name="page" value="<?php echo $_GET["page"] ?>">
                        <center>
                            <div class="row" id="row_button">
                                <!-- <div class="col-6" id="singup">
                                    <button type="button" id="btn_sing_up" onclick="this.form.action='register.php'; submit()">SING UP</button>
                                </div> -->
                                <div class="col-12" id="singin">
                                    <input name="singin" style=" color: white; background-image: linear-gradient(to left, rgb(52, 73, 94 ) , rgb(38, 162, 167));; border:0px; width: 100%;height: 3em ;border-radius: 5px" type="submit" value="SING IN" id="btn_sing_in">
                                </div>
                            </div>
                        </center>
                        <br />
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
        <?php
        if (empty($_SESSION["msg"])) {
        } else {
            echo $_SESSION["msg"];
        }
        ?>
    </div>

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