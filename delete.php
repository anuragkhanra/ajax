<?php
     $conn = mysqli_connect('localhost','root','','emp');
     if (!$conn) {
         die("Connection failed: ". mysqli_connect_error());
     }
    $result = mysqli_query($conn,"DELETE FROM `data` WHERE `ID`='".$_POST['id']."'");
?>
