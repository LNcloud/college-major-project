<?php
$host = 'major-project.c50cc8sga37b.ap-south-1.rds.amazonaws.com'; // Host name
$username = 'root'; // MySQL/MariaDB username
$password = '123456789'; // MySQL/MariaDB password
$db_name = 'mydatabase'; // Database name

// Create a connection to the database
$con = mysqli_connect($host, $username, $password, $db_name);

// Check the connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

