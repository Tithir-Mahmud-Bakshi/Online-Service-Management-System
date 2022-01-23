<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$connection = mysqli_connect($db_host, $db_user, $db_pass);

if(!$connection){
    die("ERROR! Could not connect! " . mysqli_connect_error());
}
 
$sql = "CREATE DATABASE OSMS";
if(mysqli_query($connection, $sql)){
    echo "Database created successfully";
} else{
    echo "ERROR! Could not able to execute $sql! " . mysqli_error($connection);
}
 
mysqli_close($connection);
?>