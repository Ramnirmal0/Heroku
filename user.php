<?php
session_start();
require_once('config.php');
require 'html/user.html';
?>

<?php 

if(isset($_POST['continue'])){

	$username 		= $_SESSION['username'];
	$emailid 		= $_SESSION['emailid'];
	$password 		= $_SESSION['password'];
	$dob = $_POST['dob'];
	$location=$_POST['location'];
	$mob=$_POST['mob'];

	echo("$username $emailid $password $dob $location $mob");


}


?>