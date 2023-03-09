<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include "connectDB/connectDB.php";
    $file = fopen('5e7eeced1b7f2.csv', 'r');
    $x = [];
    while (($line = fgetcsv($file)) !== FALSE) {
        $username = $line[1];
        $password = $line[2];
        $fname = "test";
        $lname = "test";
        $type = "01";
        $sql ="INSERT INTO user(username,passwordd,fname,lname,types) VALUES ('$username','$password','$fname','$lname','$type')";
        $result = mysqli_query($conn, $sql);
        echo $username;
        echo $password;
        echo "<br>";
    }
    fclose($file);
    ?>
</body>

</html>