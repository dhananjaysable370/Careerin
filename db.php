<?php

//Your Mysql Config
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "careerin";

//Create New Database Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Check Connection
if ($conn->connect_error) {
	die("Connection Failed: " . $conn->connect_error);
}