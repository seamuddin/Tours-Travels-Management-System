<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname="tms";
$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);

?>