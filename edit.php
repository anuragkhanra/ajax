<?php
     $conn = mysqli_connect('localhost','root','','emp');
     if (!$conn) {
         die("Connection failed: ". mysqli_connect_error());
     }
     $required = array('name', 'phone', 'mail','address','pass',
     'conpass');
     $error = false;
     foreach($required as $field) {
       if (empty($_POST[$field])) {
         $error = true;
       }
     }
     
     if($_POST['pass'] != $_POST['conpass'] || $error){
         echo json_encode(array("Error"=>"Wrong password"));
         exit();
     }
    $result = mysqli_query($conn,"UPDATE `data` SET `Name`='".$_POST['name']."',
     `Phone`='".$_POST['phone']."', `Mail`='".$_POST['mail']."', 
     `pass`='".$_POST['pass']."' WHERE `ID`='".$_POST['id']."'");
     
     $result1 = mysqli_query($conn,"UPDATE `emp_details` SET `address`='".$_POST['address']."',
     `company`='".$_POST['company']."', `about`='".$_POST['about']."' WHERE `usr_id`='".$_POST['id']."'");
?>
