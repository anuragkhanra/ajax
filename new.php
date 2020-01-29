<?php
    $conn = mysqli_connect('localhost','root','','emp');
    if (!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    }

    $required = array('name', 'phone', 'mail','address','pass',
    'conpass', 'company', 'about');

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

    $query = "INSERT INTO `data` (Name, Phone, Mail, status, pass) 
    VALUES ('$_POST[name]','$_POST[phone]','$_POST[mail]', 0,'$_POST[pass]')";
    $resuly = mysqli_query($conn,$query);
    $last_id = mysqli_insert_id($conn);
    //$conn->query($q);
    //$last_id = $conn->insert_id;
    
    $q = "INSERT INTO `emp_details` (usr_id, address, company, about) 
    VALUES ('$last_id','$_POST[address]','$_POST[company]', '$_POST[about]')";
    
    $res = mysqli_query($conn,$q); 
?>