<?php

// params to connect to a db
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "root";
$dbName = "phptutorial";

// Connection to db
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$conn) {
    die("Database connection failed!");
}
