<?php
session_start();
$username 		= $_SESSION['username'];
$emailid 		= $_SESSION['emailid'];
$password 		= $_SESSION['password'];
require_once('config.php');
require 'html/user.html';

if(isset($_POST['continue'])){


	$dob = $_POST['dob'];
	$location=$_POST['location'];
	$mob=$_POST['mob'];

	var_dump($_SESSION);


}


?>