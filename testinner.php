<?php
    include "connectDB/connectDB.php";
    $sql ="SELECT student.id_card,student.fname,student.lname,application_form.form_id,parents.father
           FROM application_form
           INNER JOIN student ON student.id_card = application_form.id_card
           INNER JOIN parents ON parents.id_card = application_form.id_card 
           where student.id_card='1139900309372' ";
    $result = mysqli_query($conn,$sql);
    $n=mysqli_num_rows($result);
    while($row=mysqli_fetch_array($result)){
        echo $row["father"]."<br>";
    }
    
?>