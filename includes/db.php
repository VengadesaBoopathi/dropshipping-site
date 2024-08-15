<?php
$servrname = "localhost";
$username = "root";
$password = "1234";
$dbname = "phpproject";

//create connection
$conn = new mysqli($servrname, $username, $password, $dbname);

//chech connection

if($conn->connect_error) {
    die("connection failed: ".$conn->connect_error);
}
?>