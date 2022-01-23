<?php

$connection = mysqli_connect("localhost", "root", "", "OSMS");

if(!$connection){
    die("ERROR! Unable to connect! " . mysqli_connect_error());
}
 
$sql = "CREATE TABLE submitrequest_tb(
    request_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    request_info TEXT NOT NULL,
    request_desc TEXT NOT NULL,
    requester_name VARCHAR(60) NOT NULL,
    requester_add1 TEXT NOT NULL,
    requester_add2 TEXT NOT NULL,
    requester_city VARCHAR(60) NOT NULL,
    requester_region VARCHAR(60) NOT NULL,
    requester_zip INT NOT NULL,
    requester_email VARCHAR(60) NOT NULL,
    requester_mobile BIGINT NOT NULL,
    request_date DATE NOT NULL
)";

if(mysqli_query($connection, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR! Unable to execute $sql! " . mysqli_error($connection);
}
 
mysqli_close($connection);
?>