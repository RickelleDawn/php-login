<?php

$serverName = "us-cdbr-east-02.cleardb.com";
$dbUsername = "b619a027df8490";
$dbPassword = "3db55ad9";
$dbName = "heroku_c8de46839055606";


$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection to database failed: " . mysqli_connect_error());
}
