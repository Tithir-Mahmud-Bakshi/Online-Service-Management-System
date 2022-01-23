<?php

$connection = mysqli_connect("localhost", "root", "", "OSMS");

if(!$connection){
    die("ERROR! Unable to connect! " . mysqli_connect_error());
}
 
$sql = "CREATE TABLE requesterlogin_tb(
    r_login_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    r_name VARCHAR(30) NOT NULL,
    r_email VARCHAR(70) NOT NULL UNIQUE,
    r_password VARCHAR(30) NOT NULL
    
)";

if(mysqli_query($connection, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR! Unable to execute $sql! " . mysqli_error($connection);
}
 
mysqli_close($connection);
?>