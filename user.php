<?php

if(isset($_POST)){

	
					
				// $uname= $_POST['username'];
				// $email = $_POST['emailid'];
				// $pwd = sha1($_POST['passwords']);

				$uname= "sudo";
				$email = "sudo@mail.com";
				$pwd = "sudobash";



				// $dbhost = 'remotemysql.com';
				// $dbuser = 'QExKt8jTh3';
				// $dbpass = 'XqrylbkApz';
				// $database = 'QExKt8jTh3';

				$mysqli = new mysqli("remotemysql.com","QExKt8jTh3","XqrylbkApz","QExKt8jTh3");

				if ($mysqli -> connect_errno) {
				echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
				exit();
				}

				// Turn autocommit off
				$mysqli -> autocommit(FALSE);

				// Insert some values
				$mysqli -> query("INSERT INTO account (name,email,password)
				VALUES ('".$uname."','".$email."','".$pwd."')");
				

				// Commit transaction
				if (!$mysqli -> commit()) {
				echo "Commit transaction failed";
				exit();
				}

				$mysqli -> close();
				
				
}


?>