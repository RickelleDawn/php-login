<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "localtest";
$dbName = "loginSystem";


$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection to database failed: " . mysqli_connect_error());
}
