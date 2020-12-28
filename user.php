<?php
// session_start();
//require 'html/user.html';
//require_once('config.php');
?>

<?php

if(isset($_POST)){

	
					
				$uname= $_POST['username'];
				$email = $_POST['emailid'];
				$pwd = sha1($_POST['passwords']);



				$dbhost = 'remotemysql.com:3036';
				$dbuser = 'QExKt8jTh3';
				$dbpass = 'XqrylbkApz';
				$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
			 
				if(! $conn ) {
				   die('Could not connect: ' . mysqli_error());
				}
	   
				$sql = "INSERT INTO accounts ".
				   "(username,email, passwords) "."VALUES ".
				   "('$uname','$email','$pwd')";
				   mysqli_select_db('accounts');
				$retval = mysqli_query( $sql, $conn );
			 
				if(! $retval ) {
				   die('Could not enter data: ' . mysqli_error());
				}
			 
				echo "Entered data successfully\n";
				mysqli_close($conn);

}


?>