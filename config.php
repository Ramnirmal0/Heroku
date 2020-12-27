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

$db = new PDO('mysql:host='. $servername .';dbname=' . $database . ';charset=utf8', $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>