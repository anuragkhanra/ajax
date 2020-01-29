<?php
    $conn = mysqli_connect('localhost','root','','emp');
    if (!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    }
    
    $result = mysqli_query($conn, "SELECT * FROM `data` INNER JOIN `emp_details` ON data.ID = '".$_POST['id']."' AND 
    data.ID = emp_details.usr_id");
        
    $data = array();
    while($row = mysqli_fetch_assoc($result)){
        array_push($data, $row['Name'], $row['Phone'], $row['Mail'], $row['address'], $row['company'], $row['about'] );
    }
    echo json_encode($data);
?>