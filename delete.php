<?php
     $conn = mysqli_connect('localhost','root','','emp');
     if (!$conn) {
         die("Connection failed: ". mysqli_connect_error());
     }
    
    $result = mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0");
    $result = mysqli_query($conn,"DELETE FROM `data` WHERE `ID`='".$_POST['id']."'");
    $result = mysqli_query($conn,"DELETE FROM `emp_details` WHERE `usr_id`='".$_POST['id']."'");
    $result = mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=1");
?>
