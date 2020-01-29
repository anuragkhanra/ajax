<?php
    $conn = mysqli_connect('localhost','root','','emp');
    if (!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    }
    $data = array();
    $query = "SELECT * FROM `data`"; //INNER JOIN `emp_details` ON data.ID = emp_details.usr_id";
    if(isset($_POST['queryText'])){
        $query = $query." WHERE `Name` LIKE '".$_POST['queryText']."%' OR `Mail` LIKE '".$_POST['queryText']."%'";
    }
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($result)){
        array_push($data, $row['ID'], $row['Name'], $row['Phone'], $row['Mail'],  $row['status']);
    }
    echo json_encode($data);
?>