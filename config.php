<?php

// Created!
// You have successfully created a new database. The details are below.
// Username: QExKt8jTh3
// Database name: QExKt8jTh3
// Password: XqrylbkApz
// Server: remotemysql.com
// Port: 3306
// These are the username and password to log in to your database and phpMyAdmin

$servername = "remotemysql.com";
$database = "QExKt8jTh3";
$username = "QExKt8jTh3";
$password = "XqrylbkApz";

// $db = new PDO('mysql:host='. $servername .';dbname=' . $database . ';charset=utf8', $username, $password);
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// we connect to example.com and port 3307
// create connection
$conn = new mysqli($servername, $username, $password, $database);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>