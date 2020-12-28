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

			$servername = "remotemysql.com";
			$database = "QExKt8jTh3";
			$username = "QExKt8jTh3";
			$password = "XqrylbkApz";


			$conn = new mysqli($servername, $username, $password, $database);

			// Check connection
			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}

			//$sql = "INSERT INTO accounts (username, email, passwords) VALUES (:uname, :email, :pwd)";

			$stmt = $conn->prepare("INSERT INTO accounts (username, email, passwords) VALUES (?, ?, ?)");
			$stmt->bind_param("sss", $username, $email, $password);

			$username = $uname;
			$email = $email;
			$password = $pwd;
			$stmt->execute();

		     if($stmt){
				 
				 echo "$username - $email - $password ";
			 }

			$stmt->close();
			$conn->close();


	// $db = new PDO('mysql:host=remotemysql.com;dbname=QExKt8jTh3','QExKt8jTh3','XqrylbkApz');
	// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// try 
		// {
		// 	$db = new PDO("mysql:host=remotemysql.com;dbname=QExKt8jTh3;charset=utf8",'QExKt8jTh3','XqrylbkApz');
		// 	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// 	$sql = "INSERT INTO accounts (username, email, passwords) VALUES (:uname, :email, :pwd)";

		// 	$stmt = $pdo->prepare($sql);
		
		// 	$stmt->execute(['uname' => $uname, 'email' => $email, 'pwd' => $pwd]);
		// 	if($stmt){
		// 		echo "sucessfully saved";
		// 	}else{
		// 		echo "failed to saved";
		// 	}
		// 	echo "failed to connects";

		  
			
		// }

		// catch(Exception $e)
		// {
		// 	echo "There was an error connecting to the database";
		// }

		// Create connection
			

		// 	$stmt = $pdo->prepare($sql);
		
		// 	$stmt->execute(['uname' => $uname, 'email' => $email, 'pwd' => $pwd]);
		// 	if($stmt){
		// 		echo "sucessfully saved";
		// 	}else{
		// 		echo "failed to saved";
		// 	}
		// 	echo "failed to connects";







		// $_SESSION['username']=$username;
		// $_SESSION['emailid']=$emailid;
		// $_SESSION['passwords']=$passwords;
		// $sql = "INSERT INTO accounts (username, email, passwords ) VALUES(?,?,?)";
		// $stmtinsert = $db->prepare($sql);
		// $result = $stmtinsert->execute([$username, $emailid, $passwords]);
		// if($result){
		// 	echo 'Successfully saved.';
		// }else{
		// 	echo 'There were erros while saving the data.';
		// }
}
else{
	echo 'No data';
}

?>