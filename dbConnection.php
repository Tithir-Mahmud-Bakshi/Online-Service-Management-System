<?php  

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'OSMS';

//create connection

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

//checking connection

if(!$connection){
    die("Connection ERROR! " . mysqli_connect_error());
}
/*else
	echo "Congartulations! Connection Successful. " . mysqli_get_host_info($connection);

mysqli_close($connection);
*/
?>