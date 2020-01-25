<?php
    $conn = mysqli_connect('localhost','root','','emp');
    if (!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    }
    $data = array();
    $query = "SELECT * FROM `data`";
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($result)){
        array_push($data, $row['ID'], $row['Name'], $row['Phone'], $row['Mail'], $row['address'], $row['status']);
    }
    echo json_encode($data);
?>