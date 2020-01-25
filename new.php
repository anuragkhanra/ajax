<?php
    $conn = mysqli_connect('localhost','root','','emp');
    if (!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    }
    $q = "INSERT INTO `data` (Name, Phone, Mail, address, status, pass) 
    VALUES ('$_POST[name]','$_POST[phone]','$_POST[mail]',
    '$_POST[address]',0,'$_POST[pass]')";
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
    $res = mysqli_query($conn,$q); 
?>