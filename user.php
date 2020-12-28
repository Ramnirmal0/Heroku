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



				$dbhost = 'us-cdbr-east-02.cleardb.com';
				$dbuser = 'bc1e1812044ea9';
				$dbpass = 'ab229818';
				$database = 'heroku_891f9ecab05a2c1';

				$conn = new mysqli($dbhost, $dbuser, $dbpass, $database);

			// Check connection
			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}

			//$sql = "INSERT INTO accounts (username, email, passwords) VALUES (:uname, :email, :pwd)";

			$stmt = $conn->prepare("INSERT INTO accounts (username, email, passwords) VALUES (?, ?, ?,?,?,?,?,?)");
			$stmt->bind_param("sss",$username, $email, $password);

			$username = $uname;
			$email = $email;
			$password = $pwd;
			$stmt->execute();

		     if($stmt){
				 
				 echo "$username - $email - $password ";
			 }

			$stmt->close();
			$conn->close(); 


				// $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
			 
				// if(! $conn ) {
				//    die('Could not connect: ' . mysqli_error());
				// }
	   
				// $sql = "INSERT INTO accounts ".
				//    "(username,email, passwords) "."VALUES ".
				//    "('$uname','$email','$pwd')";
				//    mysqli_select_db('accounts');
				// $retval = mysqli_query( $sql, $conn );
			 
				// if(! $retval ) {
				//    die('Could not enter data: ' . mysqli_error());
				// }
			 
				// echo "Entered data successfully\n";
				// mysqli_close($conn);

}


?>